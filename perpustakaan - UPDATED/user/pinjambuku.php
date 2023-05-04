<?php
session_start();

if( !isset($_SESSION["login"]) ) {
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

// cek apakah tombol pinjamBuku sudah ditekan / belum
if ( isset($_POST["pinjamBuku"]) ) {

	// cek apakah buku berhasil dipinjam / tidak
	if( simpanbuku($_POST) > 0) {
		echo "
			<script>
				alert('buku berhasil dipinjam!');
				document.location.href = 'datapeminjaman.php';
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu Pinjam Buku</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<!-- Header -->
	<header>
		<div class="header-left">
			<a href="datapeminjaman.php">
				<img class="logo" src="../images/logo-mawar.PNG">
			</a>
			<h1>Perpustakaan Mawar</h1>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
				<a href="datapeminjaman.php">Kembali</a>
			  </li>
			</ul>
		</div>
	</header>

<div class="container">
	<h2>Silakan pilih buku yang akan di pinjam!</h2>

	<form action="" method="post">
	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari</button>

	</form>

	<br>
	<table border="3" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Loker Buku</th>
			<th>No. Rak</th>
			<th>No. Laci</th>
			<th>No. Buku</th>
			<th>Judul Buku</th>
			<th>Nama Pengarang</th>
			<th>Tahun Terbit</th>
			<th>Penerbit</th>
			<th>Status</th>
			<th>Keterangan</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach( $buku as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a class="btn pinjamBuku" href="prosespinjam.php?id_buku=<?= $row["id_buku"]; ?>">Pinjam</a>
			</td>
			<td><?= $row["loker_buku"]; ?></td>
			<td><?= $row["no_rak"]; ?></td>
			<td><?= $row["no_laci"]; ?></td>
			<td><?= $row["no_buku"]; ?></td>
			<td><?= $row["judul_buku"]; ?></td>
			<td><?= $row["nama_pengarang"]; ?></td>
			<td><?= $row["tahun_terbit"]; ?></td>
			<td><?= $row["penerbit"]; ?></td>
			<td><?= $row["status"]; ?></td>
			<td><?= $row["keterangan"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
</div>

</body>
</html>