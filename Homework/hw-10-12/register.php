<?php
session_start();

define('USER_FILE', 'users.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Заполните все поля!";
        exit;
    }

    if (!file_exists(USER_FILE)) {
        file_put_contents(USER_FILE, json_encode([]));
    }

    $users = json_decode(file_get_contents(USER_FILE), true);

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            echo "Пользователь с таким логином уже существует!";
            exit;
        }
    }

    $users[] = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ];

    file_put_contents(USER_FILE, json_encode($users, JSON_PRETTY_PRINT));
    echo "Регистрация успешна!";
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
<h2>Регистрация</h2>
<form method="POST" action="">
    <label>Логин: <input type="text" name="username" required></label><br>
    <label>Пароль: <input type="password" name="password" required></label><br>
    <button type="submit">Зарегистрироваться</button>
</form>
</body>
</html>

