<?php 

$db_host = "localhost:3307";
$db_username = "root";
$db_password = "";
$db_name = "e-voting";

$koneksi = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($koneksi->connect_error) {
	die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
