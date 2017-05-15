<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "db";
$user = "root";
$pass = "tika";
$db = "tugas11";

$kon = mysql_connect ($host, $user, $pass);
if (!$kon)
	die("Gagal Koneksi...");
	
$hasil = mysql_select_db($db);
if (!$hasil) {
	$hasil = mysql_query("CREATE DATABASE $db");
	if (!$hasil)
		die("Gagal Buat Database");
	else
		$hasil - mysql_select_db ($db);
		if (!$hasil) die ("Gagal Konek Database");
}

$sqlTabelBuku = "create table if not exists buku (
					idbuku int auto_increment not null primary key,
					kode varchar(10) not null,
					judul varchar(40) not null,
					pengarang varchar(40) not null,
					penerbit varchar(40)not null,
					stok int not null default 0,
					foto varchar(70) not null default '',
					key(idbuku))";
					
mysql_query ($sqlTabelBuku) or die("Gagal Buat Tabel Buku");

$sqlTabelPinjam = "create table if not exists pinjam (
					idpinjam int auto_increment not null primary key,
					tanggal date not null,
					namacust varchar(50) not null,
					email varchar(50) not null default '',
					notelp varchar(20) not null default ''
					)";
					
mysql_query ($sqlTabelPinjam) or die("Gagal Buat Tabel Pinjam");

?>