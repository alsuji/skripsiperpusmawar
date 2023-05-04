<?php 
session_start();
if( !isset($_SESSION["login-admin"]) ) {
	header("Location: ../login.php");
	exit;
}



require '../functions.php';

// ambil data di url
$id = $_GET["id_buku"];
// query data buku berdasarkan id
$buku = query2("SELECT * FROM buku WHERE id_buku = $id") [0];


// koneksi ke DBMS
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");


// cek apakah tombol submit sudah ditekan / belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah / tidak
	if( ubah2($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'halamanbuku.php';
			</script>
		";
	} else { echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'halamanbuku.php';
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Buku</title>
	<link rel="stylesheet" type="text/css" href="../css/regist.css">
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
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_buku" value="<?= $buku["id_buku"] ?>">
			<ul>
				<h1>Ubah Data Buku</h1>
				<li>
					<input type="text" name="loker_buku" id="loker_buku" placeholder="Loker Buku" required="" value="<?= $buku["loker_buku"]; ?>">
				</li>
				<li>
					<input type="text" name="no_rak" id="no_rak" placeholder="No. Rak" required="" value="<?= $buku["no_rak"]; ?>">
				</li>
				<li>
					<input type="text" name="no_laci" id="no_laci" placeholder="No. Laci" required="" value="<?= $buku["no_laci"]; ?>">
				</li>
				<li>
					<input type="text" name="no_buku" id="no_buku" placeholder="No. Buku" required="" value="<?= $buku["no_buku"]; ?>">
				</li>
				<li>
					<input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" required="" value="<?= $buku["judul_buku"]; ?>">
				</li>
				<li>
					<input type="text" name="nama_pengarang" id="nama_pengarang" placeholder="Nama Pengarang" required="" value="<?= $buku["nama_pengarang"]; ?>">
				</li>
				<li>
					<input type="text" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit" required="" value="<?= $buku["tahun_terbit"]; ?>">
				</li>
				<li>
					<input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" required="" value="<?= $buku["penerbit"]; ?>">
				</li>
				<li>
					<input type="text" name="status" id="status" placeholder="Status" required="" value="<?= $buku["status"]; ?>">
				</li>
				<li>
					<input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" required="" value="<?= $buku["keterangan"]; ?>">
				</li>
				<div class="btn-wrapper">
					<button class="btn submits" type="submit" name="submit">Ubah Data!</button>
				</div>
			</ul>
		</form>
	</div>
</div>

</body>
</html>