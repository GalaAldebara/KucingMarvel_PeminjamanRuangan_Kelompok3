<?php
// Pengecekan apakah form pencarian disubmit
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($koneksi, $_GET['search']);
    $query = "SELECT nama_ruang, status FROM ruang WHERE (lantai = 7 OR lantai = 8) AND nama_ruang LIKE '%$searchTerm%' ORDER BY nama_ruang DESC";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // ... (kode looping dan tampilan kartu ruangan tetap sama)
        while ($row = mysqli_fetch_array($result)) {
            $status = $row["status"];

            // Atur warna berdasarkan status
            switch ($status) {
                case 'available':
                    $bg_color = 'bg-success';
                    break;
                case 'unavailable':
                    $bg_color = 'bg-danger';
                    break;
                case 'pending':
                    $bg_color = 'bg-secondary';
                    break;
                case 'urgent':
                    $bg_color = 'bg-gray-900';
                    break;
                default:
                    $bg_color = 'bg-light';
                    break;
            }
            echo '<div class="col-auto mb-4">' .
                '<div class="card ' . $bg_color . ' text-white shadow-lg" style="width: 120px; height: 120px; cursor: pointer;" onclick="cardClicked()">' .
                '<div class="card-body">' .
                $row["nama_ruang"] .
                '<div class="text-black-50 small">' . $row["status"] . '</div>' .
                '</div>' .
                '</div>' .
                '</div>';
        }
    } else {
        echo "Error dalam menjalankan query: " . mysqli_error($koneksi);
    }
} else {
    echo "";
}
