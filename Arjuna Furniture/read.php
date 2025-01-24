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
    <h1 class="text-center">Detail Produk</h1>
    <div class="container">
    <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Nama Produk</th>
    <th scope="col">Harga Min</th>
    <th scope="col">Harga Max</th>
    <th scope="col"> Foto Produk</th>
    </tr>
    </thead>
    <tbody>
    <tr>
<?php
// first we check using 'isset() function if the variable is set or not'
//Processing form data when form is submitted
if (isset($_GET['user_id'])) {
$userid = $_GET['user_id'];
// SQL query to fetch the data where id=$userid & storing data in view_user
$query = "SELECT * FROM produk WHERE ID
= {$userid} ";
$view_users = mysqli_query($conn,
$query);
while ($row =
mysqli_fetch_assoc($view_users)) {
$id = $row['id'];
$nama_produk = $row['nama_produk'];
$harga_min = $row['harga_min'];
$harga_max = $row['harga_max'];
$foto_produk = $row['foto_produk'];
echo "<tr >";
echo " <td >{$id}</td>";
echo " <td > {$nama_produk}</td>";
echo " <td > {$harga_min}</td>";
echo " <td > {$harga_max}</td>";
echo " <td > <img src='uploads/$foto_produk' alt='Foto Produk' width='100'> </td>";
echo " </tr> ";
}
}
?>
</tr>
</tbody>
</table>
</div>
<!-- a BACK Button to go to pervious page -->
<div class="container text-center mt-5">
<a href="home.php" class="btn btn-warning mt-5"> Back
</a>
<div>
<!-- Footer -->
<footer class="blockquote-footer fixed-bottom">Arjuna Furniture <cite title="Source Title"><a
href="https://stwn.rpla2023.com/"target="_blank">Arjuna furniture</a></cite></footer>
</body>
</html>