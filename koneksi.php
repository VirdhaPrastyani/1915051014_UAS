<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "db_latihan6";

$koneksi = mysqli_connect($server,$user,$pass, $db) or die(mysql_error());

if (!$koneksi){
echo "Koneksi database gagal!!!";
}else{
//echo "koneksi berhasil";
}
?>