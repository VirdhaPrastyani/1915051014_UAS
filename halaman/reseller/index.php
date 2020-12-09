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
    <title>Produk</title>
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
    <center><h1>Produk</h1><center>
    <center>
    <a href="index.php" style="background-color: #745c97;">Produk</a>
    <a href="pesanan.php">Pesanan</a>
    <a href="selesai.php">Selesai</a>
   <center>
   <center>
   <div style="display:flex; margin:  4rem 0 0 12rem; width:80rem">
      <div style="margin-right:28rem">
        <input id="reseller-value" type="text" style="padding:7px; width: 20rem" placeholder="Cari produk..." name="search" autocomplete="off">
        <button type="submit" id="cari-reseller" style="background-color: #745c97; color:white; border: none; cursor: pointer; padding:10px">Cari</i></button>
      </div>
    </div>
   </center>
   
   <center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Deskripsi Produk</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Gambar</th>
          <th>Pesan</th>
        </tr>
    </thead>
    <tbody class="container">
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY id ASC";
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
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
          <td>Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?></td>
          <td><?php echo $row['stok']; ?> pcs</td>
          <td style="text-align: center;"><img src="../gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td>
              <a href="proses_pesanan.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Pesan produk ini?')">Pesan</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://localhost/Latihan6/halaman/ajax/ajax.js"></script>
</html>