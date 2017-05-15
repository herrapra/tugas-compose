<?php
	$buku_pilih =0;
	if(isset($_COOKIE['keranjang'])){
	$buku_pilih = $_COOKIE['keranjang'];
	}

	if (isset($_GET['idbuku'])){
	$idbuku = $_GET['idbuku'];
	$buku_pilih = $buku_pilih ."," .$idbuku;
	setcookie('keranjang',$buku_pilih, time()+3600);
	}

	include "konek.php";
	$sql = "select * from buku where idbuku in (".$buku_pilih.")
		order by idbuku desc" ;
	$hasil = mysql_query($sql);
	if (!$hasil)
		die("Gagal query ..".mysql_error());
?>
<h2> KERANJANG PEMINJAMAN </h2>
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
	  echo "<a href='".$_SERVER['PHP_SELF']."?idbuku=".
	  		$row['idbuku']."'>BATAL</a>";
	  echo "</td>";
	  echo"</tr>";
	}
?>
</table>