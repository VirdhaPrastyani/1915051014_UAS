<?php
session_start();

if (isset( $_SESSION["admin"])){
    header('location:/Latihan6/halaman/admin/');
    die();
    
}else if(isset( $_SESSION["reseller"])){
    header('location:/Latihan6/halaman/reseller/');
   die();
}


include("koneksi.php");
$db = mysqli_connect("localhost","root","", "db_latihan6") or die(mysql_error());

if (!$db){
echo "Koneksi database gagal!!!";
}else{
$sql = "SELECT * FROM admin WHERE useradmin = '" .$_POST['useradmin']. "' and  Password = '" .$_POST['password']. "';";
$query = mysqli_query($db, $sql);
$cek = mysqli_fetch_assoc($query);
// reseller
$sql = "SELECT * FROM reseller WHERE username = '" .$_POST['useradmin']. "' and  password = '" .$_POST['password']. "';";
$query = mysqli_query($db, $sql);
$cekreseller = mysqli_fetch_assoc($query);


if ($cek > 0){
    $_SESSION["admin"] = $cek["ID_admin"];
    header('location:/Latihan6/halaman/admin/');
}else if($cekreseller > 0){
    $_SESSION["reseller"] = $cekreseller["id"];
    header('location:/Latihan6/halaman/reseller/');
}else{
    echo "
        <script>
            alert('Username atau password salah!');
            document.location.href = 'index.php';
        </script>";
    die();
	exit;
}
}


?>

