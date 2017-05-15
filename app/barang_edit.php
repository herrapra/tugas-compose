<?php
	$idbuku = $_GET['idbuku'];
	include "konek.php";
	$sql	 = "select * from buku where idbuku = '$idbuku'";
	$hasil	 = mysql_query($sql);
	if (!$hasil) die ('gagal query...');
	
	$data		= mysql_fetch_array($hasil);
	$kode		= $data['kode'];
	$judul		= $data['judul'];
	$pengarang	= $data['pengarang'];
	$penerbit	= $data['penerbit'];
	$stok		= $data['stok'];
	$foto		= $data['foto'];
?>
<h2>.:: INPUT BUKU ::.</h2>
<form action='buku_simpan.php' method='post' enctype='multipart/form-data'>
	<input type="hidden" name="idbuku" value="<?php echo $idbuku;?>"/>
<table border='1'>
	<tr>
		<td>Kode  </td>
		<td><input type='text' name='kode' maxlength='9' size='10' value="<?php echo $kode;?>"/></td>
	</tr>
	<tr>
		<td>Judul Buku  </td>
		<td><input type='text' name='judul' maxlength='40' size='31' value="<?php echo $judul;?>"/></td>
	</tr>
	<tr>
		<td>Pengarang  </td>
		<td><input type='text' name='pengarang' maxlength='40' size='31' value="<?php echo $pengarang;?>"/></td>
	</tr>
	<tr>
		<td>Penerbit  </td>
		<td><input type='text' name='penerbit' maxlength='40' size='31' value="<?php echo $penerbit;?>"/></td>
	</tr>
	<tr>
		<td>Jumlah Stok  </td>
		<td><input type='text' name='stok' maxlength='9' size='10' value="<?php echo $stok;?>"/></td>
	</tr>
	<tr>
		<td>Foto [max=1.5MB] </td>
		<td>
			<input type="file" name="foto"></br>
			<input type="hidden" name="foto_lama" value="<?php echo $foto;?>" /><br/>
			<img src="<?php echo "thumb/t_".$foto;?>" width="100px"/>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
			<input type='submit' value='Simpan' name='proses' />
			<input type='reset' value='Reset' name='reset' />
		</td>
	</tr>
</table>
</form>

