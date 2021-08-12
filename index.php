<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}


require 'functions.php';
$obat = query("SELECT * FROM farmasi");
$result = mysqli_query($koneksi, "SELECT * FROM farmasi");

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Halaman Admin</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<h1>Daftar Barang</h1>

 	<a href="logout.php">Logout</a><br>
 	<a href="tambah.php">Tambah Barang</a>
 	<br><br>

 	<div id="container">
 		<table border="5" cellpadding="10" cellspacing="0">
 			<tr>
 				<th>NO.</th>
 				<th>Kode Barang</th>
 				<th>Nama Barang</th>
 				<th>Harga</th>
 				<th>Persediaan</th>
 				<th>Edit</th>
 				<th>Hapus</th>

 			</tr>
 			<?php $i = 1; ?>
 			<?php foreach( $obat as $row ) : ?>
 			<tr>
 				<td><?= $i; ?></td>
 				<td><?= $row["kode_barang"] ?></td>
 				<td><?= $row["Nama_barang"] ?></td>
 				<td><?= $row["Harga"] ?></td>
 				<td><?= $row["persediaan"] ?></td>
 				<td><a href="edit.php?id=<?= $row["id"]; ?>" >Edit</a></td>
 				<td><a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin?')">Hapus</a></td>

 			</tr>
 			<?php $i++; ?>
 			<?php endforeach; ?>

 		</table>
 		
 	</div>
 </body>
 </html>