<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login.php");
	exit;
}

require '../functions.php';

$mahasiswa = mysqli_query($koneksi, "SELECT * FROM users");
$mhs = mysqli_fetch_assoc($mahasiswa);

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
				<a class="logout" href="index.php">Log out</a>
			  </li>
			</ul>
	</header>

<div class="container">
	<h2>Halo, <?= $_SESSION['nama']  ?></h2>

	<table border="3" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Fakultas</th>
			<th>Aksi</th>
		</tr>

		<?php $i = 1; ?>

		<tr>
			<td><?= $i; ?></td>
			<td><?= $mhs["npm"]; ?></td>
			<td><?= $mhs["nama"]; ?></td>
			<td><?= $mhs["jurusan"]; ?></td>
			<td><?= $mhs["fakultas"]; ?></td>
			<td><a href="ubahdatauser.php?id_user=$id_user?>">Ubah Data</a></td>
		</tr>
		<?php $i++; ?>

	</table>
</div>


</body>
</html>