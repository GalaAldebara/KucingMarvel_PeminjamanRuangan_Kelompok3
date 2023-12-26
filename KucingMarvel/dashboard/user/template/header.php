<!DOCTYPE html>
<html lang="en">

<?php
include "class/ruang.php";
include "class/user.php";
$ruang = new ruang();
$user = new user();
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peminjaman Ruang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- STYLE MANUAL -->
    <style>
        /* Tambahkan CSS sesuai kebutuhan */
        .clock-container {
            font-size: 18px;
            margin-top: auto;

        }

        .background,
        .cardInfo {
            background-color: #F0F0F0;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            padding: 20px;

        }

        .cardInfo {

            background-color: #F0F0F0;
            border-radius: 20px;
            padding: 20px;
            margin: 5px;
        }

        .clock-container {
            font-size: 18px;
            margin-top: auto;
        }

        .sidebar-brand-icon img {
            width: 60px;
            height: auto;
            object-fit: contain;
        }

        .bg-gradient-primary {
            background-color: #FFB534;
        }

        .navbar-search {
            max-width: 300px;
            margin-left: 10px;
        }

        .btn-search {
            background-color: #FFB534;
            margin-left: 10px;
        }

        .dropdown {
            margin-bottom: 20px;
        }

        #accordionSidebar {
            background-color: #2c4182;
        }

        #daySelect {
            margin-left: 20px;
        }

        #weekSelect,
        #daySelect {
            padding: 10px;
            background-color: #2c4182;
            color: white;
            border-radius: 7px;
        }

        #jamSelect {
            padding: 10px;
            background-color: #2c4182;
            color: white;
            border-radius: 7px;
        }

        .custom-date-input {
            background-color: #2c4182;
            color: #fff;
            border: 10px solid #2c4182;
            font-size: 18px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .custom-jp-mulai {
            background-color: #2c4182;
            color: #fff;
            border: 7px solid #2c4182;
            font-size: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 5px;
        }

        .custom-jp-selesai {
            background-color: #2c4182;
            color: #fff;
            border: 7px solid #2c4182;
            font-size: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 5px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion " id="accordionSidebar" style="background-color: #2c4182">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="img/logo.png" class="img-fluid mx-auto d-block" alt="" srcset="" style="object-fit: contain; width: 250%; height: 250%;">
                <div class="sidebar-brand-text mx-3">Peminjaman Ruang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=infoPeminjaman">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Info Peminjaman</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-door-closed"></i>
                    <span>Lantai</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilih Lantai:</h6>
                        <a href="index.php" class="collapse-item">Lantai 7</a>
                        <a href="index.php?page=lantai8" class="collapse-item">Lantai 8</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand  topbar mb-4 static-top shadow" style="background-color: #FFB534">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown"></div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php?page=tampilinformasi">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="index.php?page=ubah">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->