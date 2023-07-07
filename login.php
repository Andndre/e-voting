<?php 
session_start();

include "koneksi.php";

if (isset($_SESSION['role'])) {
	$role = $_SESSION['role'];
	if ($role === 'admin') {
		header('Location: dashboard_admin.php');
	} else if ($role === 'siswa') {
		header('Location: dashboard_siswa.php');
	}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
	include 'navbar.php';
	?>
	<div class="container container-flex">
		<div class="left">
			<img src="images/login.png" alt="login">
		</div>
		<div class="right">
			<h1>Login</h1>
			<form method="POST" class="form-container" action="process_login.php">
				<label for="username">Username</label>
				<input type="text" name="username">
				<label for="password">Password</label>
				<input type="password" name="password">
				<input type="submit" value="Login">
			</form>
		</div>
	</div>
</body>
</html>
