<?php

// Mendapatkan data fasilitas berdasarkan ID ruang dari parameter URL
$idRuang = $_GET['room'];
$dataFasilitas = $ruang->getDataFasilitasByRuang($idRuang);
?>

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
                    <div class="card-header">
                        <h5 class="card-title">Informasi Fasilitas</h5>
                    </div>
                    <?php
                    echo '<div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <i class="fas fa-chair fa-2x"></i>
                    <p>Kapasitas: ' . $dataFasilitas['kapasitas'] . ' kursi</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-video fa-2x"></i>
                    <p>Proyektor: ' . $dataFasilitas['proyektor'] . '</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    <p>Papan Tulis: ' . $dataFasilitas['papantulis'] . '</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-plug fa-2x"></i>
                    <p>Stop Kontak: ' . $dataFasilitas['stopkontak'] . '</p>
                </div>
            </div>
        </div>';
                    ?>
                </div>
                <div style="margin-bottom: 10px;"></div>
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
                            <div class="row">
                                <select id="kode_jp_mulai" name="kode_jp_mulai" class="custom-jp-mulai" aria-label="Default select example">
                                    <!-- <option value="" selected disabled>Pilih Jam Mulai</option> -->
                                    <?php
                                    $koneksi = new Connection();
                                    if (isset($_GET['availableSlots'])) {
                                        $availableSlots = explode(',', $_GET['availableSlots']);
                                        foreach ($availableSlots as $availableSlot) {
                                    ?>
                                            <option value="<?= $availableSlot ?>" selected>Jam ke-<?= $availableSlot ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <select id="kode_jp_selesai" name="kode_jp_selesai" class="custom-jp-selesai" aria-label="Default select example" style="margin:5px; padding:7px;">
                                    <option value="1" selected>Jam Selesai</option>
                                    <?php
                                    $query_jp = "SELECT jp.*
                                    FROM jp
                                    LEFT JOIN jadwal j ON j.jp_mulai <= jp.kode_jp AND j.jp_selesai >= jp.kode_jp
                                        AND j.id_ruang = {$_GET['room']} AND j.kode_hari = {$_GET['day']} AND j.kode_minggu = 1
                                    WHERE j.id_ruang IS NULL";
                                    $result = mysqli_query($koneksi->koneksi, $query_jp);
                                    if ($result) {
                                        while ($row = $result->fetch_assoc()) {
                                            if ($row['kode_jp'] > $availableSlot) {

                                    ?>
                                                <option value="<?= $row['kode_jp'] ?>">Jam ke-<?= $row['kode_jp'] ?></option>
                                    <?php
                                            }
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

</div>
<!-- End of Content Wrapper -->

</div>