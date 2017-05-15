<?php 
	$namacust = $_POST['namacust'];
	$email = $_POST['email'];
	$notelp = $_POST['notelp'];
	$tanggal = date("Y-m-d");

	if (strlen(trim($namacust))==0) {
		echo "Nama Harus Diisi.... <br/>";
		$dataValid = "TIDAK";
	}
	
	$dataValid = "YA";
	if (strlen(trim($notelp))==0) {
		echo "No. Telp Harus Diisi.... <br/>";
		$dataValid = "TIDAK";
	}
	
	if ($dataValid == "TIDAK") {
		echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
		echo "<input type='button' value='kembali' onClick='self.history.back()'>";
		exit;
	}

	include "konek.php";
	$simpan = true;
	$mulai_transaksi = mysql_query('start transaction');

	$sql = "insert into hjual 
			 (tanggal, namacust, email, notelp)
			 values
			 ('$tanggal','$namacust','$email','$notelp')";
	$hasil = mysql_query($sql);
	if (!$hasil) {
		$simpan = false;
	}

	$idhjual = 0;
	$hasil = mysql_query("select last_insert_id()");
	if (!$hasil) {
		$simpan = false;
	}else{
		$data = mysql_fetch_array($hasil);
		$idhjual = $data[0];
	}

	$buku_pilih = '';
	if (isset($_COOKIE['keranjang'])) {
		$buku_pilih = $_COOKIE['keranjang'];
	}else{
		$simpan = false;
	}
	$buku_array = explode(",", $buku_pilih);
	$jumlah = count($buku_array);
	if ($jumlah <=1) {
		$simpan = false;
	}else{
		foreach ($buku_array as $idbuku) {
			if ($idbuku == 0) {
				continue;
			}
			$sql = "select * from buku where idbuku =".$idbuku;
			$hasil = mysql_query($sql);
			if (!$hasil) {
				$simpan = false;
			}else{
				$row = mysql_fetch_assoc($hasil);
				$pengarang = $row['pengarang'];
			}
			$qty = 1;
			$sql = "insert into djual (idhjual,idbuku,qty,pengarang) 
					values
					('$idhjual','$idbuku','$qty','$pengarang')";
			$hasil = mysql_query($sql);
			if (!$hasil) {
				$simpan = false;
			}
		}
	}

	if ($simpan) {
		$komit = mysql_query('commit');
	}else{
		$rollback = mysql_query('rollback');
		echo "Gagal simpan data Peminjaman <br/>
			  Apakah data Peminjaman sudah benar diisi? <br/>
			  Apakah keranjang Peminjaman tidak kosong? <br/>
			  <a href='peminjaman.php'>O K</a>";
		exit;
	}

	echo "<pre>";
	echo "<h2>BUKTI PEMINJAMAN</h2>";
	echo "=============================<br/>";
	echo "NO. NOTA :".date("Ymd").$idhjual."<br/>";
	echo "TANGGAL :".date("d-m-y"),"<br/>";
	echo "NAMA :".$namacust."<br/>";
	include("keranjang_buku.php");
	echo "</pre>";
?>
	<div class="noprint">
		Data pembelian berhasil disimpan.
		Cetaklah bukti peminjaman buku ini.<br/>
		<input type='button' value='cetak' onClick='javascript:print();'>
		<br/><br/>
		<a href="barang_tersedia.php">Pinjam Buku Lagi</a><br/>
	</div>

	<?php
		setcookie('keranjang',$buku_pilih,time()-3600);
	?>