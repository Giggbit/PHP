<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система модерации</title>
</head>
<body>
<h1>Система модерации текстовых сообщений</h1>
<form action="moderate.php" method="POST">
    <label for="username">Логин пользователя:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="message">Введите текст:</label><br>
    <textarea id="message" name="message" rows="10" cols="50" required></textarea><br><br>

    <button type="submit">Отправить</button>
</form>
</body>
</html>
