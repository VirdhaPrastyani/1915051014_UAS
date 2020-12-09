<?php
    include '../koneksi.php';
    session_start();
    $id = $_GET["id"];

    $update = "UPDATE pesanan SET dikonfirmasi = 1 WHERE produk  =  $id AND dikonfirmasi = 0;";

    $result = mysqli_query($koneksi, $update);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal mengkonfirmasi pesanan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Pesanan berhasil konfirmasi.');window.location='pesanan.php';</script>";
    }
?>