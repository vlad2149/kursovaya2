<?php
if (!isset($pageTitle)) { $pageTitle = 'Project Enterprises'; }
if (!isset($bodyClass)) { $bodyClass = 'page-home'; }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>">
<div class="site-shell">
    <header class="topbar" id="top">
        <div class="brand">Project Enterprises*</div>
        <nav class="nav">
            <a href="index.php">описание города</a>
            <a href="people.php">известные люди</a>
            <a href="landmarks.php">достопримечательности</a>
        </nav>
        <div class="auth-links">
            <?php if (isset($_SESSION['username'])): ?>
                <span class="auth-link"><?= htmlspecialchars($_SESSION['username']) ?></span>
            <?php else: ?>
                <a class="auth-link" href="login.php">вход</a>
            <?php endif; ?>
        </div>
    </header>
