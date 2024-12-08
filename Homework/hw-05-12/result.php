<?php
session_start();

$total_score = ($_SESSION['score_page1'] ?? 0) +
    ($_SESSION['score_page2'] ?? 0) +
    ($_SESSION['score_page3'] ?? 0);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Результаты</title>
</head>
<body>
<h1>Результаты теста</h1>
<p>Баллы за первую страницу: <?= $_SESSION['score_page1'] ?? 0 ?></p>
<p>Баллы за вторую страницу: <?= $_SESSION['score_page2'] ?? 0 ?></p>
<p>Баллы за третью страницу: <?= $_SESSION['score_page3'] ?? 0 ?></p>
<h2>Общий результат: <?= $total_score ?> баллов</h2>
</body>
</html>
