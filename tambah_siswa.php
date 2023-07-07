<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Siswa</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include 'navbar.php' ?>
	<div class="container">
		<h1>Tambah Akun Siswa</h1>
		<form method="post" action="process_tambah_siswa.php">
			<label for="nisn">NISN</label>
			<input type="text" name="nisn">
			<label for="nama">Nama</label>
			<input type="text" name="nama">
			<label for="password">Password</label>
			<input type="password" name="password">
			<label for="alamat">Alamat</label>
			<input type="text" name="alamat">
			<label for="kelas">Kelas</label>
			<input type="text" name="kelas">
			<label for="jenis_kelamin">Jenis Kelamin</label>
			<select name="jenis_kelamin" id="jenis_kelamin">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
			<input type="submit" value="Tambah">
		</form>
</body>
</html>
