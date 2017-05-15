<?php 
	$namacust = $_POST['namacust'];
	$email = $_POST['email'];
	$notelp = $_POST['notelp'];
	$tanggal = date("Y-m-d");

	$dataValid = "YA";
	if (strlen(trim($namacust))==0) {
		echo "Nama Harus Diisi.... <br/>";
		$dataValid = "TIDAK";
	}
	
	$dataValid = "YA";
	if (strlen(trim($notelp))==0) {
		echo "No. Telp Harus Diisi.... <br/>";
		$dataValid = "TIDAK";
	}

	if(isset($_COOKIE['keranjang'])){
		$buku_pilih = $_COOKIE['keranjang'];
	} else{
		echo "Keranjang Peminjaman Kosong <br/>";
		$dataValid = "TIDAK";
	}
	
	if ($dataValid == "TIDAK") {
		echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
		echo "<input type='button' value='kembali' onClick='self.history.back()'>";

		exit;
	}

	echo "Data siap disimpan.";

		setcookie('keranjang',$buku_pilih,time()-3600);
?>