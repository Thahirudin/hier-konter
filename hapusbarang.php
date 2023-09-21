<?php include('asset/head.php'); ?>
<?php include('app/koneksi.php'); ?>
  <?php include('asset/navbar.php');
// menyimpan data id kedalam variabel
$kodebarang   = $_GET['kodebarang'];
// query SQL untuk insert data
$query="DELETE from barang where kodebarang ='$kodebarang'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index.php");
?>