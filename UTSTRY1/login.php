<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'user_management');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Cek username di database
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            echo "Login berhasil!";
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
}
?>
