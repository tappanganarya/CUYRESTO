<?php

$hostname = "localhost";
$database_name = "cuyresto";
$username = "root";
$password = "";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if ($db->connect_error){
    echo "koneksi database eror";
    die();
};
