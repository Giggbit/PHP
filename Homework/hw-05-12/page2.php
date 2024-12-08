<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correct_answers = [
        ['A', 'B'], ['C', 'D'], ['A', 'C'], ['B', 'D'], ['A', 'B'],
        ['C', 'D'], ['A', 'C'], ['B', 'D'], ['A', 'B'], ['C', 'D']
    ];
    $score = 0;

    foreach ($_POST as $key => $values) {
        if (isset($correct_answers[$key])) {
            $correct = $correct_answers[$key];
            $selected = array_intersect($values, $correct);
            if (count($selected) === count($correct)) {
                $score += 3;
            }
        }
    }

    $_SESSION['score_page2'] = $score;
    header('Location: page3.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тест: Страница 2</title>
</head>
<body>
<h1>Страница 2: Несколько правильных ответов</h1>
<form method="post">
    <?php for ($i = 0; $i < 10; $i++): ?>
        <p>
            Вопрос <?= $i + 1 ?>: Выберите правильные ответы:<br>
            <label><input type="checkbox" name="<?= $i ?>[]" value="A"> A</label>
            <label><input type="checkbox" name="<?= $i ?>[]" value="B"> B</label>
            <label><input type="checkbox" name="<?= $i ?>[]" value="C"> C</label>
            <label><input type="checkbox" name="<?= $i ?>[]" value="D"> D</label>
        </p>
    <?php endfor; ?>
    <button type="submit">Next</button>
</form>
</body>
</html>
