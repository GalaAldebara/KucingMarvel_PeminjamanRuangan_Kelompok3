<?php
include 'php/koneksi.php';

$query_jadwal = "SELECT j.kode_jadwal, j.id_ruang, r.nama_ruang, r.status , h.kode_hari ,j.kode_hari,j.kode_minggu, j.jp_mulai, j.jp_selesai
                                FROM jadwal j
                                INNER JOIN ruang r ON j.id_ruang = r.id_ruang
                                INNER JOIN hari h ON j.kode_hari = h.kode_hari
                                INNER JOIN minggu m ON j.kode_minggu = m.kode_minggu
                                WHERE h.kode_hari = {$_POST['day']} AND m.kode_minggu = {$_POST['week']}";
$result = $koneksi->query($query_jadwal);


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
                        echo "<tr>";
                        echo "<th scope='row'>" . $hariData['nama_ruang'] . "</th>";

                        for ($jam_count = 1; $jam_count <= 11; $jam_count++) {
                            $availability = "Available"; // Default is Available

                            // Periksa setiap jadwal pada hari ini
                            foreach ($hariData['jadwal'] as $jadwal) {
                                if (($jam_count >= $jadwal['jp_mulai']) && ($jam_count <= $jadwal['jp_selesai'])) {
                                    $availability = "Unavailable";
                                    break; // Jika sudah ditemukan jadwal yang cocok, hentikan loop
                                }
                            }
                            if ($availability == "Available") {
                                echo "<td class='bg-success'>$availability</td>";
                            } else if ($availability == "Unavailable") {
                                echo "<td class='bg-warning'>$availability</td>";
                            } else {
                                echo "<td calss='bg-danger'>$availability</td>";
                            }
                        }

                        echo "</tr>";
                    }
                }
            } else {
                echo $koneksi->error;
            }
            ?>
        </tbody>
    </table>
</div>