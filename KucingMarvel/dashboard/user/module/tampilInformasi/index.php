<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <?php
        $koneksi = new Connection();

        $nim = $_SESSION['nim'];
        $query = "SELECT * FROM user WHERE nim = '$nim'";
        $result = mysqli_query($koneksi->koneksi, $query);

        if ($user = mysqli_fetch_array($result)) {
            // Tampilkan data diri user dalam card
            echo "<div class='container mt-2'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<h4 class='card-title mb-4 pl-2 text-left'>Data Diri User</h4>"; // Judul

            // Table head
            echo "<table class='table'>";

            // Data fields
            echo "<tr><td class='text-left'><strong>NIM</strong></td><td class='text-center'><strong>:</strong></td><td class='text-left'>{$user['nim']}</td></tr>";
            echo "<tr><td class='text-left'><strong>Nama</strong></td><td class='text-center'><strong>:</strong></td><td class='text-left'>{$user['nama']}</td></tr>";
            echo "<tr><td class='text-left'><strong>Jurusan</strong></td><td class='text-center'><strong>:</strong></td><td class='text-left'>{$user['jurusan']}</td></tr>";
            echo "<tr><td class='text-left'><strong>Level</strong></td><td class='text-center'><strong>:</strong></td><td class='text-left'>{$user['level']}</td></tr>";
            echo "<tr><td class='text-left'><strong>No. Telepon</strong></td><td class='text-center'><strong>:</strong></td><td class='text-left'>{$user['no_telp']}</td></tr>";

            echo "</table>"; // table
            echo "</div>"; // card-body
            echo "</div>"; // card
            echo "</div>"; // container
        } else {
            echo "Data tidak ditemukan.";
        }
        ?>
    </div>
</div>