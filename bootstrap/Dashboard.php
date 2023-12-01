<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

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
    <!-- PHP KONEKSI -->
    <?php
    include('php/koneksi.php');
    ?>
    <!-- END PHP KONEKSI -->

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cat"></i>
                </div>
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
                        <a href="#" class="collapse-item">Lantai 7</a>
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
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="index.php">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
                    <i class="fas fa-fw fa-door-closed"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a href="Dashboard_admin.php" class="collapse-item">Admin</a>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Cari ruang..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
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
                                <h1 class="h3 mb-0 text-gray-800">Daftar Ruang Lt.7</h1>
                            </div>
                            <div class="col-sm-6 mb-4 text-right d-flex justify-content-end">
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50" style="padding-top: 7px"></i>
                                    Generate Report</a>
                                <div class="clock-container shadow-sm" style="margin-left: 20px;padding: 5px 20px; border-radius: 20px; background-color: rgb(255, 255, 255); cursor:default">
                                    <div id="clock"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Search Logic -->
                    <div class="row">
                        <?php
                        include('php/search.php');
                        ?>
                    </div>
                    <div>
                        <img src="img/DENAH GEDUNG 7 NEW.png" class="card-img-top img-fluid" alt="">
                    </div>
                    <hr>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Ruang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $queryCountJumlahRuang = "SELECT COUNT(id_ruang) AS jmlRuang FROM ruang WHERE lantai=7";
                                                $resultJumlahRuang = mysqli_query($koneksi, $queryCountJumlahRuang);
                                                while ($count = mysqli_fetch_array($resultJumlahRuang)) {
                                                    $jumlahRuang = $count["jmlRuang"];
                                                    echo $jumlahRuang;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ruang Available</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $queryCountRuangAvail = "SELECT COUNT(id_ruang) AS jmlRuangAvail FROM ruang WHERE lantai=7 AND status='available'";
                                                $resultJumlahRuangAvail = mysqli_query($koneksi, $queryCountRuangAvail);
                                                while ($countRA = mysqli_fetch_array($resultJumlahRuangAvail)) {
                                                    $jumlahRA = $countRA["jmlRuangAvail"];
                                                    echo $jumlahRA;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ruang
                                                Unavailable</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $queryCountRuangUnavail = "SELECT COUNT(id_ruang) AS jmlRuangUnavail FROM ruang WHERE lantai=7 AND (status='unavailable' OR status='urgent')";
                                                $resultJumlahRuangUnavail = mysqli_query($koneksi, $queryCountRuangUnavail);
                                                while ($countRU = mysqli_fetch_array($resultJumlahRuangUnavail)) {
                                                    $jumlahRU = $countRU["jmlRuangUnavail"];
                                                    echo $jumlahRU;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $queryCountRuangPending = "SELECT COUNT(id_ruang) AS jmlRuangPend FROM ruang WHERE lantai=7 AND status='pending'";
                                                $resultJumlahRuangPending = mysqli_query($koneksi, $queryCountRuangPending);
                                                while ($countP = mysqli_fetch_array($resultJumlahRuangPending)) {
                                                    $jumlahP = $countP["jmlRuangPend"];
                                                    echo $jumlahP;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DAFTAR RUANG -->
                    <!-- Color System -->
                    <div class="h4 font-weight-bold text-gray-800" style="margin: 10px 0px 20px 0px;">
                        Daftar Ruang
                    </div>
                    <div class="row">
                        <?php
                        $query = "SELECT nama_ruang,status FROM ruang WHERE lantai = 7 order by nama_ruang asc";
                        $result = mysqli_query($koneksi, $query);
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $no++;
                                $status = $row["status"];

                                // Atur warna berdasarkan status
                                switch ($status) {
                                    case 'available':
                                        $bg_color = 'bg-success';
                                        break;
                                    case 'unavailable':
                                        $bg_color = 'bg-danger';
                                        break;
                                    case 'pending':
                                        $bg_color = 'bg-secondary';
                                        break;
                                    case 'urgent':
                                        $bg_color = 'bg-gray-900';
                                        break;
                                    default:
                                        $bg_color = 'bg-light';
                                        break;
                                }

                                echo '<div class="col-auto mb-4">' .
                                    '<div class="card ' . $bg_color . ' text-white shadow-lg" style="width: 120px; height: 120px; cursor: pointer;" onclick="showForm(\''.$row["nama_ruang"] . '\')">' .
                                    '<div class="card-body">' .
                                    $row["nama_ruang"] .
                                    '<div class="text-white-50 small">' . $row["status"] . '</div>' .
                                    '</div>' .
                                    '</div>' .
                                    '</div>';
                            }
                        }
                        mysqli_close($koneksi);
                        ?>
                        <div class="form-container" id="myForm" style="display: none; z-index: 1000; position: absolute; top: 50%; transform: translate(-50%, -50%);">
                            <div class="card bg-light" style="width: 300px; cursor: pointer; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <img src="img/landscape.png" alt="Form Image" style="width: 100%; height: auto; object-fit: cover; border-bottom: 1px solid #ddd;">

                                <div class="card-body">
                                    <label for="nama" class="form-label">Nama:</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>

                                    <label for="nim" class="form-label">NIM:</label>
                                    <input type="text" id="nim" name="nim" class="form-control" required>

                                     <button type="button" class="btn btn-success" onclick="submitForm()">Kirim</button>
                                     <button type="button" class="btn btn-secondary" onclick="closeForm()">Batal</button>
                                </div>
                            </div>
                        </div>

                        <script>
                            function showForm(namaRuang) {
                                var form = document.getElementById('myForm');
                                form.style.display = 'block';
                                form.style.zIndex = '1000';
                                document.getelementById('namaRuang').value = namaRuang;
                            }

                            function closeForm() {
                                var form = document.getElementById('myForm');
                                form.style.animation = 'fadeIn 0.5s ease';
                                setTimeout(() => {
                                    form.style.display = 'none';
                                    form.style.animation = 'fadeIn 0.5s ease';
                                }, 500);
                            }

                            function submitForm() {
                            var nama = document.getElementById('nama').value;
                            var nim = document.getElementById('nim').value;
                            var namaRuang = document.getElementById('namaRUang').value;

                            var form = document.getElementById('myForm');
                            form.style.display = 'none';

                            alert('Formulir telah dikirim: Nama - ' + nama + ', NIM - ' + nim);
                            }
                        </script>
                    <!-- END DAFTAR RUANG -->

                </div>

                <div class="col-lg-6 mb-4">

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php
                include('php/footer.php');
                ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

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
        <script>
            function cardClicked() {
                alert('Card Ditekan!');

            }
        </script>

        <!-- Script Jam RealTime -->
        <script>
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                // Formatting waktu menjadi HH:MM:SS
                var timeString = padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds);

                // Memperbarui elemen dengan ID "clock" dengan waktu yang baru
                document.getElementById("clock").innerText = timeString;
            }

            function padZero(number) {
                // Menambahkan nol di depan angka jika hanya satu digit
                return (number < 10) ? "0" + number : number;
            }

            // Memperbarui waktu setiap detik
            setInterval(updateClock, 1000);

            // Memanggil fungsi updateClock untuk pertama kali saat halaman dimuat
            updateClock();
        </script>
</body>

</html>