<?php
// Sesuaikan konfigurasi database Anda
include "php/koneksi.php";
$koneksi = new Connection;
// Memeriksa koneksi
if ($koneksi->koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->koneksi->connect_error);
}

// Menangani permintaan POST untuk menghapus pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Kegiatan"])) {
        $kegiatan = $_POST["Kegiatan"];
        echo $kegiatan;
    }
}
