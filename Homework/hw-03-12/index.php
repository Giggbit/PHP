<?php

$circle_count = 10;
$circle_diameter = '50px';
$circle_color = 'blue';

echo '<h1>Ex 3</h1>';
echo '<div style="display: flex; gap: 10px;">';
for ($i = 0; $i < $circle_count; $i++) {
    echo "
        <div style=\"
            width: $circle_diameter;
            height: $circle_diameter;
            background-color: $circle_color;
            border-radius: 50%; /* Делает элемент круглым */
        \"></div>
    ";
}
echo '</div><br>';

echo '<h1>Ex 4</h1>';
$binary_number = '11010101';
$hexadecimal_number = base_convert($binary_number, 2, 16);
echo "<p>Number: $binary_number</p>";
echo "<p>Converted: $hexadecimal_number</p>";