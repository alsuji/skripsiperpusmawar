<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}

require '../functions.php';

$id_user = $_SESSION['id_user'];
$un 	 = $_SESSION['nama'];

$q = mysqli_query($koneksi, "SELECT * FROM users");
$data = mysqli_num_rows($q);

if (isset($_GET['keyword'])) {
	$datapinjaman = query2("SELECT * FROM datapinjaman WHERE id_user = '$id_user' and judul_buku like '%" . $_GET['keyword'] . "%' order by id_pinjaman desc ");
} else {	
	$datapinjaman = query2("SELECT * FROM datapinjaman WHERE id_user = '$id_user' order by id_pinjaman desc ");
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Menu Pinjaman</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>

<body>
	<!-- Header -->
	<header>
		<div class="header-left">
			<a href="#.php">
				<img class="logo" src="../images/logo-mawar.PNG">
			</a>
			<h1>Perpustakaan Mawar</h1>
		</div>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="logout" href="../logout.php">Log out</a>
			</li>
		</ul>
	</header>

	<div class="container">
		<h2>Selamat Datang, <?= $un; ?></h2>

		<form action="" method="get">

			<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off" value="<?= ($_GET['keyword'] ?? '') ?>">
			<button type="submit" name="cari">Cari</button>

		</form>

		<div class="btn-wrapper">
			<a class="btn signup" href="pinjambuku.php" style="font-size: 18px;">Pinjam Buku</a>
		</div>

		<br>
		<table border="1" width="100%" cellpadding="8" cellspacing="0">

			<tr>
				<th width="1%">No.</th>
				<th>Nama Peminjam</th>
				<th>Judul Buku</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Lama Pinjam</th>
				<th>Status</th>
				<th>Denda</th>
				<th>Aksi</th>
			</tr>

			<?php $i = 1 ?>
			<?php foreach ($datapinjaman as $row) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $row["nama_peminjam"]; ?></td>
					<td><?= $row["judul_buku"]; ?></td>
					<td><?= $row["tgl_pinjam"]; ?></td>
					<td><?= $row["tgl_kembali"]; ?></td>
					<td><?= $row["lama_pinjam"]; ?> Hari</td>
					<td><?= $row["status"]; ?></td>
					<td>Rp <?= $row["denda"]; ?></td>
					<td>
						<?php if ($row['status'] != 'Dikembalikan') : ?>
							<div class="btn-wrapper">
								<a class="btn signup" href="kembalikan.php?id_pinjaman=<?= $row["id_pinjaman"]; ?>" onclick="return confirm('Yakin akan mengembalikan buku ini?');">Kembalikan</a> |
								<a class="btn signup" href="https://saweria.co/perpustakaanmawar" ;>Bayar Denda</a>
							</div>
						<?php endif; ?>
					</td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
		</table>
	</div>


</body>

</html>