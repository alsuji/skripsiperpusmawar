<?php 
session_start();
require 'functions.php';

if( isset($_SESSION["login"]["login-admin"]) ) {
	header("Location: login.php");
	exit;
}

// cek apakah tombol submit sudah ditekan atau belum
// if (isset($_POST["login-admin"]) ) {
// 	// cek username & password
// 	if ($_POST["name"] == "admin" && $_POST["password"] == "admin123") {
// 		$_SESSION["login-admin"] = true;

// 	// jika benar, redirect ke halaman admin
// 		header("location: admin.php");
// 		exit;
// 	} else {
// 	// jika salah, tampilkan pesan kesalahan
// 		$error = true;
// 	}
// }

//Login Admin
if (isset($_POST["login-admin"])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = $koneksi->query("SELECT * FROM admin 
			WHERE username = '$username'
			AND password = '$password'");

	// cek username
	if (mysqli_num_rows($result) === 1) {
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			$_SESSION['login-admin'] = true;

			header("location: admin/admin.php");
			exit;
		}
	$error = true;
}

// Login Akun
if (isset($_POST["login"])) {
	
	$nm 		= $_POST["nama"];
	$password 	= $_POST["password"];

	$result = $koneksi->query("SELECT * FROM users
			WHERE nama = '$nm'");
	// $get_data = mysqli_fetch_array($result);

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION['id_user'] = $row['id_user'];
			$_SESSION['nama'] = $nm;
			$_SESSION['login'] = true;

			header("location: user/datapeminjaman.php");
			exit;
		}
	}
	$error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<!-- Header -->
<header>
	<div class="header-left">
		<a href="index.php">
			<img class="logo" src="images/logo-mawar.PNG">
		</a>
		<h1>Perpustakaan Mawar</h1>
	</div>
</header>

<!-- KONTEN LOGIN -->
<div class="container">
	<!-- LOGIN USER-->
	<div class="main">
		<div class="login-box">
			<form action="" method="post">
				<ul>
					<h3>Login Akun</h3>
						<?php if( isset($error)) : ?>
						<p style="color: red; font-style: italic;">NPM / password salah!</p>
						<?php endif; ?>
					<li>
						<input type="text" name="nama" placeholder="Masukkan Nama Anda" required>
					</li>
					<li>
						<input type="password" name="password" placeholder="Masukkan Password" required>
					</li>
					<li>
					<div class="btn-wrapper">
						<button class="btn submits" type="submit" name="login">Login</button>
					</div>
					</li>
					<!-- <h4>Atau</h4>
					<h6>Tempelkan Kartu untuk Login!</h6>
					<img src="images/rfid.PNG"> -->
				</ul>
			</form>
		</div>
	</div>

	<!-- LOGIN ADMIN -->
	<div class="main">
		<div class="login-box">
			<form action="" method="post">
				<ul>
					<h3>Login Admin</h3>
						<?php if( isset($error)) : ?>
						<p style="color: red; font-style: italic;">username / password salah!</p>
						<?php endif; ?>
					<li>
						<input type="text" name="username" placeholder="Masukkan Username Anda" required>
					</li>
					<li>
						<input type="password" name="password" placeholder="Masukkan Password" required>
					</li>
					<li>
					<div class="btn-wrapper">
						<button class="btn submits" type="submit" name="login-admin">Login</button>
					</div>
				</ul>
			</form>
		</div>
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