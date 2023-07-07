<?php 
session_start();

include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calon Ketua OSIS</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "navbar.php" ?>
	<div class="container">
		<h1>Calon Ketua Osis</h1>
		<p>Berikut merupakan data calon Ketua Osis saat ini:</p>
		<table>
			<thead>
				<tr>
					<th>NISN</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = "SELECT * FROM siswa, calon where siswa.nisn = calon.nisn AND id_pemilihan = '1'";
					$result = $koneksi->query($sql);

					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['nisn'] . "</td>";
						echo "<td>" . $row['nama'] . "</td>";
						echo "<td>" . $row['kelas'] . "</td>";
						echo "<td><a href='process_hapus_calon.php?nisn=" . $row['nisn'] . "'>Hapus</a></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		<div class="spacer"></div>
		<a class="btn" href="tambah_calon.php">Tambah Calon</a>
	</div>
</body>
</html>
