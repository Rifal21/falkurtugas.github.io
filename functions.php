<?php 

// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "phptugas");



function query($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}









function tambah($data) {
	global $koneksi;
	$kode = htmlspecialchars($data["kode"]);
	$Nama = htmlspecialchars($data["nama"]);
	$Harga = htmlspecialchars($data["harga"]);
	$sedia = htmlspecialchars($data["persediaan"]);

		// query insert data
	$query = "INSERT INTO farmasi 
	VALUES 
	('','$kode','$Nama','$Harga','$sedia')
	";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}




function hapus($id) {
	global $koneksi;
	mysqli_query($koneksi , "DELETE FROM farmasi WHERE id = $id");

	return mysqli_affected_rows($koneksi);
}



function edit($data) {

	global $koneksi;
	$id = $data["id"];  
	$kode = htmlspecialchars($data["kode"]);
	$Nama = htmlspecialchars($data["nama"]);
	$Harga = htmlspecialchars($data["harga"]);
	$sedia = htmlspecialchars($data["persediaan"]);

		// query insert data
	$query = "UPDATE farmasi SET 
			kode_barang = '$kode',
			Nama_barang = '$Nama',
			Harga = '$Harga',
			persediaan = '$sedia'
				WHERE id = $id
			";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}


function registrasi($data) {

	global $koneksi;


	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);


	// cek username sudah ada atau belum

	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo " <script>
	 	 			alert('username telah terdaftar);
	 	 		</script>";
	 	 		return false;

	}

	// cek konfirmasi password

	if( $password !== $password2 ) {
		echo " <script>
	 	 			alert('konfirmasi password  gagal);
	 	 		</script>";
	 	 return false;
	} 

// enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);
	
// tambahkan user baru ke database
	mysqli_query($koneksi ,"INSERT INTO user VALUES('','$username','$password')" );


	return mysqli_affected_rows($koneksi);



}



 ?>