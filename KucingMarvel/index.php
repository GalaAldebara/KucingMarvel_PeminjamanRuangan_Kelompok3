<?php
// Mulai sesi jika belum dimulai
if (!isset($_SESSION)) {
    session_start();
}

if (!empty($_SESSION['level'])) {
    include 'php/koneksi.php';
    require 'function/pesan_kilat.php';

    if ($_SESSION['level'] == 'admin') {
        include 'dashboard/admin/template/header.php';
        if (!empty($_GET['page'])) {
            include 'dashboard/admin/module/' . $_GET['page'] . '/index.php';
        } else {
            include 'dashboard/admin/index.php';
        }
        include 'dashboard/admin/template/footer.php';
    } else if ($_SESSION['level'] == 'user') {
        // header("Location: tampilan-user/index.php");
        include 'dashboard/user/template/header.php';
        if (!empty($_GET['page'])) {
            include 'dashboard/user/module/' . $_GET['page'] . '/index.php';
            // header("Location: tampilan-user/index.php");
        } else {
            include 'dashboard/user/index.php';
        }
        include 'dashboard/user/template/footer.php';
    }
} else {
    header("Location: login.php");
}
