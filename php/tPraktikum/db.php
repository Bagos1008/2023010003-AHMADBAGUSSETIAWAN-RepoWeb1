<?php
$host = 'localhost'; // Server database
$username = 'root'; // Username database
$password = ''; // Password database
$database = 'latihan_php'; // Nama database

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
