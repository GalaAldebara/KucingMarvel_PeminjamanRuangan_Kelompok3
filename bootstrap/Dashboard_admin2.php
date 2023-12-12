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
        </style>
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
                <img src="img/logo.png" class="img-fluid mx-auto d-block" alt="" srcset="" style="object-fit: contain; width: 250%; height: 250%;">
                <div class="sidebar-brand-text mx-3">Peminjaman Ruang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="Dashboard_admin2.php">
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
                        <a href="#" class="collapse-item">Lantai 8</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRequestList" aria-expanded="true" aria-controls="collapseRequestList">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Request List</span>
                </a>
                <div id="collapseRequestList" class="collapse" aria-labelledby="headingRequestList" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List Lantai:</h6>
                        <a class="collapse-item" href="login.html">Lantai 7</a>
                        <a class="collapse-item" href="register.html">Lantai 8</a>
                        <a class="collapse-item" href="forgot-password.html">Semua Lantai</a>
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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="">
                        <div class="input-group">
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
                                    <div class="font-weight-bold">
                                        <div class="text">Satria Abrar asked to borrow room LPR 8</div>
                                        <div class="ml-auto">
                                            <button type="button" class="btn btn-success btn-sm mr-2">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text">Bimantara asked to borrow room LPR 7</div>
                                        <div class="ml-auto">
                                            <button type="button" class="btn btn-success btn-sm mr-2">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </a>

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
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                                <h1 class="h3 mb-0 text-gray-800">Welcome Admin</h1>
                            </div>
                            <div class="col-sm-6 mb-4 text-right d-flex justify-content-end">
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50" style="padding-top: 7px;"></i>
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
                    <div class="cardInfo">
                        <h3>Informasi Ruang</h3>
                        <!-- Start Pemilihan Jam -->
                        <select id="jamSelect" class="form-select" aria-label="Default select example" style="margin-bottom:10px;">
                            <option value="1" selected>Pilih Jam</option>
                            <?php
                            $query_jam = "SELECT * FROM jp";
                            $result_jam = $koneksi->query($query_jam);
                            if ($result_jam) {
                                while ($row_jam = $result_jam->fetch_assoc()) {
                            ?>
                                    <option value="<?= $row_jam['kode_jp'] ?>"> <?= $row_jam['kode_jp'] . '. ' . $row_jam['jp_mulai'] . '~' . $row_jam['jp_selesai'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="PemilihanJam">
                            Memunculkan kotak-kotak dari pemilihan jam (nantinya klo sudah tersambung logic)
                        </div>
                        <!-- End Pemilihan Jam -->
                        <div class="row">
                            <!-- Info Jumlah Ruang-->
                            <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Ruang</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $queryCountJumlahRuang = "SELECT COUNT(id_ruang) AS jmlRuang FROM ruang WHERE lantai=7 OR lantai=8";
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
                            <!-- Info Ruang Available -->
                            <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Ruang Available</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $queryCountRuangAvail = "SELECT COUNT(id_ruang) AS jmlRuangAvail FROM ruang WHERE (lantai=7 OR lantai=8) AND status='available'";
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

                            <!-- Info Ruang Unavailable -->
                            <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ruang
                                                    Unavailable</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $queryCountRuangUnavail = "SELECT COUNT(id_ruang) AS jmlRuangUnavail FROM ruang WHERE (lantai=7 OR lantai=8) AND (status='unavailable' OR status='urgent')";
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
                        </div>
                    </div>
                </div>
                <!-- Start Tabel -->
                <div class="background">
                    <h3>Informasi Jadwal Mingguan</h3>
                    <div class="row m-2">
                        <!-- Dropdown Minggu -->
                        <select id="weekSelect" class="form-select" aria-label="Default select example">
                            <option value="1" selected>Pilih Minggu</option>
                            <?php
                            $query_minggu = "SELECT * FROM minggu";
                            $result2 = $koneksi->query($query_minggu);
                            if ($result2) {
                                while ($row2 = $result2->fetch_assoc()) {
                            ?>
                                    <option value="<?= $row2['kode_minggu'] ?>"><?= $row2['nama_minggu'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <!-- Select Hari -->
                        <select id="daySelect" class="form-select" aria-label="Default select example">
                            <option value="1" selected>Pilih Hari</option>
                            <?php
                            $query_hari = "SELECT * FROM hari";
                            $result3 = $koneksi->query($query_hari);
                            if ($result3) {
                                while ($row3 = $result3->fetch_assoc()) {
                            ?>
                                    <option value="<?= $row3['kode_hari'] ?>"><?= $row3['nama_hari'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="jadwalContainer">
                        <!-- Hasil jadwal akan ditampilkan di sini -->
                    </div>
                </div>
                <!-- Script Tabel Jadwal -->
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Ketika nilai drop-down berubah
                        $("#daySelect, #weekSelect").change(function() {
                            var selectedDay = $("#daySelect").val();
                            var selectedWeek = $("#weekSelect").val();
                            console.log(selectedDay);

                            // Kirim request Ajax
                            $.ajax({
                                url: "prosesupdatejadwal.php", // Ganti dengan URL yang sesuai
                                type: "POST",
                                data: {
                                    day: selectedDay,
                                    week: selectedWeek
                                },
                                success: function(result) {
                                    // Tampilkan hasil di div jadwalContainer
                                    $("#jadwalContainer").html(result);
                                },
                                error: function(error) {
                                    console.log("Error:", error);
                                }
                            });
                        });
                    });

                    // $(document).ready(function() {
                    //     // Ketika nilai drop-down berubah
                    //     $("#jamSelect").change(function() {
                    //         var selectedHour = $("#jamSelect").val();
                    //         console.log(selectedHour);

                    //         // Kirim request Ajax
                    //         $.ajax({
                    //             url: "prosesUpdateJam.php", // Ganti dengan URL yang sesuai
                    //             type: "POST",
                    //             data: {
                    //                 jam: selectedHour
                    //             },
                    //             success: function(result) {
                    //                 // Tampilkan hasil di div jadwalContainer
                    //                 $("#PemilihanJam").html(result);
                    //             },
                    //             error: function(error) {
                    //                 console.log("Error:", error);
                    //             }
                    //         });
                    //     });
                    // });
                </script>
                <script>
                    // !--Script Dropdown Hari-- >
                    function updateDay(namaHari, kodeHari) {
                        document.getElementById('daftarRuangDropdown').innerText = namaHari;
                        // document.getElementById('daftarRuangDropdown') = kodeHari;

                    }
                    // Script Dropdown Minggu
                    function updateWeek(namaMinggu, kodeMinggu) {
                        document.getElementById('daftarMingguDropdown').innerText = namaMinggu;

                        // Gunakan nilai kodeHari sesuai kebutuhan, contohnya:
                        console.log("Kode Minggu: " + kodeMinggu);
                    }
                </script>

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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
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
            // Fungsi Jam
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