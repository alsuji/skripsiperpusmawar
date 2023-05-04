<?php 
require '../functions.php';

$id = $_GET["id_buku"];

if( hapus2($id) > 0 ) {
	echo "
		<script>
		alert('buku berhasil dihapus');
		document.location.href = 'halamanbuku.php';
		</script>
		";
	} else { 
	echo "
		<script>
		alert('buku gagal dihapus!');
		document.location.href = 'halamanbuku.php';
		</script>
		";
}

?>