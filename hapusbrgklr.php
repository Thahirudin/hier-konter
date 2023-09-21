<?php include('asset/head.php'); ?>
<?php include('app/koneksi.php'); ?>
  <?php include('asset/navbar.php');
// menyimpan data id kedalam variabel
$id   = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from transaksi where id='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index.php");
?>