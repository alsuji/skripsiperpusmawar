<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if ( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menu Utama</title>
	<link rel="stylesheet" href="menu.css">
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
		<div class="header-right">
			<a href="index.php" class="logout">Log out</a>
		</div>
	</header>

<div class="container">
	<h2>Selamat Datang <?php $nama ?></h2>

	<form action="" method="post">
	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari</button>
		<div class="add">
			<a href="regist.php" class="regist">Tambah Data</a>
		</div>

	</form>

	<br>
	<table border="3" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Fakultas</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach( $mahasiswa as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">	Hapus</a>
			</td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["npm"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
			<td><?= $row["fakultas"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
</div>


</body>
</html>