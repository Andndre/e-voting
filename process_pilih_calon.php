<?php 
session_start();

include "koneksi.php";

$sql = "INSERT INTO memilih (nisn_siswa, nisn_calon, id_pemilihan) VALUES ($_SESSION[nisn], '$_GET[nisn]', '1')";

$result = $koneksi->query($sql);

if ($result) {
	header("Location: dashboard_siswa.php");
} else {
	echo "Data gagal ditambahkan";
}
?>
