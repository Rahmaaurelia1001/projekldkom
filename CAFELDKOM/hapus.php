<?php
include('koneksi.php');

$nim = $_GET["id"];

$hasil = mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim='$nim'");

if ($hasil) {
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href='index.php';
				
			</script>";
} else {
	echo "
			<script>
				alert('data gagal dihapus');
				document.location.href='index.php';
			</script>
		";
}
