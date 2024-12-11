<?php
session_start();

if (!isset($_SESSION['user']) && !isset($_COOKIE['remember_me'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['user']) && isset($_COOKIE['remember_me'])) {
    $_SESSION['user'] = $_COOKIE['remember_me'];
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
<h2>Добро пожаловать, <?= htmlspecialchars($username) ?>!</h2>
<a href="logout.php">Выйти</a>
</body>
</html>
