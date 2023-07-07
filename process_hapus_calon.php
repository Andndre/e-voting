<?php 
include "koneksi.php";

$sql = "DELETE FROM calon WHERE nisn = '$_GET[nisn]'";
$result = $koneksi->query($sql);

if ($result) {
	header("Location: calon_ketua_osis.php");
} else {
	echo "Data gagal dihapus";
}
?>
