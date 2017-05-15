<?php
	include "konek.php" ;
	$idbuku = $_GET['idbuku'];
	$sql = "select * from buku where idbuku = '$idbuku'";
	$hasil = mysql_query($sql);
	if (!$hasil)
	die("Gagal query..".mysql_error());
?>
<table border="1"><h2>KONFIRMASI HAPUS BUKU <h2>
<?php	
       $no = 0;
       while ($row = mysql_fetch_array($hasil)) { 
         echo " <tr>";
         echo "<td colspan=\"2\" align=\"center\"><img align='center' src='".$row['foto']."' width='100'  height=\"100\"/></a></td> " ;
		 echo " </tr>";
		 echo " <tr>";
		 echo"<td>Kode Buku</td><td> ".$row['kode']." </td>";
		 echo " </tr>";echo " <tr>";
		 echo"<td>Judul Buku</td><td> ".$row['judul']." </td>";
		 echo " </tr>"; echo " <tr>";
		 echo"<td>Pengarang</td><td> ".$row['pengarang']." </td>";
		 echo " </tr>";
		 echo " <tr>";
		 echo"<td>Penerbit</td><td> ".$row['penerbit']." </td>";
		 echo " </tr>";
       }
?>
<tr><td colspan="2"><hr/></td></tr>
<tr><td colspan="2" align="center"><br/>APAKAH DATA BUKU INI AKAN DI HAPUS ?? <br/><br/>
<?php
	echo "<a href='barang_hapus.php?idbuku=$idbuku&hapus=1' >YA</a>&nbsp;
		  <a href='buku_tampil.php' >TIDAK</a>
		  </td></tr>";
	
	if (isset($_GET['hapus'])) {
	$data = mysql_fetch_assoc($hasil);
	$sql = "delete from buku where idbuku = '$idbuku' ";
	$hasil = mysql_query($sql);
	if (!$hasil) {
		echo "Gagal Hapus Buku: $nama ..<br/>";
		echo "<a href='buku_tampil.php'>Kembali ke Daftar Buku</a>";
	} else {
		$gbr = "pict/$foto";
		if (file_exists($gbr)) unlink($gbr);
		$gbr = "thumb/t_$foto";
		if (file_exists($gbr)) unlink($gbr);
		header('location:buku_tampil.php');
	}
}
?>
</table>