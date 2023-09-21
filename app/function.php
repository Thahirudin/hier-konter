<?php
include('koneksi.php');
function tambahbrgklr($data){
	global $koneksi;

	$kodebarang = htmlspecialchars($data['kodebarang']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$a = mysqli_query($koneksi, "select * from barang where kodebarang = '$kodebarang'");
	$row = mysqli_fetch_assoc($a);
	$namabarang = $row ["namabarang"];
	$hargabarang = $row ["hargabarang"];
	$total = $jumlah * $hargabarang;
	$harga = $total;

	if ($kodebarang == $row["kodebarang"]) {
		// code...
		if ($row["jumlahbarang"] >= $jumlah ) {
			// code...
			$query = "INSERT INTO transaksi (kodebarang, namabarang, jumlahbarang, harga) Values ('$kodebarang', '$namabarang', '$jumlah', '$harga')";
				mysqli_query($koneksi, $query);
				return mysqli_affected_rows($koneksi);
		} else {
			echo "
          <script>
            alert('Stok Kurang!');
            document.location.href = 'index.php';
          </script>
      ";
		}
		
	} else {
		echo "
          <script>
            alert('Barang Tidak Ada!');
            document.location.href = 'index.php';
          </script>
      ";
	}
}
function updatebrgklr($data){
	global $koneksi;
	$tanggal = date('Y-m-d H:i:s');
	$kodebarang = $data['kodebarang'];
	$idtransaksi = $data['transaksi'];
	$jumlah = $data['jumlah'];
	$jum = count($kodebarang);
	for($x=0;$x<$jum;$x++){
		$a = mysqli_query($koneksi, "select * from barang where kodebarang = '$kodebarang[$x]'");
		$row = mysqli_fetch_assoc($a);
		$jumlahbarang = $row ["jumlahbarang"];
		$stok = $jumlahbarang - $jumlah[$x];
		$query1 = "UPDATE barang SET jumlahbarang = '$stok' WHERE kodebarang = '$kodebarang[$x]'";
		mysqli_query($koneksi, $query1);
	}
	$query2 = "UPDATE transaksi SET  idtransaksi = '$idtransaksi', tanggal = '$tanggal' WHERE idtransaksi = ''";
	mysqli_query($koneksi, $query2);
	return mysqli_affected_rows($koneksi);}

function editbrgklr($data){
	global $koneksi;
	$jumlah = htmlspecialchars($data['jumlah']);
	$id = $data['id'];
	$kodebarang = $data['kodebarang'];
	$a = mysqli_query($koneksi, "select * from barang where kodebarang = '$kodebarang'");
	$row = mysqli_fetch_assoc($a);
	$hargabarang = $row ["hargabarang"];
	$total = $jumlah * $hargabarang;
	$query = "UPDATE transaksi SET  jumlahbarang = '$jumlah', harga = '$total' WHERE id = '$id'";
	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);}

function editbrg($data){
	global $koneksi;
	$kodebarangasli = $data['kodebarangasli'];
	$kodebarang = htmlspecialchars($data['kodebarang']);
	$namabarang = htmlspecialchars($data['namabarang']);
	$hargabarang = htmlentities($data['hargabarang']);
	$jumlahbarang = htmlentities($data['jumlahbarang']);
	$query = "UPDATE barang SET kodebarang = '$kodebarang', namabarang = '$namabarang', hargabarang = '$hargabarang', jumlahbarang = '$jumlahbarang' where kodebarang = '$kodebarangasli'";
	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}

function tambahbrg($data){
	global $koneksi;

	$kodebarang = htmlspecialchars($data['kodebarang']);
	$namabarang = htmlspecialchars($data['namabarang']);
	$hargabarang = htmlspecialchars($data['hargabarang']);
	$query = "INSERT INTO barang (kodebarang, namabarang, hargabarang) Values ('$kodebarang', '$namabarang', '$hargabarang')";
	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}

  ?>

