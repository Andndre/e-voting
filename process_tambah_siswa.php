<?php 
include "koneksi.php";

$sql = "INSERT INTO siswa (nisn, nama, alamat, kelas, jenis_kelamin) VALUES ('$_POST[nisn]', '$_POST[nama]', '$_POST[alamat]', '$_POST[kelas]', '$_POST[jenis_kelamin]')";
$result = $koneksi->query($sql);

if ($result) {
	header("Location: akun_siswa.php");
} else {
	echo "Data gagal ditambahkan";
}

?>
