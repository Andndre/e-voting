<?php
session_start();

// Memeriksa apakah pengguna telah login
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    if ($role === 'admin') {
        header('Location: dashboard_admin.php');
    } else if ($role === 'siswa') {
        header('Location: dashboard_siswa.php');
    }
} else {
    header('Location: login.php');
}
?>
