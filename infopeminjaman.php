<?php
session_start();
include 'php/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

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
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <style>
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

            .navbar-search {
                max-width: 300px;
                margin-left: 10px;
            }

            .btn-search {
                background-color: #FFB534;
                margin-left: 10px;
            }
        </style>
        <ul class="navbar-nav sidebar sidebar-dark accordion " id="accordionSidebar" style="background-color: #2c4182">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
                <img src="img/logo.png" class="img-fluid mx-auto d-block" alt="" srcset="" style="object-fit: contain; width: 250%; height: 250%;">
                <div class="sidebar-brand-text mx-3">Peminjaman Ruang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="Dashboard.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
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
                        <a href="Dashboard.php" class="collapse-item">Lantai 7</a>
                        <a href="Dashboard_2.php" class="collapse-item">Lantai 8</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Info:</h6>
                        <a class="collapse-item" href="infopeminjaman.php">Info Peminjaman</a>
                        <a class="collapse-item" href="login.php">Login</a>
                        <a class="collapse-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                            Logout
                        </a>
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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="">
                        <div class="input-group ">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Cari ruang..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="background-color: #2c4182">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>



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
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Informasi Peminjaman Ruang</h1>
                            </div>
                            <div class="col-sm-6 mb-4 text-right d-flex justify-content-end">
                                <div class="clock-container shadow-sm" style="margin-left: 20px;padding: 5px 20px; border-radius: 20px; background-color: rgb(255, 255, 255); cursor:default">
                                    <div id="clock"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Start Tabel -->

                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ruang</th>
                                        <th>Hari</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Kegiatan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nim = $_SESSION['nim'];
                                    $query = "SELECT p.nim, u.nama, p.status, r.nama_ruang, DAY( p.tanggal) as Hari, p.id_ruang, p.kegiatan, p.kode_jp_mulai, p.kode_jp_selesai,p.status FROM peminjaman p
                                    INNER JOIN ruang r ON r.id_ruang = p.id_ruang
                                    INNER JOIN user u ON u.nim = p.nim 
                                    INNER JOIN jp ON jp.kode_jp = p.kode_jp_mulai
                                    WHERE p.nim = '$nim'";

                                    $result = mysqli_query($koneksi, $query);
                                    while ($peminjaman = mysqli_fetch_array($result)) {
                                        // elemen variabel
                                        $no_hari = $peminjaman['Hari'];
                                        $namedDay = date('l', strtotime($no_hari));
                                        // Isi tabel
                                        echo "<tr>";
                                        echo "<td>{$peminjaman['nama_ruang']}</td>";
                                        echo "<td>$namedDay</td>";
                                        echo "<td>Jam ke-{$peminjaman['kode_jp_mulai']}</td>";
                                        echo "<td>Jam ke-{$peminjaman['kode_jp_selesai']}</td>";
                                        echo "<td>{$peminjaman['kegiatan']}</td>";
                                        echo "<td>{$peminjaman['status']}</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->
            </div>
            <!-- Footer -->
            <?php
            include('php/footer.php');
            ?>
            <!-- End of Footer -->

            <!-- `````````````````````````````````````````````TEMPAT SCRIPT ````````````````````````````````````````` -->
            <!-- `````````````````````````````````````````````TEMPAT SCRIPT ````````````````````````````````````````` -->
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
            <!-- Script Jam RealTime -->
            <script>
                function updateClock() {
                    var now = new Date();
                    var hours = now.getHours();
                    var minutes = now.getMinutes();
                    var seconds = now.getSeconds();

                    var timeString = padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds);

                    document.getElementById("clock").innerText = timeString;
                }

                function padZero(number) {
                    return (number < 10) ? "0" + number : number;
                }

                setInterval(updateClock, 1000);

                updateClock();
            </script>
</body>

</html>