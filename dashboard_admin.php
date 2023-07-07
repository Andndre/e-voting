<?php
session_start();
if (isset($_SESSION['role'])) {
	$role = $_SESSION['role'];
	if ($role !== 'admin') {
		// forbidden
		header('Location: dashboard_siswa.php');
	}
} else {
	header('Location: login.php');
}

include 'koneksi.php';

$sql = "SELECT judul FROM pemilihan where id = '1'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Admin</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "navbar.php" ?>
	<div class="container">
		<h1>Dashboard Admin</h1>
		<p>Berikut merupakan informasi pemilihan saat ini:</p>
		<form method="post" action="process_ganti_nama_acara.php">
			<label for="judul">Judul</label>
			<input type="text" value="<?php echo $row['judul'];?>" name="judul">
			<input type="submit" value="Perbarui">
		</form>
		<div class="spacer"></div>
		<a href="calon_ketua_osis.php" class="btn">Calon Ketua Osis</a>
		<a href="akun_siswa.php" class="btn">Akun Siswa</a>
	</div>
</body>
</html>
