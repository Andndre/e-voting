<?php 
include "koneksi.php";

// simpan foto
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$folder = "images/calon/$foto";
move_uploaded_file($tmp, $folder);

$sql = "INSERT INTO calon (nisn, visi, misi, prestasi, rencana_program_kerja, bakat_minat, id_pemilihan, foto) 
VALUES ('$_POST[nisn]', '$_POST[visi]', '$_POST[misi]', '$_POST[prestasi]', '$_POST[rencana_proker]', '$_POST[bakat_minat]', '1', '$foto')";
$result = $koneksi->query($sql);

if ($result) {
	header("Location: calon_ketua_osis.php");
} else {
	echo "Data gagal ditambahkan";
}

?>
