<?php
// Mulai sesi jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Periksa apakah pengguna sudah login
if (!empty($_SESSION['level'])) {
    require 'php/koneksi.php';
    require 'function/pesan_kilat.php';
    // Jika sudah login, arahkan ke halaman sesuai dengan level
    if ($_SESSION['level'] === 'admin' && basename($_SERVER['PHP_SELF']) !== 'Dasboard_admin2.php') {
        // Jika pengguna mencoba mengakses halaman admin tanpa login
        header("Location: Dashboard_admin2.php");
        exit();
    } elseif ($_SESSION['level'] === 'user' && basename($_SERVER['PHP_SELF']) !== 'Dashboard.php') {
        // Jika pengguna mencoba mengakses halaman user tanpa login
        header("Location: Dashboard.php");
        exit();
    }
} else {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}
?>