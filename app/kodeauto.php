<?php  
include 'koneksi.php';

function kodetransaksi(){
	global $koneksi;
	$a = mysqli_query($koneksi,"select max(idtransaksi) as maxID from transaksi");
	$data = mysqli_fetch_array($a);

	$kode = $data['maxID'];
	if ($kode >= '210000001') {
		$kode++;
		$kodeauto = "$kode";
		echo$kodeauto;
	} else {
		$kodeauto = '210000001';
		echo$kodeauto;
	}
	
}
function kodebarang(){
	global $koneksi;
	$a = mysqli_query($koneksi,"select max(kodebarang) as maxID from barang");
	$data = mysqli_fetch_array($a);

	$kode = $data['maxID'];
	if ($kode >= '110000001') {
		$kode++;
		$kodeauto = "$kode";
		echo$kodeauto;
	} else {
		$kodeauto = '110000001';
		echo$kodeauto;
	}
	
}

?>