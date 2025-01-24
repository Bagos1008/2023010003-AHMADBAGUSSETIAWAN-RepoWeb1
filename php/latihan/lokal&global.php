<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lingkup Variabel PHP</title>
</head>
<body>
    <h1>Contoh Variabel Lokal dan Global dalam PHP</h1>

    <?php
    // Variabel global
    $globalVar = "Ini adalah variabel global.";

    // Fungsi menggunakan variabel global
    function showGlobalVariable() {
        global $globalVar; // Mengakses variabel global
        echo "<p>Di dalam fungsi: $globalVar</p>";
    }

    // Fungsi dengan variabel lokal
    function localVariableDemo() {
        $localVar = "Ini adalah variabel lokal.";
        echo "<p>Di dalam fungsi: $localVar</p>";
    }

    // Menampilkan variabel global di luar fungsi
    echo "<p>Di luar fungsi: $globalVar</p>";

    // Memanggil fungsi
    showGlobalVariable(); // Mengakses variabel global
    localVariableDemo();  // Mengakses variabel lokal

    // Percobaan mengakses variabel lokal di luar fungsi
    echo "<p>Di luar fungsi: ";
    echo isset($localVar) ? $localVar : "Variabel lokal tidak dapat diakses.";
    echo "</p>";
    ?>
</body>
</html>
