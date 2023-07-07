<?php 
include "koneksi.php";

$sql = "DELETE FROM siswa WHERE nisn = '$_GET[nisn]'";
$result = $koneksi->query($sql);

if ($result) {
	header("Location: akun_siswa.php");
} else {
	echo "Data gagal dihapus";
}
?>
