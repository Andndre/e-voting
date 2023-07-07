<?php 
session_start();

include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Calon</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include 'navbar.php' ?>
	<div class="container">
		<h1>Tambah Calon</h1>
		<form method="post" action="process_tambah_calon.php" enctype="multipart/form-data">
			<label for="nisn">Siswa</label>
			<select name="nisn" id="nisn">
				<?php
					$sql = "SELECT nisn, nama FROM siswa";
					$result = $koneksi->query($sql);
					while ($row = $result->fetch_assoc()) {
						echo "<option value='" . $row['nisn'] . "'>" . $row['nama'] . "</option>";
					}
				?>
			</select>
			<label for="visi">Visi</label>
			<input type="text" name="visi">
			<label for="misi">Misi</label>
			<input type="text" name="misi">
			<label for="prestasi">Prestasi</label>
			<input type="text" name="prestasi">
			<label for="rencana_proker">Rencana Program Kerja</label>
			<input type="text" name="rencana_proker">
			<label for="bakat_minat">Bakat dan Minat</label>
			<input type="text" name="bakat_minat">
			<label for="foto">Foto</label>
			<input type="file" name="foto">
			<input type="submit" value="Tambah">
		</form>
</body>
</html>
