<?php 
require '../functions.php';

// cek apakah tombol submit sudah ditekan / belum
if ( isset($_POST["submit"]) ) {

	// cek apakah buku berhasil ditambah / tidak
	if( tambahbuku($_POST) > 0) {
		echo "
			<script>
				alert('buku berhasil ditambahkan!');
				document.location.href = 'halamanbuku.php';
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
	<title>Tambah Data Buku</title>
	<link rel="stylesheet" href="../css/regist.css">
</head>
<body>

	<header>
		<div class="header-left">
			<a href="halamanbuku.php">
				<img class="logo" src="../images/logo-mawar.PNG">
			</a>
			<h1>Perpustakaan Mawar</h1>
		</div>
	</header>

<div class="main">
	<div class="regist-box">
		<form action="" method="post">
			<ul>
				<h1>Tambah Data Buku</h1>
				<li>
					<input type="text" name="loker_buku" id="loker_buku" placeholder="Loker Buku" required="">
				</li>
				<li>
					<input type="text" name="no_rak" id="no_rak" placeholder="No. Rak" required="">
				</li>
				<li>
					<input type="text" name="no_laci" id="no_laci" placeholder="No. Laci" required="">
				</li>
				<li>
					<input type="text" name="no_buku" id="no_buku" placeholder="No. Buku" required="">
				</li>
				<li>
					<input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" required="">
				</li>
				<li>
					<input type="text" name="nama_pengarang" id="nama_pengarang" placeholder="Nama Pengarang" required="">
				</li>
				<li>
					<input type="text" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit" required="">
				</li>
				<li>
					<input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" required="">
				</li>
				<li>
					<input type="text" name="status" id="status" placeholder="Status" required="">
				</li>
				<li>
					<input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" required="">
				</li>
				<div class="btn-wrapper">
					<button class="btn submits" type="submit" name="submit">Tambah Buku</button>
				</div>
			</ul>
		</form>
	</div>
</div>

</body>
</html>