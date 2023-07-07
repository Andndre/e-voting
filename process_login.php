<?php 
session_start();

include 'koneksi.php';

$sql = "SELECT * FROM administrator WHERE username = '$_POST[username]' AND pass = '$_POST[password]'";

$result = $koneksi->query($sql);

// Admin
if ($result->num_rows > 0) {
	$_SESSION['role'] = 'admin';
	header('Location: dashboard_admin.php');
}

// Siswa
$sql = "SELECT * FROM siswa WHERE nisn = '$_POST[username]' AND pass = '$_POST[password]'";

$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
	$_SESSION['role'] = 'siswa';
	$_SESSION['nisn'] = $_POST['username'];
	header('Location: dashboard_siswa.php');
}

echo "Akun tidak ada, maaf!";
?>
