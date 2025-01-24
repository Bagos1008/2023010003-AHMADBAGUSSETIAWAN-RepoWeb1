<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Edit Produk</title>
</head>
<body>
<?php
if (isset($_GET['user_id'])) {
    $id = intval($_GET['user_id']); // Sanitasi input
    $query = "SELECT * FROM produk WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $nama_produk = htmlspecialchars($row['nama_produk'], ENT_QUOTES, 'UTF-8');
        $harga_min = $row['harga_min'];
        $harga_max = $row['harga_max'];
        $foto_produk = $row['foto_produk']; // Nama file gambar
    } else {
        echo "<script>alert('Produk tidak ditemukan!'); window.location.href='home.php';</script>";
        exit;
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('ID produk tidak valid!'); window.location.href='home.php';</script>";
    exit;
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = htmlspecialchars($_POST['nama_produk'], ENT_QUOTES, 'UTF-8');
    $harga_min = intval($_POST['harga_min']);
    $harga_max = intval($_POST['harga_max']);

    // Logika untuk mengganti gambar
    if (!empty($_FILES['foto_produk']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png'];

        // Validasi jenis file
        if (!in_array($imageFileType, $allowed_types)) {
            echo "<script>alert('Format file tidak valid! Hanya JPG, JPEG, dan PNG yang diperbolehkan.');</script>";
        } else {
            // Hapus file gambar lama jika ada
            if (file_exists("uploads/$foto_produk")) {
                unlink("uploads/$foto_produk");
            }

            // Simpan file baru
            if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
                $foto_produk = htmlspecialchars(basename($_FILES["foto_produk"]["name"]), ENT_QUOTES, 'UTF-8');
            } else {
                echo "<script>alert('Gagal mengunggah gambar.');</script>";
            }
        }
    }

    // Perbarui data di database
    $query = "UPDATE produk SET nama_produk = ?, harga_min = ?, harga_max = ?, foto_produk = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sissi", $nama_produk, $harga_min, $harga_max, $foto_produk, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location.href='home.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui produk.');</script>";
    }
    mysqli_stmt_close($stmt);
}
?>

<h1 class="text-center">Edit Produk</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $nama_produk; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga_min" class="form-label">Harga Min</label>
                    <input type="number" name="harga_min" id="harga_min" class="form-control" value="<?= $harga_min; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga_max" class="form-label">Harga Max</label>
                    <input type="number" name="harga_max" id="harga_max" class="form-control" value="<?= $harga_max; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="foto_produk" class="form-label">Foto Produk</label><br>
                    <img src="uploads/<?= htmlspecialchars($foto_produk); ?>" alt="Foto Produk" width="200" class="mb-3"><br>
                    <input type="file" name="foto_produk" id="foto_produk" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="home.php" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<footer class="blockquote-footer fixed-bottom">Arjuna Furniture <cite title="Source Title"><a href="https://stwn.rpla2023.com/" target="_blank">Arjuna Furniture</a></cite></footer>
