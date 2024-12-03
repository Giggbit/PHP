<?php

require_once __DIR__ . '/vendor/autoload.php';

$colors = ["red", "green", "blue", "yellow"];

function getColor($colors) {
    foreach ($colors as $color) {
        echo "<div style='height: 15%; background-color: $color; text-align: center; align-content: center'><h1>$color</h1></div>";
    }
}
getColor($colors);