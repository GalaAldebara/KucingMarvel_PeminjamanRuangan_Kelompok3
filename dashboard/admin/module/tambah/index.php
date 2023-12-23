 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div>
         <div class="row">
             <div class="col-sm-6 mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Halaman Tambah User</h1>
             </div>
             <div class="col-sm-6 mb-4 text-right d-flex justify-content-end">
                 <div class="clock-container shadow-sm" style="margin-left: 20px;padding: 5px 20px; border-radius: 20px; background-color: rgb(255, 255, 255); cursor:default">
                     <div id="clock"></div>
                 </div>
             </div>
         </div>
     </div>
     <div class="cardInfo">
         <div class="container mt-2">
             <div class="row">
                 <div class="col-12">
                     <div class="container mt-5">
                         <h2>Data User</h2>
                         <form action="function/tambah.php" method="post">
                             <div class="form-group">
                                 <label for="nim">NIM:</label>
                                 <input type="text" class="form-control" id="nim" name="nim" required>
                             </div>
                             <div class="form-group">
                                 <label for="nama">Nama:</label>
                                 <input type="text" class="form-control" id="nama" name="nama" required>
                             </div>
                             <div class="form-group">
                                 <label for="jurusan">Jurusan:</label>
                                 <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                             </div>
                             <div class="form-group">
                                 <label for="no_telp">No. Telepon:</label>
                                 <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                             </div>
                             <div class="form-group">
                                 <label for="level">Level:</label>
                                 <select class="form-control" id="level" name="level" required>
                                     <!-- <option value="admin">Admin</option> -->
                                     <option value="user">user</option>
                                     <option value="admin">admin</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="password">Password:</label>
                                 <input type="password" class="form-control" id="password" name="password" required>
                             </div>
                             <button type="submit" class="btn btn-primary">Tambah User</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>

     </div>

     <!-- End of Main Content -->