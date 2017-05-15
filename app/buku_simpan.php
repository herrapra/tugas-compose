<?php
	if(isset($_POST['idbuku'])){
		$idbuku		= $_POST['idbuku'];
		$foto_lama	= $_POST['foto_lama'];
		$simpan		= "EDIT";
	}else{
		$simpan	= "BARU";
	}
	
	$kode		= $_POST['kode'];
	$judul 		= $_POST['judul'];
	$pengarang 	= $_POST['pengarang'];
	$penerbit 	= $_POST['penerbit'];
	$stok 		= $_POST['stok'];

	$foto 		= $_FILES['foto']['name'];
	$tmpName 	= $_FILES['foto']['tmp_name'];
	$size 		= $_FILES['foto']['size'];
	$type 		= $_FILES['foto']['type'];

	$maxsize = 1500000;
	$typeYgBoleh = array("image/jpeg","image/png","image/jpg");
	
	$dirFoto = "pict";
	if (!is_dir($dirFoto))
		mkdir($dirFoto);
	$fileTujuanFoto = $dirFoto."/".$foto;
	
	$dirThumb = "thumb";
	if(!is_dir($dirThumb))
		mkdir($dirThumb);
	$fileTujuanThumb = $dirThumb."/t_".$foto;

	$datavalid = "Ya";

	if($size > 0) {
		if ($size > $maxsize) {
			echo "ukuran file terlalu besar<br/>";
			$datavalid="tidak";
	}
		if (!in_array($type,$typeYgBoleh)) {
			echo "type file tidak dikenal<br/>";
			$datavalid="Tidak";
		}
	}

	if (strlen(trim($kode))==0){
		echo "Kode Buku Harus Diisi! <br/>";
		$datavalid = "Tidak";
	}
	if (strlen(trim($judul))==0){
		echo "Judul Buku Harus Diisi! <br/>";
		$datavalid = "Tidak";
	}
	if (strlen(trim($pengarang))==0){
		echo "Nama Pengarang Harus Diisi! <br/>";
		$datavalid = "Tidak";
	}
	if (strlen(trim($penerbit))==0){
		echo "Nama Penerbit Harus Diisi! <br/>";
		$datavalid = "Tidak";
	}
	if (strlen(trim($stok))==0){
		echo "Jumlah Stok Harus Diisi! <br/>";
		$datavalid = "Tidak";
	}
	if ($datavalid == "Tidak"){
		echo "Masih ada kesalahan, Silahkan perbaiki!<br/>";
		echo "<input type='button' value='Kembali'
			onClick='self.history.back()'>";
		exit;
	}

	include "konek.php";
		if($simpan == "EDIT"){
			if($size == 0){
				$foto = $foto_lama;
			}
			$sql = "update buku set
					kode		= '$kode',
					judul		= '$judul',
					pengarang	= '$pengarang',
					penerbit	= '$penerbit',
					stok		=  $stok,
					foto		= '$foto'
					where idbuku = '$idbuku' ";
		}else{
			$sql = "insert into buku(kode,judul,pengarang,penerbit,stok,foto)
					values
					('$kode','$judul','$pengarang','$penerbit',$stok,'$foto')";
		}
		$hasil = mysql_query($sql);

	if (!$hasil){
		echo "Gagal simpan, silahkan diulang! <br/>";
		echo mysql_error($kon);
		echo "<br/><input type='button' value='Kembali'
			   onClick='self.history.back()'>";
		exit;
	}else{
		echo "Simpan data berhasil";
	}

	if ($size > 0) {
		if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
			echo "gagal upload gambar..<br/>";
			echo "<a href='barang_tampil.php'>Daftar Buku</a>";
			exit;
		}else{
			buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
		}
	}

	echo "<br/>file sudah diupload<br/>";

	function buat_thumbnail($file_src,$file_dst) {
		//hapus jika thubnail sebelunya sudah ada
		list($w_src,$h_src,$type) = getImageSize($file_src);
	
		switch ($type) {
		case 1://gif -->jpg
			$img_src = imagecreatefromgif($file_src);
			break;
		case 2:
			$img_src =imagecreatefromjpeg($file_src);
			break;
		case 3:
			$img_src = imagecreatefrompng($file_src);
			break;
		}
		$thumb = 100;
			if ($w_src > $h_src) {
			$w_dst = $thumb;
			$h_dst = round($thumb / $w_src * $h_src);
		}else {
			$w_dst = round($thumb / $h_src * $w_src );
			$h_dst = $thumb;
		}
		
		$img_dst = imagecreatetruecolor($w_dst,$h_dst);
	
		imagecopyresampled($img_dst, $img_src, 0,0,0,0,
			$w_dst,$h_dst,$w_src,$h_src);
			imagejpeg($img_dst, $file_dst);
		
			imagedestroy($img_src);
			imagedestroy($img_dst);
	}
?>