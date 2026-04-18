<?php
session_start();
require __DIR__ . '/config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $email === '' || $password === '') {
        $error = 'Заполните все поля.';
    } else {
        $check = $pdo->prepare('SELECT user_id FROM users WHERE email = ? OR username = ? LIMIT 1');
        $check->execute([$email, $username]);

        if ($check->fetch()) {
            $error = 'Пользователь уже существует.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $pdo->prepare('
                INSERT INTO users (username, email, password_hash, registration_date, is_active)
                VALUES (?, ?, ?, NOW(), 1)
            ');
            $insert->execute([$username, $email, $passwordHash]);
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="page-register">
<div class="auth-page">
    <div class="auth-bar"></div>
    <main class="auth-screen auth-bg-register">
        <section class="auth-card register-card">
            <h1 class="auth-title">регистрация</h1>

            <?php if ($error !== ''): ?>
                <div class="message error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form class="auth-form" method="post" action="register.php">
                <input class="auth-input" type="text" name="username" placeholder="USERNAME" required>
                <input class="auth-input" type="email" name="email" placeholder="EMAIL" required>
                <input class="auth-input" type="password" name="password" placeholder="PASSWORD" required>
                <button class="auth-button" type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
            </form>

            <div class="auth-meta">
                <a href="login.php">вход</a>
            </div>
        </section>
    </main>
    <div class="auth-bar"></div>
</div>
</body>
</html>
