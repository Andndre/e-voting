<?php
session_start();
if (isset($_SESSION['role'])) {
	$role = $_SESSION['role'];
	if ($role !== 'siswa') {
		// forbidden
		header('Location: dashboard_admin.php');
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
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "navbar.php" ?>
	<div class="container">
		<h1>Selamat Datang di E-Voting</h1>
		<p>Berikut merupakan informasi pemilihan saat ini:</p>
		<h2><?php echo $row['judul'];?></h2>
		<?php 
		$sql = "SELECT count(*) as c FROM memilih where nisn_siswa = '$_SESSION[nisn]'";
		$result = $koneksi->query($sql);
		$row = $result->fetch_assoc();
		if ($row['c'] > 0) {
			echo "Anda telah menggunakan hak pilih Anda, terima kasih karena tidak menjadi golongan putih!";
		} else {
			echo "Ayo gunakan hak pilih Anda, jangan golput!";
			$sql = "SELECT * FROM siswa, calon where siswa.nisn = calon.nisn AND id_pemilihan = '1'";
			$result = $koneksi->query($sql);

			echo "<div class='spacer'/>";
			echo "<div class='spacer'/>";
			echo "<div class='container-calon'>";
			while ($row = $result->fetch_assoc()) {
				echo '<div class="card">';
				echo "<img src='images/calon/" . $row['foto'] . "' alt='" . $row['foto'] . "'>";
				echo "<h3>" . $row['nama'] . "</h3>";
				echo "<p>" . $row['kelas'] . "</p>";
				echo "<a class='btn' href='process_pilih_calon.php?nisn=" . $row['nisn'] . "'>Pilih</a>";
				echo "</div>";
			}
			echo "</div>";
		}
		?>
	</div>
</body>
</html>
