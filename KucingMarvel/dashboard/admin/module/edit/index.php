 <!-- Begin Page Content -->
 <div class="row">
     <div class="col-10">
         <?php
            $koneksi = new Connection();

            $nim = isset($_GET['nim']) ? $_GET['nim'] : '';
            $query = "SELECT nim, nama, jurusan, level, no_telp FROM user WHERE nim = '$nim'";
            $result = mysqli_query($koneksi->koneksi, $query);
            if ($user = mysqli_fetch_array($result)) {
                // Tampilkan formulir pengeditan dengan Bootstrap
                echo "<div class='container mt-2'>";
                echo "<h2>Edit User Page</h2>";
                echo "<form method='post' action='function/edit.php'>";

                // Form fields
                echo "<div class='form-group'>";
                echo "<label for='nim'>Nim:</label>";
                echo "<input type='text' class='form-control' name='nim' value='{$user['nim']}' readonly>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='nama'>Nama:</label>";
                echo "<input type='text' class='form-control' name='nama' value='{$user['nama']}'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='jurusan'>Jurusan:</label>";
                echo "<input type='text' class='form-control' name='jurusan' value='{$user['jurusan']}'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='level'>Level:</label>";
                echo "<select class='form-control' name='level' aria-label='Default select example'>";
                echo "<option selected>{$user['level']}</option>";
                echo "<option value='dosen'>Dosen</option>";
                echo "<option value='mahasiswa'>Mahasiswa</option>";
                echo "</select>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='no_telp'>No. Telepon:</label>";
                echo "<input type='text' class='form-control' name='no_telp' value='{$user['no_telp']}'>";
                echo "</div>";

                // Submit button
                echo "<button type='submit' class='btn btn-primary'>Simpan</button>";

                echo "</form>";
                echo "</div>";
            } else {
                echo "Data tidak ditemukan.";
            }
            ?>
     </div>
 </div>
 <!-- End of Main Content -->

 <!-- End of Main Content -->