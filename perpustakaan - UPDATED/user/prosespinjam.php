<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}



require '../functions.php';
date_default_timezone_set("Asia/Jakarta") . '<br>'; // Untuk mengatur default tanggal agar dapat otomatis terisi sesuai tanggal ( Realtime )

$tgl_pinjam = date('d-m-Y');
$tgl_kembali = date('d-m-Y', strtotime('+7 days', strtotime($tgl_pinjam)));

$tanggal1 = new DateTime($tgl_pinjam);
$tanggal2 = new DateTime($tgl_kembali);
$perbedaan = $tanggal2->diff($tanggal1)->format("%a");

// ambil data di url
$id = $_GET["id_buku"];
// query data buku berdasarkan id
$buku = query2("SELECT * FROM buku WHERE id_buku = $id") [0];

// cek user
$id_user = $_SESSION['id_user'];
$un 	 = $_SESSION['nama'];

// koneksi ke DBMS
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");


// cek apakah tombol submit sudah ditekan / belum
if ( isset($_POST["submit"]) ) {

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
	<title>Konfirmasi Buku</title>
	<link rel="stylesheet" type="text/css" href="../css/regist.css">

</head>
<body>

	<header>
		<div class="header-left">
			<a href="datapeminjaman.php">
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
				<h1>Konfirmasi Data Buku</h1>
				<li>
					<input type="hidden" name="id_user" id="id_user" placeholder="ID User" value="<?= $id_user; ?>">
				</li>
				<li>
					<input type="text" name="nama_peminjam" id="nama_peminjam" placeholder="Nama Peminjam" required="" value="<?= $un; ?>">
				</li>
<!-- 			<li>
					<input type="text" name="loker_buku" id="loker_buku" placeholder="Loker Buku" required="" value="<?= $buku["loker_buku"]; ?>">
				</li>
				<li>
					<input type="hidden" name="no_rak" id="no_rak" placeholder="No. Rak" required="" value="<?= $buku["no_rak"]; ?>">
				</li>
				<li>
					<input type="hidden" name="no_laci" id="no_laci" placeholder="No. Laci" required="" value="<?= $buku["no_laci"]; ?>">
				</li>
				<li>
					<input type="hidden" name="no_buku" id="no_buku" placeholder="No. Buku" required="" value="<?= $buku["no_buku"]; ?>">
				</li> 
				<li>
					<input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" required="" value="<?= $buku["penerbit"]; ?>">
				</li> -->
				<li>
					<input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" required="" value="<?= $buku["judul_buku"]; ?>">
				</li>
				<li>
					<input type="text" name="tgl_pinjam" id="tgl_pinjam" placeholder="Tanggal Pinjam" value="<?= $tgl_pinjam; ?>">
				</li>
				<li>
					<input type="text" name="tgl_kembali" id="tgl_kembali" placeholder="Tanggal Kembali" value="<?= $tgl_kembali; ?>">
				</li>
				<li>
					<input type="text" name="lama_pinjam" id="lama_pinjam" placeholder="Lama Pinjam" value="<?= $perbedaan; ?>">
				</li>
				<li>
					<input type="text" name="status" id="status" placeholder="Status" required="" value="<?= $buku["status"]; ?>">
				</li>
				<li>
					<input type="hidden" name="denda" id="denda" placeholder="Denda Keterlambatan" value="0">
				</li>
				<div class="btn-wrapper">
					<button class="btn submits" type="submit" name="submit">Pinjam Buku</button>
				</div>
			</ul>
		</form>
	</div>
</div>

</body>
</html>