<?php
  include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  session_start();

  if (!isset( $_SESSION["reseller"])){
    header('location:/Latihan6/index.php');
    die(); 
  }

  $query = "SELECT *  FROM reseller WHERE id  = ".$_SESSION["reseller"].";";
  $res = mysqli_query($koneksi, $query);
  $res = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pesanan Selesai</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
  <div style="width= 80vw; text-align: right; margin-right: 10rem;">
        <p><?php echo $res["username"]?></p>
        <a input type="button" style="text-decoration:none;" id="simpan" href="/Latihan6/logout.php" onclick="alert('Anda Berhasil LOGOUT dan akan kembali ke jendela LOGIN, Trimakasih');">Logout</a>
    </div>
    <center><h1>Pesanan Selesai</h1><center>
    <center>
    <a href="index.php">Produk</a>
    <a href="pesanan.php">Pesanan</a>
    <a href="selesai.php" style="background-color: #745c97;">Selesai</a>
   <center>
   <center>
    <br/>
    <table>
      <thead>
        <tr>
        <th>No</th>
          <th>Nama Produk</th>
          <th>Deskripsi Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Total</th>
          <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT produk.nama_produk as nama_produk, 
                    produk.deskripsi as deskripsi, 
                    produk.harga_jual as harga_jual, 
                    produk.gambar_produk as gambar_produk,
                    pesanan.jumlah as jumlah,
                    produk.id as id,
                    pesanan.id as kode
                FROM pesanan
                INNER JOIN produk
                ON pesanan.produk = produk.id
                WHERE pesanan.resseler = ".$_SESSION['reseller']." AND pesanan.dikonfirmasi = 1;";

      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td>#PS<?php echo $row['kode']; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
          <td>Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?></td>
          <td><?php echo $row['jumlah']; ?></td>
          <td>Rp <?php echo number_format(($row['harga_jual'] * $row['jumlah']),0,',','.'); ?></td>
          <td style="text-align: center;"><img src="../gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>