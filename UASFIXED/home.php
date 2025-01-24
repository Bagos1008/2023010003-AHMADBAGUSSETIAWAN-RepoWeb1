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
<div class="container">
    <h1 class="text-center">Data Produk Arjuna Furniture</h1>
    <a href="create.php" class='btn btn-outline-dark mb-2'>
<i class="bi bi-person-plus"></i> Tambah Produk Baru</a>

    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Min</th>
                <th scope="col">Harga Max</th>
                <th scope="col"> Foto Produk</th>
                <th scope="col" colspan="3" class="text-
                center">CRUD Operations</th>
            </tr>
    </thead>
    <tbody>
    <tr>
                <?php
                $query = "SELECT * FROM produk"; // SQL query to fetch all table data
                $view_produk = mysqli_query($conn,$query); // sending the query to the database
                // displaying all the data retrieved from the database using while loop
                while ($row =
                mysqli_fetch_assoc($view_produk)) {
                $id = $row['id'];
                $nama_produk = $row['nama_produk'];
                $harga_min = $row['harga_min'];
                $harga_max = $row['harga_max'];
                $foto_produk = $row['foto_produk'];
                echo "<tr >";
                echo " <th scope='row' >{$id}</th>";
                echo " <td > {$nama_produk}</td>";
                echo " <td > {$harga_min}</td>";
                echo " <td > {$harga_max}</td>";
                echo "<td> <img src='uploads/$foto_produk' alt='Foto Produk' width='100'> </td>";
                echo " <td class='text-center'> <a
                href='read.php?user_id={$id}' class='btn btn-primary'> <i
                class='bi bi-eye'></i> View</a> </td>";
                echo " <td class='text-center' > <a
                href='update.php?edit&user_id={$id}' class='btn btn-
                secondary'><i class='bi bi-pencil'></i> EDIT</a> </td>";
                echo " <td class='text-center'> <a href='delete.php?delete={$id}' class='btn btn-danger' onclick='return confirm('Apakah Anda yakin ingin menghapus produk ini?');'>
                <i class='bi bi-trash'></i> DELETE</a> </td>";
                echo " </tr> ";
                }
                ?>
            </tr>
        </tbody>
    </table>
</div>
<!-- a BACK button to go to the index page -->
<div class="container text-center mt-5">
<a href="dashboard.php" class="btn btn-warning mt-5">Kembali </a>
<div>
</body>
</html>
<footer class="blockquote-footer text-center mt-4">
  Arjuna Furniture <cite title="Source Title">
    <a href="https://stwn.rpla2023.com/" target="_blank">Arjuna furniture</a>
  </cite>
</footer>