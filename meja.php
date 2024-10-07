<?php
require_once("servies/database.php");
session_start();
if ($_SESSION['is_login' ] == false) 
{
    header("location: login.php");
}
    define("APP_NAME", "NOMOR MEJA ");

    $no_meja = "";
    $update_notification = "";
    $nama_pelanggan = "";
    
    if(isset($_GET['no_meja']) && $_GET['no_meja'] !== "") {
        $no_meja = $_GET['no_meja'];
    }

    if(isset($_GET['nama_pelanggan']) && $_GET['nama_pelanggan'] !== "") {
        $nama_pelanggan = $_GET['nama_pelanggan'];
        header("location: finish_order.php?no_meja=$no_meja&nama_pelanggan=$nama_pelanggan");
    }
    
    if(isset($_POST['update'])){
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $jumlah_orang = $_POST['jumlah_orang'];

        $update_meja_query = "UPDATE meja SET nama_pelanggan='$nama_pelanggan', jumlah_orang='$jumlah_orang', status=1 WHERE no_meja='$no_meja'";

        $update_meja = $db->query($update_meja_query);

        if($update_meja){
            header("location: index.php");
        }else{
           $update_notification = "gagal update data meja, silahkan coba lagi";
        }
    $db->close();
    }
    
    if(isset($_GET['nama_pelanggan']) && $_GET['nama_pelanggan'] !== ""){
       $nama_pelanggan =  $_GET['nama_pelanggan'] . PHP_EOL;
    }else if($nama_pelanggan == ""){
        $nama_pelanggan = "Belum Ada";
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Meja</title>
</head>
<body>
    <?php include("layouts/header.php") ?>
    <div class="super-center">
        
       <a href="index.php"><h1><?= APP_NAME; echo $no_meja?></h1></a>
       <i><?= $update_notification ?></i>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for=""> Nama Pelanggan <?= strtoupper($nama_pelanggan) ?> </label>
            <input type="text" name="nama_pelanggan">
            <label for=""> Jumlah Meja </label>
            <input type="text" name="jumlah_orang"> 
            <button type="submit" name="update">Update Meja</button>
        </form>
    </div>
    </body>
</html>