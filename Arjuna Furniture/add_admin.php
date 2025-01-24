<?php
// File add_admin.php
include 'koneksi.php';

// Data admin yang akan ditambahkan
$username = 'Arjuna furniture';
$password = password_hash('arjuna jati', PASSWORD_DEFAULT); // Hash password

// Menambahkan data admin ke tabel
$query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
if (mysqli_query($conn, $query)) {
    echo "Admin berhasil ditambahkan! Username: $username, Password: arjuna jati";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
