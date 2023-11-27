<?php
// Informasi database
$hostname = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database_name = "peminjaman_ruang"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($hostname, $username, $password, $database_name);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$koneksi->set_charset("utf8");

// // Jika Anda ingin menutup koneksi setelah digunakan, Anda dapat menggunakan kode berikut:
// // $koneksi->close();
