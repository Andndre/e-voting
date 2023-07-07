<?php 
include "koneksi.php";

$sql = "UPDATE pemilihan SET judul = '$_POST[judul]' WHERE id='1'";
$result = $koneksi->query($sql);

if ($result) {
	header("Location: dashboard_admin.php");
} else {
	echo "Data gagal diubah";
}
?>
