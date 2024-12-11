<?php
session_start();

define('USER_FILE', 'users.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    if (empty($username) || empty($password)) {
        echo "Заполните все поля!";
        exit;
    }

    if (!file_exists(USER_FILE)) {
        echo "Файл с пользователями отсутствует!";
        exit;
    }

    $users = json_decode(file_get_contents(USER_FILE), true);

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];

            if ($remember) {
                setcookie('remember_me', $user['username'], time() + (30 * 24 * 60 * 60));
            }

            header("Location: index.php");
            exit;
        }
    }

    echo "Неверный логин или пароль!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
<h2>Авторизация</h2>
<form method="POST" action="">
    <label>Логин: <input type="text" name="username" required></label><br>
    <label>Пароль: <input type="password" name="password" required></label><br>
    <label><input type="checkbox" name="remember"> Запомнить меня</label><br>
    <button type="submit">Войти</button>
</form>
</body>
</html>
