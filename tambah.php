<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekanb atau belum
if( isset($_POST["submit"]) ) {
	


	// cek apakah data berhasil ditambahkan atau ngga
	if( tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('Data Berhasil Ditambahkan');
			document.location.href = 'index.php';
		</script> 
		";
	}else {
		echo "
		<script>
			alert('Data Gagal Ditambahkan');

		</script> 
		";
	}

}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tambah Daftar Barang</title>
 </head>
 <body>
 
 		<h1>Tambah Data barang</h1>

 		<form action="" method="POST">
 				<label for="kode"> Kode Barang : </label>
 				<input type="text" name="kode" id="kode" required><br>
 				<label for="nama">Nama barang : </label>
 				<input type="text" name="nama" id="nama" required><br>
 				<label for="harga">Harga : </label>
 				<input type="text" name="harga" id="harga" required><br>
 				<label for="persediaan">Persediaan : </label>
 				<input type="text" name="persediaan" id="persediaan" required><br>
 				<br>
 				<button type="submit" name="submit" id="submit">Gaskeun</button>

 		</form>

 </body>
 </html>