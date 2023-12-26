 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div>
         <div class="row">
             <div class="col-sm-6 mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Daftar Pengguna</h1>
             </div>
             <div class="col-sm-6 mb-4 text-right d-flex justify-content-end">
                 <div class="clock-container shadow-sm" style="margin-left: 20px;padding: 5px 20px; border-radius: 20px; background-color: rgb(255, 255, 255); cursor:default">
                     <div id="clock"></div>
                 </div>
             </div>
         </div>
     </div>
     <!-- List Daftar User -->
     <div class="cardInfo">
         <div class="container mt-2">
             <!-- Start Form Pencarian -->
             <form action="" method="POST" class="mb-3">
                 <div class="row form-group">
                     <label for="searchTerm">Cari Pengguna:</label>
                     <input type="text" name="searchTerm" id="searchTerm" class="form-control" placeholder="Cari nama user...">
                 </div>
                 <button type="submit" class="btn btn-primary">Cari</button>
             </form>
             <!-- end Form Pencarian -->
             <div class="row">
                 <div class="col-12">
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>Nama</th>
                                 <th>Jurusan</th>
                                 <th>Level</th>
                                 <th>No. Telepon</th>
                                 <th>Edit/Delete</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $koneksi = new Connection();
                                $searchTerm = isset($_POST['searchTerm']) ? mysqli_real_escape_string($koneksi->koneksi, $_POST['searchTerm']) : '';
                                if (!empty($searchTerm)) {
                                    $query = "SELECT nim, nama, jurusan, level, no_telp FROM user WHERE (level='user') AND nama LIKE '%$searchTerm%'";
                                } else {
                                    $query = "SELECT nim, nama, jurusan, level, no_telp FROM user WHERE level='user'";
                                }

                                $result = mysqli_query($koneksi->koneksi, $query);
                                while ($user = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>{$user['nama']}</td>";
                                    echo "<td>{$user['jurusan']}</td>";
                                    echo "<td>{$user['level']}</td>";
                                    echo "<td>{$user['no_telp']}</td>";
                                    echo "<td>";
                                    // echo "<button class='btn btn-primary btn-sm' onclick='editUser(\"{$user['nim']}\",\"{$user['nama']}\", \"{$user['jurusan']}\", \"{$user['level']}\", \"{$user['no_telp']}\")'>Edit</button>";
                                    echo "<a class='btn btn-primary btn-sm' href='index.php?page=edit&nim={$user['nim']}'>Edit</a>";
                                    echo "&nbsp;";
                                    echo "<button class='btn btn-danger btn-sm' onclick='deleteUser(\"{$user['nama']}\")'>Delete</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                         </tbody>
                     </table>
                     <a class="btn btn-primary btn-sm" href="index.php?page=tambah">Tambah User</a>
                 </div>
             </div>
         </div>

     </div>
     <!-- End of Main Content -->