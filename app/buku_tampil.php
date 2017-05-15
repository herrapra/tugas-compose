<?php
$judul_cari="";
$pengarang_cari="";
if (isset($_POST["judul"]))
	$judul_cari = $_POST["judul"];

if (isset($_POST["pengarang"]))
	$pengarang_cari = $_POST["pengarang"];
	
include "konek.php";

$sql="select * from buku where judul like '%".$judul_cari."%' and pengarang like '%".$pengarang_cari."%'";

$hasil = mysql_query($sql);
	if (!$hasil)
	 die("gagal query".mysql_error());
?>
<a href="buku_isi.php">INPUT BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="cari_buku.php">CARI BUKU</a>

<table border="1">
	<tr>
		<th>FOTO</th>
		<th>JUDUL BUKU</th>
		<th>PENGARANG</th>
		<th></th>
	</tr>
<?php
	$no=0;
	while($row=mysql_fetch_assoc($hasil))
	{
	  echo "<tr>";
	  echo "<td>
			<a href='pict/{$row['foto']} ' />
			<img src='thumb/t_{$row['foto']} ' width='100' /></a> 
		   </td>";
	  echo "<td>".$row['judul']." </td> ";
	  echo "<td>".$row['pengarang']." </td> ";
	  echo "<td> ";
	  echo "<a href='detail_buku.php?idbuku=".$row['idbuku']."'>Lihat Buku</a> ";
	  echo "&nbsp;";
	  echo "<a href='barang_edit.php?idbuku=".$row['idbuku']."'>Edit Buku</a> ";
	  echo "&nbsp;";
	  echo "<a href='barang_hapus.php?idbuku=".$row['idbuku']."'>Hapus Buku</a> ";
	  echo "</td>";
	  echo"</tr>";
	}
?>
</table>