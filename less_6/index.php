<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $content = $_POST['content'];
        $symbol = $_POST['symbol'];

        if (strlen($symbol) !== 1) {
            die("Ошибка: Введите один символ!");
        }

        $symbolCount = substr_count($content, $symbol);
        $processedContent = preg_replace('/\d/', '$', $content);

        $filePath = 'processed_content.txt';
        file_put_contents($filePath, $processedContent);

        echo "<h1>Результат обработки</h1>";
        echo "<p>Количество повторов символа '<b>$symbol</b>': <b>$symbolCount</b></p>";
        echo "<p>Обработанный текст сохранен в файл: <b>$filePath</b></p>";
        echo "<h2>Обработанный текст:</h2>";
        echo "<pre>$processedContent</pre>";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="content">Введите текст:</label><br>
        <textarea id="content" name="content" rows="5" cols="30" required></textarea><br><br>

        <label for="symbol">Введите символ для подсчета:</label><br>
        <input type="text" id="symbol" name="symbol" maxlength="1" required><br><br>

        <button type="submit">Обработать</button>
    </form>
</body>
</html>