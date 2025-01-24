<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Konsep Tipe Data PHP</title>
</head>
<body>
    <h1>Contoh Pemanfaatan Tipe Data di PHP</h1>

    <?php
    // Tipe data string
    $name = "Seti";

    // Tipe data integer
    $age = 19;

    // Tipe data array
    $skills = ["HTML", "CSS", "JavaScript", "Bootstrap"];

    // Tipe data boolean
    $isEmployed = true;

    // Menampilkan data
    echo "<p><strong>Nama:</strong> $name</p>";
    echo "<p><strong>Usia:</strong> $age tahun</p>";
    echo "<p><strong>Keterampilan:</strong></p>";
    echo "<ul>";
    foreach ($skills as $skill) {
        echo "<li>$skill</li>";
    }
    echo "</ul>";

    echo "<p><strong>Status :</strong> ";
    echo $isEmployed ? "Sedang Tidur" : "Tidak bekerja";
    echo "</p>";
    ?>
</body>
</html>
