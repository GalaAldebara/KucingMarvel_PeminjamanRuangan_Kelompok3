<!DOCTYPE html>
<html lang="en">
<?php

include "class/user.php";
include "class/admin.php";

$admin = new admin();
$user = new user();
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

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
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="img/logo.png" class="img-fluid mx-auto d-block" alt="" srcset="" style="object-fit: contain; width: 250%; height: 250%;">
                <div class="sidebar-brand-text mx-3">Peminjaman Ruang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRequestList" aria-expanded="true" aria-controls="collapseRequestList">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Menu Admin</span>
                </a>
                <div id="collapseRequestList" class="collapse" aria-labelledby="headingRequestList" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu :</h6>
                        <a class="collapse-item" href="index.php?page=daftarUser">Daftar User</a>
                        <a class="collapse-item" href="index.php?page=request">Request</a>
                        <a class="collapse-item" href="index.php?page=histori">History</a>
                        <div class="collapse-divider"></div>
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->