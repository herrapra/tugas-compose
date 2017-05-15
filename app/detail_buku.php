<a href="buku_isi.php">INPUT BUKU</a>&nbsp; &nbsp; &nbsp; 
<a href="cari_buku.php">CARI BUKU</a>&nbsp; &nbsp; &nbsp; 
<a href="buku_tampil.php">DAFTAR BUKU</a>&nbsp; &nbsp; &nbsp; 
<h2>INFORMASI BUKU</h2>
<?php
include "konek.php";
$idbuku=$_GET['idbuku'];

$sql=mysql_query("select * from buku where idbuku=$idbuku");
$row=mysql_fetch_assoc($sql);

?>
<table border="1">
<?php
		echo"<tr>";
			echo"<td colspan='2'> <a href='pict/{$row['foto']} ' />
				<img src='thumb/t_{$row['foto']} ' width='100' />
				</a> </td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>Kode Buku </td>";
			echo"<td>".$row['kode']."</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>Judul Buku </td>";
			echo"<td>".$row['judul']." </td> ";
		echo"</tr>";
		echo"<tr>";
			echo"<td>Pengarang </td>";
			echo"<td>".$row['pengarang']." </td> ";
		echo"</tr>";
		echo"<tr>";
			echo"<td>Penerbit </td>";
			echo"<td>".$row['penerbit'];
		echo"</tr>";
?>
</table>