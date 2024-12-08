<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correct_answers = ['A', 'B', 'C', 'D', 'A', 'B', 'C', 'D', 'A', 'B'];
    $score = 0;

    foreach ($_POST as $key => $value) {
        if (isset($correct_answers[$key]) && $value === $correct_answers[$key]) {
            $score += 1;
        }
    }

    $_SESSION['score_page1'] = $score;
    header('Location: page2.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тест: Страница 1</title>
</head>
<body>
<h1>Страница 1: Один правильный ответ</h1>
<form method="post">
    <?php for ($i = 0; $i < 10; $i++): ?>
        <p>
            Вопрос <?= $i + 1 ?>: Какой правильный ответ?<br>
            <label><input type="radio" name="<?= $i ?>" value="A"> A</label>
            <label><input type="radio" name="<?= $i ?>" value="B"> B</label>
            <label><input type="radio" name="<?= $i ?>" value="C"> C</label>
            <label><input type="radio" name="<?= $i ?>" value="D"> D</label>
        </p>
    <?php endfor; ?>
    <button type="submit">Next</button>
</form>
</body>
</html>
