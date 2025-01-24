<?php
// File dashboard.php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Selamat Datang, <?= $_SESSION['admin']; ?>!</h1>
        <p>Gunakan menu di bawah untuk mengelola data produk.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box"></i> Data Produk</h5>
                        <p class="card-text">Tambah, edit, atau hapus data produk meubel.</p>
                        <a href="home.php" class="btn btn-primary">Kelola Produk</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk");
        $data = mysqli_fetch_assoc($result);
        ?>
        <p>Total Produk: <?= $data['total']; ?></p>
    </div>
</body>
</html>
