    <?php
      include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
      session_start();
    
      if (!isset( $_SESSION["admin"])){
        header('location:/Latihan6/index.php');
        die(); 
      }
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $keyword = $_POST["keyword"];

      if(isset($keyword)){
        $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' ORDER BY id ASC";
      }else{
        $query = "SELECT * FROM produk ORDER BY id ASC";
      }
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
          <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
          <td>Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?></td>
          <td><?php echo $row['stok']; ?> pcs</td>
          <td style="text-align: center;"><img src="../gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>