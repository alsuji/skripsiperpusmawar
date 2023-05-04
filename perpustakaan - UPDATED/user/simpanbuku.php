<?php 

session_start();
require '../functions.php';

function simpanbuku($datapinjaman) {
	global $koneksi, $query;

	$id = $_GET($datapinjaman['id_buku']);
	$nama_peminjam = $_GET($datapinjaman['nama_peminjam']);
	$judul_buku = $_GET($datapinjaman['judul_buku']);
	$tgl_pinjam = $_GET($datapinjaman['tgl_pinjam']);
	$tgl_kembali = $_GET($datapinjaman['tgl_kembali']);
	$lama_pinjam = $_GET($datapinjaman['lama_pinjam']);
	$status = $_GET($datapinjaman['status']);
	$denda = $_GET($datapinjaman['denda']);

	// Tambah Buku Ke akun
	mysqli_query($koneksi, "INSERT INTO datapinjaman 
		VALUES(NULL, '$id',
					'$nama_peminjam',
					'$judul_buku', 
					'$tgl_pinjam', 
					'$tgl_kembali',
					'$lama_pinjam',
					'$status',
					'$denda')
					");

	return mysqli_affected_rows($koneksi);

}

?>