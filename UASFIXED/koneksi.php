<?php
// File koneksi.php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "meubel_db";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    echo "Maaf, koneksi ke database gagal.";
    error_log("Error: " . mysqli_connect_error()); // Log kesalahan ke file log
    exit;
}
?>
