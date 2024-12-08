<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correct_answers = ['apple', 'banana', 'cat', 'dog', 'elephant', 'fish', 'grape', 'house', 'ice', 'joker'];
    $score = 0;

    foreach ($_POST as $key => $value) {
        if (isset($correct_answers[$key]) && strtolower($value) === $correct_answers[$key]) {
            $score += 5;
        }
    }

    $_SESSION['score_page3'] = $score;
    header('Location: result.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тест: Страница 3</title>
</head>
<body>
<h1>Страница 3: Ответ текстом</h1>
<form method="post">
    <?php for ($i = 0; $i < 10; $i++): ?>
        <p>
            Вопрос <?= $i + 1 ?>: Ваш ответ?<br>
            <input type="text" name="<?= $i ?>" required>
        </p>
    <?php endfor; ?>
    <button type="submit">Finish</button>
</form>
</body>
</html>
