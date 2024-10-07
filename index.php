<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once("servies/database.php");

session_start();
if ($_SESSION['is_login' ] == false) 
{
    header("location: login.php");
}

define("APP_NAME", "CUYRESTO - WEBSITE PENERIMAAN TAMU");

$select_meja_query = "SELECT * FROM meja";
$count_meja_query =  "SELECT COUNT(status) as total_count, SUM(status=1) as total_row FROM meja";
$select_meja = $db->query($select_meja_query);

$count_meja = $db->query($count_meja_query);

$status = $count_meja->fetch_assoc();
$jumlah_meja = $status["total_count"];
$meja_isi = $status["total_row"];

$is_full = false;

if($jumlah_meja == $meja_isi){
    $is_full = true ;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= APP_NAME ?></title>

</head>
<body>
    <?php include("layouts/header.php") ?>
    <script>
        window.addEventListener('scroll', function() {
    var header = document.getElementById('myHeader');
    var links = header.querySelectorAll('a'); // Mengambil semua elemen <a> dalam header
    var h3 = header.querySelector('h3'); // Mengambil elemen <h3> dalam header

    if (window.scrollY > 0 ) { // Periksa apakah posisi scroll tidak di atas
        header.classList.remove('header-top'); // Hapus kelas 'header-top' jika pengguna telah menggulir ke bawah
        // Mengubah warna teks link menjadi white
        links.forEach(function(link) {
            link.style.color = 'white';
        });
        // Mengubah warna teks h3 menjadi white
        h3.style.color = 'white';
    } else {
        header.classList.add('header-top'); // Tambahkan kelas 'header-top' jika pengguna kembali ke atas
        // Mengembalikan warna teks link ke warna default
        links.forEach(function(link) {
            link.style.color = '';
        });
        // Mengembalikan warna teks h3 ke warna default
        h3.style.color = '';
    }
});

    </script>

    <br>
    <br>

    <?php 
    $sisa_meja = $jumlah_meja - $meja_isi;
    
    if($is_full){
         echo"<h1 align='center'>MEJA PENUH </h1>";
    }else{
        echo "<h1 align='center'>$sisa_meja Meja Kosong </h1>";
    }
    ?>
    <br>
    
    <div class="container">
    
    <?php 
        foreach ($select_meja as $meja){       
    ?>
    <div class="card" onclick="goToMeja('<?= $meja['no_meja']?>', '<?= $meja['nama_pelanggan'] ?>')">
    <b><?= $meja ['tipe_meja'] . " " .  $meja['no_meja'] ?></b>
    <p>
        <?= $meja['nama_pelanggan'] == NULL && $meja['jumlah_orang'] == NULL ? "Meja Kosong" :  $meja ['nama_pelanggan'] . " - " .  $meja['jumlah_orang'] . " Orang" ?>
    </p>
    </div>

    <?php
        }
    ?>
    </div>
    <script>
        function goToMeja(no_meja, nama_pelanggan){
            const url = "meja.php";
            const params = `?no_meja=${no_meja}&nama_pelanggan=${nama_pelanggan}`;


            window.location.replace(url + params)
        }
    </script>
    <!-- 4.44.27 -->
</body>
</html>