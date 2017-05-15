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

	include "koneksi.php";
	$sql = mysql_query("select * from buku where idbuku not in (".$buku_pilih.")
		order by idbuku desc") ;
		
if(!$sql)
die("Gagal Query.." .mysql_error());
echo "<h2>DAFTAR BUKU TERSEDIA </h2>";
echo "<table border='1'>
	<tr><th>Foto</th><th>Judul Buku</th><th>Pengarang</th><th>Operasi</th></tr>";
			
		$no = 0;	
		while($row = mysql_fetch_assoc($sql)){
			echo("<tr>
				<td> <a href='pict/".$row['foto']." ' />
                 <img src='thumb/t_".$row['foto']." ' width='100' /> 
                 </a> </td>
				<td>$row[nama]</td>
				<td>$row[pengarang]</td>
				<td>
					<a href='".$_SERVER['PHP_SELF']."?idbuku=".$row['idbuku']."'>PINJAM</a>
				</td>
			</tr>");
		}
		echo("</table>");
?>