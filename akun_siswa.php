<?php 
session_start();

include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Akun Siswa</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "navbar.php" ?>
	<div class="container">
		<h1>Akun Siswa</h1>
		<p>Berikut merupakan data Akun Siswa yang terdaftar:</p>
		<table>
			<thead>
				<tr>
					<th>NISN</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Kelas</th>
					<th>Jenis Kelamin</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = "SELECT * FROM siswa";
					$result = $koneksi->query($sql);

					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['nisn'] . "</td>";
						echo "<td>" . $row['nama'] . "</td>";
						echo "<td>" . $row['alamat'] . "</td>";
						echo "<td>" . $row['kelas'] . "</td>";
						echo "<td>" . $row['jenis_kelamin'] . "</td>";
						echo "<td><a href='process_hapus_siswa.php?nisn=" . $row['nisn'] . "'>Hapus</a></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		<div class="spacer"></div>
		<a class="btn" href="tambah_siswa.php">Tambah Siswa</a>
	</div>
</body>
</html>
