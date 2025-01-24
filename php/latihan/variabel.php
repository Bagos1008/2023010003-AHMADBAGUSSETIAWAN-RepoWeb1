<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kombinasi Variabel</title>
</head>
<body>
    <h1>Kombinasi Variabel dalam PHP</h1>

    <?php
    // Deklarasi 5 variabel
    $firstName = "Ahmad Bagus";
    $lastName = "Setiawan";
    $age = 19;
    $city = "Jepara";
    $hobby = "Sepak Bola";

    // Kombinasi variabel dalam kalimat
    $fullName = $firstName . " " . $lastName; // Menggabungkan nama depan dan belakang
    $introduction = "Halo, nama saya $fullName. Saya berusia $age tahun, tinggal di $city, dan saya suka $hobby.";

    // Tampilkan kombinasi variabel
    echo "<p>$introduction</p>";
    ?>

</body>
</html>
