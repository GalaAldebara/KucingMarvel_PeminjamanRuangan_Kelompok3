<?php
// Sesuaikan konfigurasi database Anda
require_once '../php/koneksi.php';
$koneksi = new Connection();
// Memeriksa koneksi
if ($koneksi->koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->koneksi->connect_error);
}

// Menangani permintaan POST untuk menghapus pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Accruang"])) {
        $IdPeminjaman = $_POST["Accruang"];
        // Query UPDATE dari database
        $query = "UPDATE peminjaman SET status='diterima' WHERE id_peminjaman = $IdPeminjaman";
        $result = mysqli_query($koneksi->koneksi, $query);
        if ($result) {
            echo "Permintaan Diterima.";
        } else {
            echo "Gagal Menerima Peminjaman ruang '$IdRuang': " . $koneksi->koneksi->error;
        }
    } else if (isset($_POST["Decruang"])) {
        $IdPeminjaman = $_POST["Decruang"];
        $query2 = "UPDATE peminjaman SET status='ditolak' WHERE id_peminjaman = $IdPeminjaman";
        $result = mysqli_query($koneksi->koneksi, $query2);
        if ($result) {
            echo "Permintaan Ditolak.";
        } else {
            echo "Gagal Melakukan fungsi" . $koneksi->koneksi->error;
        }
    }
}
