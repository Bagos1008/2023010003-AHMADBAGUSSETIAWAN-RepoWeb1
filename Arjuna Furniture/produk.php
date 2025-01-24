<!-- Header -->
<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>

<!-- HEADER -->
<header role="banner" class="position-absolute margin-top-30 margin-m-top-0 margin-s-top-0">    
    <!-- Top Navigation -->
    <nav class="background-transparent background-transparent-hightlight full-width sticky">
        <div class="s-12 l-2">
            <a href="index.php" class="logo">
                <!-- Logo version before sticky nav -->
                <img class="logo-before" src="img/logo-dark.png" alt="Logo">
                <!-- Logo version after sticky nav -->
                <img class="logo-after" src="img/logo-dark.png" alt="Logo">
            </a>
        </div>
        <div class="s-12 l-10">
            <div class="top-nav right">
                <p class="nav-text"></p>
                <ul class="right chevron">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="tips.php">Tips</a></li>             
                    <li><a href="contact.php">Kontak</a></li>
                </ul>
            </div>
        </div>  
    </nav>
</header>

<!-- MAIN -->
<main role="main">
    <!-- Content -->
    <article>
        <header class="section background-white">
            <div class="line text-center">        
                <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">Produk Kami</h1>
                <p class="margin-bottom-0 text-size-16 text-dark">
                    Koleksi kami menawarkan kenyamanan dan keindahan dengan harga yang sesuai. 
                    Setiap produk didesain untuk menambah keindahan rumah Anda tanpa membebani kantong.
                </p>
            </div>  
        </header>
        <div class="background-white full-width"> 
            <div class="row">
                <?php
                // Query untuk mendapatkan semua data produk dari database
                $query = "SELECT * FROM produk";
                $result = mysqli_query($conn, $query);

                // Loop untuk menampilkan setiap produk
                while ($row = mysqli_fetch_assoc($result)) {
                    // Sanitasi data dari database untuk mencegah XSS
                    $nama_produk = htmlspecialchars($row['nama_produk'], ENT_QUOTES, 'UTF-8');
                    $harga_min = number_format($row['harga_min'], 0, ',', '.');
                    $harga_max = number_format($row['harga_max'], 0, ',', '.');
                    $foto_produk = htmlspecialchars($row['foto_produk'], ENT_QUOTES, 'UTF-8');

                    echo '<div class="s-12 m-6 l-five">';
                    echo '<a class="image-with-hover-overlay image-hover-zoom" href="uploads/' . $foto_produk . '" title="Portfolio Image">';
                    echo '<div class="image-hover-overlay background-primary">'; 
                    echo '<div class="image-hover-overlay-content text-center padding-2x">';
                    echo '<h3 class="text-white text-size-20 margin-bottom-10">' . $nama_produk . '</h3>';
                    echo '<p class="text-white text-size-14 margin-bottom-20">';

                    // Menampilkan harga
                    if ($row['harga_min'] == $row['harga_max']) {
                        // Jika harga_min sama dengan harga_max, tampilkan satu harga saja
                        echo 'Rp. ' . $harga_min;
                    } else {
                        // Jika harga_min dan harga_max berbeda, tampilkan kisaran harga
                        echo 'Rp. ' . $harga_min . ' - Rp. ' . $harga_max;
                    }

                    echo '</p>';
                    echo '</div>'; 
                    echo '</div>'; 
                    echo '<img class="full-img" src="uploads/' . $foto_produk . '" alt="' . $nama_produk . '"/>';
                    echo '</a>';    
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </article>
</main>
      
<!-- Footer -->
<?php include "footer.php"; ?>
