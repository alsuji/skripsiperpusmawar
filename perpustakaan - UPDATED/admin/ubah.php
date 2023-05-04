<?php 
session_start();
if( !isset($_SESSION["login-admin"]) ) {
	header("Location: ../login.php");
	exit;
}

require '../functions.php';

// ambil data di url
$id = $_GET["id_user"];
// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM users WHERE id_user = $id") [0];

// koneksi ke DBMS
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");


// cek apakah tombol submit sudah ditekan / belum
if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah / tidak
	if( ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'halamananggota.php';
			</script>
		";
	} else { echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'halamananggota.php';
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="../css/regist.css">
</head>
<body>

	<header>
		<div class="header-left">
			<a href="halamananggota.php">
				<img class="logo" src="../images/logo-mawar.PNG">
			</a>
			<h1>Perpustakaan Mawar</h1>
		</div>
	</header>

<div class="main">
	<div class="regist-box">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_user" value="<?= $mhs["id_user"] ?>">
			<ul>
				<h1>Ubah data mahasiswa</h1>
				<li>
					<input type="text" name="nama" id="nama" required="" value="<?= $mhs["nama"]; ?>">
				</li>
				<li>
					<input type="text" name="npm" id="npm" required="" value="<?= $mhs["npm"]; ?>">
				</li>
				<li>
					<input type="text" name="jurusan" id="jurusan" required="" value="<?= $mhs["jurusan"]; ?>">
				</li>
				<li>
					<input type="text" name="fakultas" id="fakultas" required="" value="<?= $mhs["fakultas"]; ?>">
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