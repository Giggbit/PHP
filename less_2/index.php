<?php

require_once __DIR__ . '/vendor/autoload.php';
$book = new App\Book();
$book->getTitle("title 1");

$fruits = ["apple", "banana", "raspberry"];
function showFruit($fruits) {
    echo "<ul>";
        foreach ($fruits as $fruit) {
            echo "<li>$fruit</li>";
        }
    echo "</ul>";
}
showFruit($fruits);

function showForm() {
    echo "<form action='index.php' method='post'>";
        echo "<input type='text' name='login' placeholder='Login'><br>";
        echo "<input type='text' name='title' placeholder='Title'><br>";
        echo "<input type='text' name='author' placeholder='Author'><br>";
        echo "<input type='text' name='year' placeholder='Year'><br>";
        echo "<input type='submit' name='submit' value='Submit'><br>";
    echo "</form>";
}
showForm();

if(isset($_POST["submit"])) {
    $login = $_POST["login"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $year = $_POST["year"];
    echo "Login: " . $login . "<br>";
}