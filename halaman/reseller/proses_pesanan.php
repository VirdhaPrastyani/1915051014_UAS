<?php
    include '../koneksi.php';
    session_start();
    $id = $_GET["id"];
    $reseller = $_SESSION["reseller"];

    $query = "SELECT stok FROM produk WHERE id  =  $id;";
    $stok = mysqli_query($koneksi, $query);
    $stok = mysqli_fetch_row($stok);

    if((int)$stok[0] < 1){
        echo "
            <script>
            alert('Stok tidak tersedia!');
            document.location.href = 'index.php';
            </script>";
        die();
        exit;
    }

    $query = "SELECT id FROM pesanan WHERE produk  =  $id AND resseler = $reseller AND dikonfirmasi = 0;";
    $cekpesanan = mysqli_query($koneksi, $query);
    $cekpesanan = mysqli_fetch_row($cekpesanan);

    if($cekpesanan){
        $insert = "UPDATE pesanan SET jumlah = jumlah + 1 WHERE produk  =  $id AND resseler = $reseller AND dikonfirmasi = 0;";
    }else{
        $insert = "INSERT INTO pesanan (id, produk, resseler, jumlah, dikonfirmasi) VALUES ('', '$id', '$reseller','1', '0')";
    }
    $result = mysqli_query($koneksi, $insert);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal memesan produk: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Produk berhasil dipesan.');window.location='pesanan.php';</script>";
    }