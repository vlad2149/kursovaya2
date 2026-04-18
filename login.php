<?php
session_start();
require __DIR__ . '/config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = 'Заполните email и пароль.';
    } else {
        $stmt = $pdo->prepare('SELECT user_id, username, email, password_hash FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = (int) $user['user_id'];
            $_SESSION['username'] = $user['username'];

            $update = $pdo->prepare('UPDATE users SET last_login = NOW() WHERE user_id = ?');
            $update->execute([$user['user_id']]);

            header('Location: index.php');
            exit;
        }

        $error = 'Неверный email или пароль.';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="page-login">
<div class="auth-page">
    <div class="auth-bar"></div>
    <main class="auth-screen auth-bg-login">
        <section class="auth-card">
            <h1 class="auth-title">вход</h1>

            <?php if ($error !== ''): ?>
                <div class="message error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form class="auth-form" method="post" action="login.php">
                <input class="auth-input" type="email" name="email" placeholder="EMAIL" required>
                <input class="auth-input" type="password" name="password" placeholder="ПАРОЛЬ" required>
                <button class="auth-button" type="submit">ПОДТВЕРДИТЬ</button>
            </form>

            <div class="auth-meta">
                <a href="register.php">зарегистрироваться</a>
            </div>
        </section>
    </main>
    <div class="auth-bar"></div>
</div>
</body>
</html>
