<?php 
require '../functions.php';

$id = $_GET["id_pinjaman"];

if( kembalikan($id) > 0 ) {
	echo "
		<script>
		alert('Buku berhasil dikembalikan');
		document.location.href = 'datapeminjaman.php';
		</script>
		";
	} else { 
	echo "
		<script>
		alert('buku gagal dikembalikan! Bayar denda anda terlebih dahulu.');
		document.location.href = 'datapeminjaman.php';
		</script>
		";
}
?>