<a href="buku_tampil.php">DAFTAR BUKU</a>&nbsp; &nbsp; &nbsp; 
<a href="cari_buku.php">CARI BUKU</a>
<h2>INPUT BUKU</h2>
<hr/>
<form action="buku_simpan.php" method="post" enctype="multipart/form-data">
<table>
	<tr>
		<td>Kode </td>
		<td> <input type="text" name="kode"></td>
	</tr>
	<tr>
		<td>Judul Buku </td>
		<td><input type="text" name="judul"></td>
	</tr>
	<tr>
		<td>Pengarang </td>
		<td><input type="text" name="pengarang"/> </td>
	</tr>
	<tr>
		<td>Penerbit </td>
		<td><input type="text" name="penerbit"></td>
	</tr>
	<tr>
		<td>Jumlah Stock </td>
		<td><input type="text" name="stok"></td>
	</tr>
	<tr>
		<td>Foto Sampul </td>
		<td><input type="file" name="foto"></td>
	</tr>
	
	</table>
	<hr/>
	<input type="submit" value="Simpan" name="proses"/>
	<input type="reset" value="Reset"/>
</form>
