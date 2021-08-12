<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	 if( registrasi($_POST) > 0 ) {
	 	echo "
	 	 <script>
	 	 	alert('user baru berhasil ditambahkan');
	 	 </script>
	 	 ";
	 } else {
	 	echo mysqli_error($koneksi);
	 }
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Halaman Registrasi</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<div class="container">
 		<h1>Registrasi</h1>
 		<form action="" method="POST">
 			<label for="username">Username</label>
 			<input type="text" name="username" id="username"><br>
 			<label for="password">Password</label>
 			<input type="password" name="password" id="password"><br>
 			<label for="password2">Konfirmasi Password</label>
 			<input type="password" name="password2" id="password2"><br>

 			<button type="submit" name="register">Daftar</button><br>
 			<p>Sudah Punya Akun? <a href="login.php">Login</a></p>
 			
 		</form>
 		
 	</div>
 
 </body>
 </html>