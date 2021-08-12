<?php 
session_start();

	if( isset($_SESSION["login"]) ) {
		header("Location: index.php");
	}

require 'functions.php';

if( isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) ===1 ) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}

	}
	$error = true;
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 	
	<div class="container">
		<h1>LOGIN ADMIN</h1>
		<?php if( isset($error) ) : ?>
			<p>username / password salah</p>
		<?php endif; ?>	
		<form action="" method="POST">
			
					<label for="username">Masukan Username :</label>
					<input type="text" name="username" id="username" placeholder="Username"><br>
				
				
					<label for="password">Masukan Password :</label>
					<input type="password" name="password" id="password"placeholder="Password"><br>
				
				
					<button type="submit" name="login" id="login">Login</button><br>
			
					<p>Belum punya akun? daftar <a href="registrasi.php">disini</a></p>

		</form>
	</div>
</body>
</html>