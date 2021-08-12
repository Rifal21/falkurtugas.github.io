<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$obt = query("SELECT * FROM farmasi WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekanb atau belum
if( isset($_POST["submit"]) ) {
	


// cek apakah data berhasil ubah atau ngga
	if( edit($_POST) > 0 ) {
	echo "
		<script>
			alert('Data Berhasil Diedit');
			document.location.href = 'index.php';
		</script> 
		";
	}else {
		echo "
		<script>
			alert('Data Gagal Diedit');

		</script> 
		";
	}
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ubah Daftar Barang</title>
 </head>
 <body>
 
 		<h1>Edit Data barang</h1>

 		<form action="" method="POST">
 				
 				<input type="hidden" name="id" id="id" value="<?= $obt["id"]; ?>">
 				<label for="kode"> Kode Barang : </label>
 				<input type="text" name="kode" id="kode" required value="<?= $obt["kode_barang"]; ?>"><br>
 				<label for="nama">Nama barang : </label>
 				<input type="text" name="nama" id="nama" required value="<?= $obt["Nama_barang"]; ?>"><br>
 				<label for="harga">Harga : </label>
 				<input type="text" name="harga" id="harga" required value="<?= $obt["Harga"]; ?>"><br>
 				<label for="persediaan">Persediaan : </label>
 				<input type="text" name="persediaan" id="persediaan" required value="<?= $obt["persediaan"]; ?>"><br>
 				<br>
 				<button type="submit" name="submit" id="submit">Gaskeun</button>

 		</form>

 </body>
 </html>