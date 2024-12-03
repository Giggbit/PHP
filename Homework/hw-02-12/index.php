<?php

echo "<body>
    <h1>Num 5</h1>
    <div>
        <p>Question 1</p>
        <input type='radio' name='question' id='q1' value='1'><label for='q1'>A</label><br>
        <input type='radio' name='question' id='q2' value='2'><label for='q2'>B</label><br>
        <input type='radio' name='question' id='q3' value='3'><label for='q3'>C</label><br>
        <input type='radio' name='question' id='q4' value='4'><label for='q4'>D</label><br>
    </div>
    <div>
        <p>Question 2</p>
        <input type='checkbox' name='question' id='q5' value='1'><label for='q5'>A</label><br>
        <input type='checkbox' name='question' id='q6' value='2'><label for='q6'>B</label><br>
        <input type='checkbox' name='question' id='q7' value='3'><label for='q7'>C</label><br>
        <input type='checkbox' name='question' id='q8' value='4'><label for='q8'>D</label><br>
    </div>
    <div>
        <p>Question 3</p>
        <textarea name='question' id='q9' rows='5' cols='50'></textarea>
    </div>
</body>";

$tag = "div";
$background_color = "red";
$color = "white";
$width = 120;
$height = 100;

echo "<h1>Num 6</h1>";
echo "
<$tag style=\"
    background-color: $background_color;
    color: $color;
    width: $width;
    height: $height;
\">
    Hello world!
</$tag>";
