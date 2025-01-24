<html>
<head>
<title>Contoh Penggunaan List dalam HTML</title>
</head>
<body>
<h2>Daftar Peserta</h2>
<ol>
<?php
for ($i = 1; $i <= 50; $i++) {
echo "<li>Peserta ke-$i</li>";
}
?>
</ol>
</body>
</html>