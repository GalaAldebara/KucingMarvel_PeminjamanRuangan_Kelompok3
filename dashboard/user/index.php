 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <div>
         <div class="row">
             <div class="col-sm-6 mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Daftar Ruang Lt.7</h1>
             </div>
             <div class="col-sm-6 mb-4 text-right d-flex justify-content-end">
                 <div class="clock-container shadow-sm" style="margin-left: 20px;padding: 5px 20px; border-radius: 20px; background-color: rgb(255, 255, 255); cursor:default">
                     <div id="clock"></div>
                 </div>
             </div>
         </div>
     </div>
     <div>
         <img src="img/DENAH GEDUNG 7 NEW.png" class="card-img-top img-fluid" alt="">
     </div>
     <hr>
     <!-- DAFTAR RUANG -->
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
                                    $ruang->jumlahRuang();
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
                                    $ruang->jmlhRuangAval();
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
                                    $ruang->jmlhRuangUnval();
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
                                    $ruang->pendingReq();
                                    ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Color System -->
     <!-- Start Tabel -->
     <div class="background">
         <h3>Informasi Jadwal Mingguan</h3>
         <div class="row m-2">
             <!-- Dropdown Minggu -->
             <select id="weekSelect" class="form-select bg-primary" aria-label="Default select example" style="display: none">
                 <option value="1" selected>Pilih Minggu</option>
                 <?php
                    $con = new Connection();
                    $query_minggu = "SELECT * FROM minggu";
                    $result2 = mysqli_query($con->koneksi, $query_minggu);
                    if ($result2) {
                        while ($row2 = $result2->fetch_assoc()) {
                    ?>
                         <option value="<?= $row2['kode_minggu'] ?>"><?= $row2['nama_minggu'] ?></option>
                 <?php
                        }
                    }
                    ?>
             </select>
             <input type="date" name="tanggal" id="date" class="custom-date-input">

             <!-- Select Hari -->
             <select id="daySelect" class="form-select" aria-label="Default select example" style="display: none">
                 <option value="1" selected>Pilih Hari</option>
                 <?php
                    $query_hari = "SELECT * FROM hari";
                    $result3 = mysqli_query($con->koneksi, $query_hari);
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

     <!-- End of Main Content -->

 </div>
 <!-- End of Content Wrapper -->
 </div>