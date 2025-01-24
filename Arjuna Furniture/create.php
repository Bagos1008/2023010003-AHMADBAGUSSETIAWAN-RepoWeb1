<?php
include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,
initial-scale=1.0">
<!-- Bootstrap CSS -->
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<title>PHP CRUD System</title>
</head>
<body>
<?php
if (isset($_POST['create'])) {
    // Mengambil data dari form dengan sanitasi
    $nama_produk = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
    $harga_min = filter_var($_POST['harga_min'], FILTER_SANITIZE_NUMBER_INT);
    $harga_max = filter_var($_POST['harga_max'], FILTER_SANITIZE_NUMBER_INT);

    // Proses upload file
    $foto_produk = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $upload_dir = 'uploads/'; // Folder tujuan
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif']; // Ekstensi file yang diperbolehkan
    $max_file_size = 5 * 1024 * 1024; // Ukuran maksimum file (5MB)

    // Validasi file upload
    $file_extension = strtolower(pathinfo($foto_produk, PATHINFO_EXTENSION));
    $new_file_name = uniqid('produk_', true) . '.' . $file_extension; // Nama file unik untuk mencegah duplikasi

    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<script>alert('Hanya file dengan format JPG, JPEG, PNG, dan GIF yang diperbolehkan!');</script>";
    } elseif ($_FILES['foto']['size'] > $max_file_size) {
        echo "<script>alert('Ukuran file tidak boleh lebih dari 5MB!');</script>";
    } elseif (move_uploaded_file($tmp_name, $upload_dir . $new_file_name)) {
        // Jika berhasil upload, simpan data ke database
        $query = "INSERT INTO produk(nama_produk, harga_min, harga_max, foto_produk)
                  VALUES(?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "siis", $nama_produk, $harga_min, $harga_max, $new_file_name);

        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Produk berhasil ditambahkan!');</script>";
        } else {
            echo "Something went wrong: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Gagal meng-upload gambar!');</script>";
    }
}
?>
<h1 class="text-center">Tambah Detail Produk</h1>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
        <div class="form-group">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga_min" class="form-label">Harga Min</label>
            <input type="number" name="harga_min" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga_max" class="form-label">Harga Max</label>
            <input type="number" name="harga_max" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="foto" class="form-label">Foto Produk</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary mt-2" value="Submit">
        </div>
    </form>
</div>
<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>
<footer class="blockquote-footer fixed-bottom">Arjuna Furniture <cite title="Source Title"><a
href="https://stwn.rpla2023.com/"target="_blank">Arjuna furniture</a></cite></footer>
</body>
</html>