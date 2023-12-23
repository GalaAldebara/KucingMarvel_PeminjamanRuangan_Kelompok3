 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div>
         <div class="row">
             <div class="col-sm-6 mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Welcome Admin</h1>
             </div>
         </div>
     </div>

     <div class="cardInfo">
         <h3>Informasi user & request</h3>
         <div class="row">
             <!-- Info Jumlah User -->
             <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                 <div class="card border-left-primary shadow h-100 py-2">
                     <div class="card-body">
                         <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                                 <div class="h5 mb-0 font-weight-bold text-gray-800">
                                     <?php
                                        $admin->totalUser();
                                        ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Info Jumlah Orang di tabel Request -->
             <div class="col-xl-3 col-md-6 mb-4" style="cursor: default;">
                 <div class="card border-left-danger shadow h-100 py-2">
                     <div class="card-body">
                         <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Request List</div>
                                 <div class="h5 mb-0 font-weight-bold text-gray-800">
                                     <?php
                                        $admin->requestList();
                                        ?>
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
             <select id="weekSelect" class="form-select" aria-label="Default select example" style="display: none;">
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
             <select id="daySelect" class="form-select" aria-label="Default select example" style="display: none;">
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

 </div>
 <!-- End of Main Content -->