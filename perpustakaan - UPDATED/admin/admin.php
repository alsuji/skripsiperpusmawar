<?php
session_start();

if( !isset($_SESSION["login-admin"]) ) {
	header("Location: ../login.php");
	exit;
}

require '../functions.php';
$mhs = mysqli_query($koneksi, "SELECT * FROM users");
$mahasiswa = mysqli_num_rows($mhs);
$bk = mysqli_query($koneksi, "SELECT * FROM buku");
$buku = mysqli_num_rows($bk);
// tombol cari ditekan
// if ( isset($_POST["cari"]) ) {
// 	$buku = cari($_POST["keyword"]);
// }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu Admin</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>

	<header>
		<div class="header-left">
			<a href="#">
				<img class="logo" src="../images/logo-mawar.PNG">
			</a>
			<h1>Perpustakaan Mawar</h1>
		</div>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link" href="admin.php">Home</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="halamananggota.php">Anggota</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="halamanbuku.php">Daftar Buku</a>
			  </li>
			  <li class="nav-item">
				<a class="logout" href="../logout.php">Log out</a>
			  </li>
			</ul>
	</header>

<div class="container">
	<h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>

	<form action="halamanbuku.php" method="get">
	
		<input type="text" name="keyword" size="40" placeholder="Masukkan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari</button>

	</form>

	<div class="item">
		<img class="img" src="../images/logo-mawar.PNG">
		<h3>Data Perpustakaan Mawar</h3>
		<p>Jumlah Anggota : <b><?php echo $mahasiswa; ?></b> Orang</p>
		<p>Jumlah Buku : <b><?php echo $buku; ?></b> Item</p>
	</div>
</div>


</body>
</html>