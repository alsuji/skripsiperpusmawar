<?php 
// koneksi ke db
$koneksi = mysqli_connect("localhost", "root", "", "dbperpus");
// Jangan Lupa ganti dbname dll - ketika hosting

// Jangan lupa ganti Auto Increment - NULL
function query($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query1($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	while( $row = mysqli_fetch_array($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $koneksi;

	$nama = htmlspecialchars ($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$fakultas = htmlspecialchars($data["fakultas"]);

	$query = "INSERT INTO users
				VALUES
				('', '$nama', '$npm', '$jurusan', '$fakultas' )
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapus($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM users WHERE id_user = $id");
	return mysqli_affected_rows($koneksi);
}

function ubah($data) {
	global $koneksi;

	$id = $data["id_user"];
	$nama = htmlspecialchars ($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$fakultas = htmlspecialchars($data["fakultas"]);

		$query = "UPDATE users SET
				nama = '$nama',
				npm = '$npm',
				jurusan = '$jurusan',
				fakultas = '$fakultas'
			WHERE id_user = $id
			";
			
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function cari($keyword) {
	$query = "SELECT * FROM users
				WHERE
				nama LIKE '%$keyword%' OR
				npm LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%' OR
				fakultas LIKE '%$keyword%'
			";
	return query($query);
}

function registrasi($data) {
	global $koneksi;

	$nama = htmlspecialchars ($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$fakultas = htmlspecialchars($data["fakultas"]);
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

	// cek akun sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT npm FROM users WHERE npm = '$npm'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('Nama telah terdaftar!')
				</script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
				</script>";
		return false;
	}

	// enkripsi password
	// $password = md5($password); bahaya bisa dibuka lwt google
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($koneksi, "INSERT INTO users VALUES('', '$nama', '$npm', '$jurusan', '$fakultas', '$password')");

		return mysqli_affected_rows($koneksi);

}


// Buku 2
function query2($query2) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query2);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
// Hapus Buku 2
function hapus2($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = $id");
	return mysqli_affected_rows($koneksi);
}

// Ubah Buku 2
function ubah2($data) {
	global $koneksi;

	$id = $data["id_buku"];
	$loker_buku = htmlspecialchars ($data["loker_buku"]);
	$no_rak = htmlspecialchars($data["no_rak"]);
	$no_laci = htmlspecialchars($data["no_laci"]);
	$no_buku = htmlspecialchars($data["no_buku"]);
	$judul_buku = htmlspecialchars ($data["judul_buku"]);
	$nama_pengarang = htmlspecialchars($data["nama_pengarang"]);
	$tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$status = htmlspecialchars($data["status"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
		$query2 = "UPDATE buku SET
				loker_buku = '$loker_buku',
				no_rak = '$no_rak',
				no_laci = '$no_laci',
				no_buku = '$no_buku',
				judul_buku = '$judul_buku',
				nama_pengarang = '$nama_pengarang',
				tahun_terbit = '$tahun_terbit',
				penerbit = '$penerbit',
				status = '$status',
				keterangan = '$keterangan'
			WHERE id_buku = $id
			";
			
	mysqli_query($koneksi, $query2);

	return mysqli_affected_rows($koneksi);
}
// Cari Buku
function cari2($keyword2) {
	$query2 = "SELECT * FROM buku
				WHERE
				loker_buku LIKE '%$keyword2%' OR
				no_rak LIKE '%$keyword2%' OR
				no_laci LIKE '%$keyword2%' OR
				no_buku LIKE '%$keyword2%' OR
				judul_buku LIKE '%$keyword2%' OR
				nama_pengarang LIKE '%$keyword2%' OR
				tahun_terbit LIKE '%$keyword2%' OR
				penerbit LIKE '%$keyword2%' OR
				status LIKE '%$keyword2%' OR
				keterangan LIKE '%$keyword2%'
			";
	return query2($query2);
}
// Tambah Buku
function tambahbuku($data) {
	global $koneksi;

	$loker_buku = htmlspecialchars ($data["loker_buku"]);
	$no_rak = htmlspecialchars($data["no_rak"]);
	$no_laci = htmlspecialchars($data["no_laci"]);
	$no_buku = htmlspecialchars($data["no_buku"]);
	$judul_buku = htmlspecialchars ($data["judul_buku"]);
	$nama_pengarang = htmlspecialchars($data["nama_pengarang"]);
	$tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$status = htmlspecialchars($data["status"]);
	$keterangan = htmlspecialchars($data["keterangan"]);

	// Tambah Buku Baru Ke Database
	mysqli_query($koneksi, "INSERT INTO buku VALUES ('', '$loker_buku', '$no_rak', '$no_laci', '$no_buku', '$judul_buku', '$nama_pengarang', '$tahun_terbit', '$penerbit', '$status', '$keterangan')");

		return mysqli_affected_rows($koneksi);
}

// Pinjam Buku 
function prosespinjam($data) {
	global $koneksi;

	$id = $data["id_buku"];
	$loker_buku = htmlspecialchars ($data["loker_buku"]);
	$no_rak = htmlspecialchars($data["no_rak"]);
	$no_laci = htmlspecialchars($data["no_laci"]);
	$no_buku = htmlspecialchars($data["no_buku"]);
	$judul_buku = htmlspecialchars ($data["judul_buku"]);
	$nama_pengarang = htmlspecialchars($data["nama_pengarang"]);
	$tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$status = htmlspecialchars($data["status"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
		// mysqli_query($koneksi, "INSERT INTO datapinjaman VALUES ('', '$nama_peminjam', '$judul_buku', NOW(), '$keterangan', '$id_user','$id_buku')

	mysqli_query($koneksi, $query2);

	return mysqli_affected_rows($koneksi);
}

function simpanbuku($datapinjaman) {
	global $koneksi;

	$id = $datapinjaman["id_buku"];
	$id_user1 = $datapinjaman["id_user"];
	$nama_peminjam = $datapinjaman["nama_peminjam"];
	$judul_buku = $datapinjaman["judul_buku"];
	$tgl_pinjam = $datapinjaman["tgl_pinjam"];
	$tgl_kembali = $datapinjaman["tgl_kembali"];
	$lama_pinjam = $datapinjaman["lama_pinjam"];
	$status = $datapinjaman["status"];
	$denda = $datapinjaman["denda"];

	// Tambah Buku Ke akun
	mysqli_query($koneksi, "INSERT INTO datapinjaman VALUES ('', '$id_user1', '$nama_peminjam', '$judul_buku', '$tgl_pinjam', '$tgl_kembali', '$lama_pinjam', '$status', '$denda')");

	return mysqli_affected_rows($koneksi);

	}

function kembalikan($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM datapinjaman WHERE id_pinjaman = $id");
	return mysqli_affected_rows($koneksi);
}

?>