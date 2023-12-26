<?php
if (!isset($_SESSION)) {
    session_start();
}
include "./function/pesan_kilat.php";
require_once "class/user.php";

$user = new User();

$nim = $user->antiinjection($_POST['nim']);
$password = $user->antiinjection($_POST['password']);

$user->cekUser($nim);

if ($user->hasil) {
    // Gunakan password_verify() untuk memeriksa kecocokan password
    $ismatch = password_verify($password, $user->password);

    if ($ismatch) {
        $_SESSION["nama"] = $user->nama;
        $_SESSION["nim"] = $user->nim;
        $_SESSION["level"] = $user->level;
        header("location: index.php");
    } else {
        pesan('danger', 'Password salah. Silakan coba lagi.');
        header("location: login.php");
    }
} else {
    pesan('danger', 'NIM tidak ditemukan. Silakan coba lagi.');
    header("location: login.php");
}
