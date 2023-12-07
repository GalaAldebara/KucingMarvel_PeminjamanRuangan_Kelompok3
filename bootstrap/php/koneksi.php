<?php
$koneksi = mysqli_connect("localhost","root","","peminjaman_ruang");
if(mysqli_connect_errno()){
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
