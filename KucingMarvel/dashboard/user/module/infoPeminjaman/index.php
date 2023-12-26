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
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Kegiatan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $koneksi = new Connection();
                    $nim = $_SESSION['nim'];
                    $query = "SELECT p.nim, u.nama, p.status, r.nama_ruang, DAY( p.tanggal) as Hari, p.id_ruang, DATE_FORMAT(p.tanggal,'%d-%m-%Y') as tanggal, p.kegiatan, p.kode_jp_mulai, p.kode_jp_selesai,p.status FROM peminjaman p
                                    INNER JOIN ruang r ON r.id_ruang = p.id_ruang
                                    INNER JOIN user u ON u.nim = p.nim 
                                    INNER JOIN jp ON jp.kode_jp = p.kode_jp_mulai
                                    WHERE p.nim = '$nim'";

                    $result = mysqli_query($koneksi->koneksi, $query);
                    while ($peminjaman = mysqli_fetch_array($result)) {
                        // elemen variabel
                        $no_hari = $peminjaman['Hari'];
                        $namedDay = date('l', strtotime($no_hari));
                        // Isi tabel
                        echo "<tr>";
                        echo "<td>{$peminjaman['nama_ruang']}</td>";
                        // echo "<td>$namedDay</td>";
                        echo "<td>{$peminjaman['tanggal']}</td>";
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