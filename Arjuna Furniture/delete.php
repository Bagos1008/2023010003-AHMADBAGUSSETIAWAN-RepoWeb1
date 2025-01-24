<?php
include "koneksi.php"
?>
<?php
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Sanitasi input
    $query = "SELECT foto_produk FROM produk WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $foto_produk = $row['foto_produk']; // Nama file gambar

        // Hapus gambar dari folder uploads jika ada
        $file_path = 'uploads/' . $foto_produk;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data dari database
        $delete_query = "DELETE FROM produk WHERE id = ?";
        $delete_stmt = mysqli_prepare($conn, $delete_query);
        mysqli_stmt_bind_param($delete_stmt, "i", $id);
        if (mysqli_stmt_execute($delete_stmt)) {
            echo "<script>alert('Produk berhasil dihapus!'); window.location.href='home.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($delete_stmt);
    } else {
        echo "<script>alert('Produk tidak ditemukan!'); window.location.href='home.php';</script>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('ID produk tidak valid!'); window.location.href='home.php';</script>";
}
?>
