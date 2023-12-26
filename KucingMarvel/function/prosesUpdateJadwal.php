<?php
include '../php/koneksi.php';
$koneksi = new Connection();

$day = $_POST['day'];
$week = $_POST['week'];
$date = $_POST['date'];

$query_jadwal = "SELECT j.kode_jadwal, j.id_ruang, r.nama_ruang, r.status,r.lantai, h.kode_hari ,j.kode_hari,j.kode_minggu, j.jp_mulai, j.jp_selesai
                                FROM jadwal j
                                INNER JOIN ruang r ON j.id_ruang = r.id_ruang
                                INNER JOIN hari h ON j.kode_hari = h.kode_hari
                                INNER JOIN minggu m ON j.kode_minggu = m.kode_minggu
                                WHERE h.kode_hari = {$day} AND m.kode_minggu = {$week} AND r.lantai = 7";
$query_peminjaman = "SELECT * FROM `peminjaman` WHERE tanggal = '{$date}';";
$result = mysqli_query($koneksi->koneksi, $query_jadwal);
$result_peminjaman = mysqli_query($koneksi->koneksi, $query_peminjaman);
$peminjaman = $result_peminjaman->fetch_all();


?>
<div style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
    <table id="jadwalTable" class="table table-responsive" style="border-collapse: separate; border-spacing: 0;">
        <thead style="background-color: #2c4182; color: white; border-radius: 10px;">
            <tr>
                <th scope="col">Ruang</th>
                <th scope="col" class="text-nowrap">Jam Ke-1</th>
                <th scope="col" class="text-nowrap">Jam Ke-2</th>
                <th scope="col" class="text-nowrap">Jam Ke-3</th>
                <th scope="col" class="text-nowrap">Jam Ke-4</th>
                <th scope="col" class="text-nowrap">Jam Ke-5</th>
                <th scope="col" class="text-nowrap">Jam Ke-6</th>
                <th scope="col" class="text-nowrap">Jam Ke-7</th>
                <th scope="col" class="text-nowrap">Jam Ke-8</th>
                <th scope="col" class="text-nowrap">Jam Ke-9</th>
                <th scope="col" class="text-nowrap">Jam Ke-10</th>
                <th scope="col" class="text-nowrap">Jam Ke-11</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                $mergedData = array(); // Array untuk menyimpan data yang telah digabungkan

                while ($row_jadwal = $result->fetch_assoc()) {

                    $kode_ruang = $row_jadwal['id_ruang'];
                    $kode_hari = $row_jadwal['kode_hari'];

                    if (!isset($mergedData[$kode_ruang][$kode_hari])) {
                        $mergedData[$kode_ruang][$kode_hari] = array(
                            'kode_ruang' => $row_jadwal['id_ruang'],
                            'nama_ruang' => $row_jadwal['nama_ruang'],
                            'status' => $row_jadwal['status'],
                            'jadwal' => array()
                        );
                    }

                    $mergedData[$kode_ruang][$kode_hari]['jadwal'][] = array(
                        'jp_mulai' => $row_jadwal['jp_mulai'],
                        'jp_selesai' => $row_jadwal['jp_selesai']
                    );
                }

                // Proses dan tampilkan hasil
                foreach ($mergedData as $ruang) {
                    foreach ($ruang as $hariData) {
                        $availableSlots = array();
                        $UnavailableSlots = array();
                        $PendingSlots = array();
                        $DipinjamSlots = array();

                        echo "<tr>";
                        echo "<th scope='row'>" . $hariData['nama_ruang'] . "</th>";

                        $peminjaman_hari_ini = array_filter($peminjaman, function ($peminjaman_row) use ($hariData) {
                            return $peminjaman_row[6] == $hariData['kode_ruang'];
                        });

                        for ($jam_count = 1; $jam_count <= 11; $jam_count++) {
                            $availability = "Available";
                            $ruangId = '';

                            foreach ($hariData['jadwal'] as $jadwal) {
                                if (($jam_count >= $jadwal['jp_mulai']) && ($jam_count <= $jadwal['jp_selesai'])) {
                                    $availability = "Unavailable";
                                    break;
                                }
                            }

                            foreach ($peminjaman_hari_ini as $peminjaman_row) {
                                if (($jam_count >= $peminjaman_row[4]) && ($jam_count <= $peminjaman_row[5])) {
                                    switch ($peminjaman_row[7]) {
                                        case 'belum':
                                            $availability = "Pending";
                                            break;
                                        case 'diterima':
                                            $availability = "Dipinjam";
                                            break;
                                        default:
                                            $availability = "Available";
                                            break;
                                    }
                                    break;
                                }
                            }

                            if ($availability == "Unavailable") {
                                $UnavailableSlots[] += $jam_count;
                                echo "<td class='bg-danger' style='color:white;'>$availability</td>";
                            } else if ($availability == "Available") {
                                $availableSlots[] = $jam_count;
                                $linkURL = "index.php?page=peminjaman&room=" . urlencode($hariData['kode_ruang']) . "&day=" . urlencode($_POST['day']) . "&time=" . urlencode($jam_count) . "&date=" . urlencode($_POST['date']) . "&availableSlots=" . urlencode(implode(',', $availableSlots));
                                echo "<td class='bg-success'><a style='color:white;' href='$linkURL'>$availability</a></td>";
                            } elseif ($availability == "Pending") {
                                $PendingSlots[] += $jam_count;
                                echo "<td class='bg-gray-600' style='color:white;'>$availability</td>";
                            } elseif ($availability == "Dipinjam") {
                                $DipinjamSlots[] += $jam_count;
                                echo "<td class='' style='color:white; background-color: #000;'>$availability</td>";
                            } else {
                                echo "<td class='bg-secondary' style='color:white;'>$availability</td>";
                            }
                        }

                        echo "</tr>";
                    }
                }
            } else {
                die("Error in SQL query: " . mysqli_error($koneksi->koneksi));
            }
            ?>
        </tbody>
    </table>
</div>