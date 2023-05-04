<?php
session_start();

if( !isset($_SESSION["login-admin"]) ) {
	header("Location: ../login.php");
	exit;
}

require '../functions.php';
$buku = query2("SELECT * FROM buku");
$mahasiswa = query("SELECT * FROM users");

// tombol cari ditekan
if ( isset($_POST["cari"]) ) {
	$buku = cari($_POST["keyword"]);
}
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
			<a href="index.php">
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
	<h2>Selamat Datang, admin</h2>

	<form action="" method="post">
	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari</button>

	</form>
	<div class="btn-wrapper">
		<a class="btn signup" href="regist2.php" style="font-size: 35px;">+</a>
	</div>

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
				<a href="ubah.php?id_user=<?= $row["id_user"]; ?>">Ubah</a> |
				<a href="hapus.php?id_user=<?= $row["id_user"]; ?>" onclick="return confirm('Yakin akan menghapus data ini?');">Hapus</a>
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