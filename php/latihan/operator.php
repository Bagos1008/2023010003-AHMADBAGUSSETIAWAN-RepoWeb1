<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Operator PHP</title>
</head>
<body>
    <h1>Belajar Operator PHP</h1>

    <h2>Operator Aritmatika</h2>
    <?php
    echo "5 + 10 = " . (5 + 10) . "<br>";
    echo "5 - 10 = " . (5 - 10) . "<br>";
    echo "5 * 10 = " . (5 * 10) . "<br>";
    echo "5 / 10 = " . (5 / 10) . "<br>";
    echo "5 % 10 = " . (5 % 10) . "<br>";
    echo "5 ** 10 = " . (5 ** 10) . "<br>";
    echo "-5 = " . (-5) . "<br>";
    ?>

    <h2>Operator Penugasan</h2>
    <?php
    $x = 15;
    echo "int(" . $x . ")<br>";
    $x = -5;
    echo "int(" . $x . ")<br>";
    $x = -500;
    echo "int(" . $x . ")<br>";
    $x = -50;
    echo "int(" . $x . ")<br>";
    ?>

    <h2>Operator Perbandingan</h2>
    <?php
    echo "90 > 80 = bool(" . ((90 > 80) ? "true" : "false") . ")<br>";
    echo "3 >= 3 = bool(" . ((3 >= 3) ? "true" : "false") . ")<br>";
    echo "3 < 6 = bool(" . ((3 < 6) ? "true" : "false") . ")<br>";
    echo "5 <= 3 = bool(" . ((5 <= 3) ? "true" : "false") . ")<br>";
    echo "'a' < 'b' = bool(" . (('a' < 'b') ? "true" : "false") . ")<br>";
    echo "'abc' < 'b' = bool(" . (('abc' < 'b') ? "true" : "false") . ")<br>";
    ?>
</body>
</html>
