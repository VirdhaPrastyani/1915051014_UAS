<?php
    include '../koneksi.php';
    session_start();
    $id = $_GET["id"];
    $reseller = $_SESSION["reseller"];

    $query = "DELETE FROM pesanan WHERE produk  =  $id AND resseler = $reseller AND dikonfirmasi = 0;";

    $result = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal membatalkan pesanan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Pesanan berhasil dibatalkan.');window.location='pesanan.php';</script>";
    }