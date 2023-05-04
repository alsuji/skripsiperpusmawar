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
		</div>
	</header>

<div class="container">
	<h2>Silakan pilih buku yang akan di pinjam!</h2>

	<form action="" method="post">
	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari</button>

	</form>
	<table>
		<tr>
			<td>
    		<select name ="judul_buku">
        		<option value="<?= $buku["judul_buku"]; ?>"><?= $buku["judul_buku"]; ?></option>
            	<option value="<?= $buku["judul_buku"]; ?>"></option>
            	<option value="<?= $buku["judul_buku"]; ?>"></option>
            	<option value="<?= $buku["judul_buku"]; ?>"></option>
            	<option value="<?= $buku["judul_buku"]; ?>"></option>
     			<option value="<?= $buku["judul_buku"]; ?>"></option>
        	</select>
   			</td>
   		</tr>
	</table>

</div>

</body>
</html>