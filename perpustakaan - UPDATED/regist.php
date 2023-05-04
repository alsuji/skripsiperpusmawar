<?php 
require 'functions.php';
// koneksi ke DBMS
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");


// cek apakah tombol submit sudah ditekan / belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil ditambah / tidak
	if( registrasi($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
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
	<meta charset="utf-8">
	<title>Registrasi</title>
	<link rel="stylesheet" href="css/regist.css">
</head>
<body>

	<header>
		<div class="header-left">
			<a href="index.php">
				<img class="logo" src="images/logo-mawar.PNG">
			</a>
			<h1>Perpustakaan Mawar</h1>
		</div>
	</header>

	<div class="main">
		<div class="regist-box">
			<form action="" method="post" >
				<ul>
					<h3>Formulir Pendaftaran</h3>
					<li>
						<input type="text" name="nama" id="nama" placeholder="Nama" required="">
					</li>
					<li>
						<input type="text" name="npm" id="npm" placeholder="NPM" required="">
					</li>
					<li>
						<input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" required="">
					</li>
					<li>
						<input type="text" name="fakultas" id="fakultas" placeholder="Fakultas" required="">
					</li>
					<li>
						<input type="password" name="password" id="password" placeholder="Masukkan Password" required="">
					</li>
					<li>
						<input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required="">
					</li>
					<div class="btn-wrapper">
						<button class="btn submits" type="submit" name="submit">Daftar</button>
					</div>
				</ul>
			</form>
		</div>
	</div>
	<!-- Footer -->
	<footer>
		<div class="footer-right">
			<a href="index.php">
				<img class="logo1" src="images/logo-mawar.PNG">
			</a>
			<h1>Perpustakaan Mawar</h1>
		</div>
	</footer>
</body>
</html>