<a href="pinjam.php?menu=pilih">PILIH BUKU</a>
&nbsp;&nbsp;&nbsp;
<a href="pinjam.php?menu=keranjang">KERANJANG PEMINJAMAN</a>
&nbsp;&nbsp;&nbsp;
<a href="pinjam.php?menu=pinjam">PEMINJAMAN</a>
<hr/>
<?php
	$menu = isset($_GET["menu"]) ? $_GET["menu"] : "pilih";
	if($menu == "pilih") {
		include("barang_tersedia.php") ;
	} 
	elseif($menu == "keranjang") {
		include("keranjang_buku.php") ;
	}
	elseif($menu == "pinjam") {
		include("peminjaman.php") ;
	}
?>