<?php
session_start();
include "php/koneksi.php";
include "function/pesan_kilat.php";
$nim = $_POST['nim'];
$password = $_POST['password'];

$filter = mysqli_query($koneksi, "SELECT * FROM user WHERE nim='$nim' AND password='$password'");
$cek = mysqli_num_rows($filter);
$data = mysqli_fetch_array($filter);

if ($cek > 0) {
    if ($data['level'] == 'admin') {
        $_SESSION['nim'] = $data['nim'];
        $_SESSION['level'] = 'admin';
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['no_telp'] = $data['no_telp'];
        
        header("location: Dashboard_admin2.php");
    } else if ($data['level'] == 'user') {
        $_SESSION['nim'] = $data['nim'];
        $_SESSION['level'] = 'user';
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['jurusan'] = $data['jurusan'];
        $_SESSION['no_telp'] = $data['no_telp'];
        
        header("location: Dashboard.php");
    } else {
        pesan('danger','Akun tidak valid. Silakan coba lagi.');
        header("location:login.php");
    }
} else {
    pesan('danger','nim atau password salah atau tidak ditemukan. Silakan coba lagi.');
    header("location:login.php");
}
?>