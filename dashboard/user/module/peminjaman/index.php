<div class="container-fluid">
    <!-- Page Heading -->
    <div>
        <div class="row">
            <div class="col-sm-6 mb-4">
                <h1 class="h3 mb-0 text-gray-800">Formulir Peminjaman</h1>
            </div>
            <div class="col-sm-6 mb-4 text-right d-flex justify-content-end">

                <div class="clock-container shadow-sm" style="margin-left: 20px;padding: 5px 20px; border-radius: 20px; background-color: rgb(255, 255, 255); cursor:default">
                    <div id="clock"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-1">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form action="function/simpan_peminjaman.php" method="post">
                            <input type="hidden" name="id_ruang" value="<?= $_GET['room'] ?>">
                            <input type="hidden" name="tglPeminjaman" value="<?= $_GET['date'] ?>">
                            <?php echo $_GET['date']; ?>
                            <div class="mb-3">
                                <label for="namaPeminjam" class="form-label">Nama Peminjam</label>
                                <input type="text" class="form-control" id="namaPeminjam" name="namaPeminjam" required readonly value="<?= $_SESSION['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
                            </div>
                            <!-- 
                                            <div class="mb-3">
                                                <label for="tglPeminjaman" class="form-label">Tanggal Peminjaman</label>
                                                <input type="date" class="form-control" id="tglPeminjaman" name="tgl" required>
                                            </div> -->
                            <!-- 
                                            <div class="mb-3">
                                                <label for="waktuMulai" class="form-label">Waktu Mulai</label>
                                                <input type="datetime-local" class="form-control" id="waktuMulai" name="waktuMulai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="waktuSelesai" class="form-label">Waktu Selesai</label>
                                                <input type="datetime-local" class="form-control" id="waktuSelesai" name="waktuSelesai" required>
                                            </div> -->
                            <div class="row">
                                <select id="kode_jp_mulai" name="kode_jp_mulai" class="custom-jp-mulai" aria-label="Default select example">
                                    <option value="1" selected>Jam Mulai</option>
                                    <?php
                                    $koneksi = new Connection();
                                    $query_jp = "SELECT * FROM jp";
                                    $result = mysqli_query($koneksi->koneksi, $query_jp);
                                    if ($result) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?= $row['kode_jp'] ?>"><?= $row['kode_jp'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <select id="kode_jp_selesai" name="kode_jp_selesai" class="custom-jp-selesai" aria-label="Default select example" style="margin:5px; padding:7px;">
                                    <option value="1" selected>Jam Selesai</option>
                                    <?php
                                    $query_jp = "SELECT * FROM jp";
                                    $result = mysqli_query($koneksi->koneksi, $query_jp);
                                    if ($result) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?= $row['kode_jp'] ?>"><?= $row['kode_jp'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    <hr>
</div>
<!-- End of Content Wrapper -->

</div>