<?php
// Include the database connection file
include "../php/koneksi.php";
$koneksi = new Connection();

var_dump($_POST);
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $kegiatan = $_POST['kegiatan'];
    // $waktuMulai = $_POST['waktuMulai'];
    // $waktuSelesai = $_POST['waktuSelesai'];
    $tglPeminjaman = $_POST['tglPeminjaman'];
    $id_ruang = $_POST['id_ruang'];
    $jam_mulai = $_POST['kode_jp_mulai'];
    $jam_selesai = $_POST['kode_jp_selesai'];

    session_start();
    $nim = $_SESSION['nim'];

    $sql = "INSERT INTO peminjaman (nim, id_ruang,tanggal, kegiatan, kode_jp_mulai, kode_jp_selesai, status) 
            VALUES ('$nim', '$id_ruang', '$tglPeminjaman', '$kegiatan','$jam_mulai','$jam_selesai', 'belum')";

    if (mysqli_query($koneksi->koneksi, $sql)) {
        // Success message
        echo "<script>alert('Data peminjaman berhasil disimpan.'); window.location.href='../index.php';</script>";
    } else {
        // Error message
        echo "<script>alert('Data peminjaman tidak berhasil disimpan. Error: " . mysqli_error($koneksi->koneksi) . "'); window.location.href=' /xampp/KucingMarvel_PeminjamanRuangan_Kelompok3/bootstrap/index.php?page=peminjaman';</script>";
    }
} else {
    // Redirect to the form page if the form is not submitted
    header("Location: peminjaman.php");
}
