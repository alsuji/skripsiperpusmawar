<?php 
require '../functions.php';

$id = $_GET["id_user"];

if( hapus($id) > 0 ) {
	echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'halamananggota.php';
		</script>
		";
	} else { 
	echo "
		<script>
		alert('data gagal dihapus!');
		document.location.href = 'halamananggota.php';
		</script>
		";
}
?>