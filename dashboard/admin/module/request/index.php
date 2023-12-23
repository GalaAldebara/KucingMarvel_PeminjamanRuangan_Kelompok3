<div class="container-fluid">
    <!-- Page Heading -->
    <div>
        <div class="row">
            <div class="col-sm-6 mb-4">
                <h1 class="h3 mb-0 text-gray-800">Request Page</h1>
            </div>
        </div>
    </div>

    <!-- TAMBAH AJAX -->
    <div class="RequestList">
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Ruang</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Pilih</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $koneksi = new Connection();
                    $query = "SELECT p.id_peminjaman, p.nim, u.nama, p.status, r.nama_ruang, DAY( p.tanggal) as Hari, p.id_ruang, p.kegiatan, p.kode_jp_mulai, p.kode_jp_selesai FROM peminjaman p
                                    INNER JOIN ruang r ON r.id_ruang = p.id_ruang
                                    INNER JOIN user u ON u.nim = p.nim 
                                    INNER JOIN jp ON jp.kode_jp = p.kode_jp_mulai
                                    WHERE p.status = 'belum'";

                    $result = mysqli_query($koneksi->koneksi, $query);
                    while ($peminjaman = mysqli_fetch_array($result)) {
                        // elemen variabel
                        $no_hari = $peminjaman['Hari'];
                        $namedDay = date('l', strtotime($no_hari));
                        // Isi tabel
                        echo "<tr>";
                        echo "<td>{$peminjaman['nim']}</td>";
                        echo "<td>{$peminjaman['nama']}</td>";
                        echo "<td>{$peminjaman['nama_ruang']}</td>";
                        echo "<td>$namedDay</td>";
                        echo "<td>Jam ke-{$peminjaman['kode_jp_mulai']}</td>";
                        echo "<td>Jam ke-{$peminjaman['kode_jp_selesai']}</td>";
                        echo "<td>";
                        echo "<button class='btn btn-success btn-sm' style='margin:2px;' onclick='approve(\"{$peminjaman['nama_ruang']}\",\"{$peminjaman['id_ruang']}\",\"{$peminjaman['id_peminjaman']}\")'>Terima</button>";
                        echo "&nbsp;";
                        echo "<button class='btn btn-danger btn-sm' style='margin:2px;' onclick='decline(\"{$peminjaman['nama_ruang']}\",\"{$peminjaman['id_ruang']}\",\"{$peminjaman['id_peminjaman']}\")'>Tolak</button>";
                        echo "</td>";
                        echo "<td>{$peminjaman['kegiatan']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->