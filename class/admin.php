<?php
require_once 'user.php';
//admin
class admin extends user
{
    public function tambah()
    {
        // Tangkap data dari formulir
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $no_telp = $_POST['no_telp'];
        $level = $_POST['level'];
        $password = $_POST['password']; // Simpan password dengan enkripsi
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Simpan password dengan enkripsi

        // Query untuk menambahkan user ke database
        $query = "INSERT INTO user (nim, nama, jurusan, no_telp, level, password) VALUES ('$nim', '$nama', '$jurusan', '$no_telp', '$level', '$password')";

        // Eksekusi query
        $result = mysqli_query($this->koneksi, $query);

        // Periksa apakah query berhasil dijalankan
        if ($result) {
            echo "User berhasil ditambahkan.";
            header("Location: /xampp/KucingMarvel_PeminjamanRuangan_Kelompok3/bootstrap/index.php?page=daftarUser");
        } else {
            echo "Gagal menambahkan user: " . mysqli_error($this->koneksi);
            header("Location: /xampp/KucingMarvel_PeminjamanRuangan_Kelompok3/bootstrap/index.php?page=daftarUser");
        }
    }
    public function edit()
    {
        $this->connect();
        if ($this->koneksi->connect_error) {
            die("Koneksi gagal: " . $this->koneksi->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Gunakan $_POST tanpa isset untuk mendapatkan nilai yang dikirimkan dari frontend
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jurusan = $_POST['jurusan'];
            $level = $_POST['level'];
            $no_telp = $_POST['no_telp'];

            // Gunakan prepared statement untuk menghindari SQL injection
            $query_update = $this->koneksi->prepare("UPDATE user SET nama=?, jurusan=?, level=?, no_telp=? WHERE nim=?");
            $query_update->bind_param("sssss", $nama, $jurusan, $level, $no_telp, $nim);
            $query_update->execute();

            // Periksa apakah query berhasil dijalankan
            if ($query_update->affected_rows > 0) {
                echo "Permintaan Diterima.";
                header("Location: /xampp/KucingMarvel_PeminjamanRuangan_Kelompok3/bootstrap/index.php?page=daftarUser");
                exit();
            } else {
                echo "Gagal Mengupdate User dengan NIM '$nim': " . $this->koneksi->error;
                header("Location: /xampp/KucingMarvel_PeminjamanRuangan_Kelompok3/bootstrap/index.php?page=daftarUser");
                exit();
            }

            // Tutup prepared statement
            $query_update->close();
        }
    }

    public function hapus()
    {
        $this->connect();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["deleteUser"])) {
                $nama = $_POST["deleteUser"];

                // Gunakan prepared statement untuk menghindari SQL injection
                $query = "DELETE FROM user WHERE nama LIKE ?";
                $stmt = $this->koneksi->prepare($query);
                $stmt->bind_param("s", $nama);
                $stmt->execute();

                // Periksa apakah query berhasil dijalankan
                if ($stmt->affected_rows > 0) {
                    echo "Pengguna dengan nama '$nama' berhasil dihapus.";
                } else {
                    echo "Gagal menghapus pengguna dengan nama '$nama': " . $this->koneksi->error;
                }

                // Tutup prepared statement
                $stmt->close();
            }
        }
    }

    public function totalUser() //admin
    {
        $this->connect();
        $queryCountUser = "SELECT COUNT(nim) AS jmlUser FROM user WHERE level like 'user'";
        $resultCountUser = mysqli_query($this->koneksi, $queryCountUser);
        while ($countU = mysqli_fetch_array($resultCountUser)) {
            $jumlahU = $countU["jmlUser"];
            echo $jumlahU;
        }
    }

    public function cariUser() //admin
    {
        $this->connect();
        $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
        if (!empty($searchTerm)) {
            $query = "SELECT nim, nama, jurusan, level, no_telp FROM user WHERE (level='user') AND nama LIKE '%$searchTerm%'";
        } else {
            $query = "SELECT nim, nama, jurusan, level, no_telp FROM user WHERE level='user'";
        }

        $result = mysqli_query($this->koneksi, $query);
        while ($user = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>{$user['nama']}</td>";
            echo "<td>{$user['jurusan']}</td>";
            echo "<td>{$user['level']}</td>";
            echo "<td>{$user['no_telp']}</td>";
            echo "<td>";
            // echo "<button class='btn btn-primary btn-sm' onclick='editUser(\"{$user[' nim']}\",\"{$user['nama']}\", \"{$user['jurusan']}\", \"{$user['level']}\", \"{$user['no_telp']}\")'>Edit</button>";
            echo "<a class='btn btn-primary btn-sm' href='index.php?pages=edit?nim={$user[' nim']}'>Edit</a>";
            echo "&nbsp;";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteUser(\"{$user[' nama']}\")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
    }
    public function requestList() //admin request list
    {
        $this->connect();
        $queryCountReq = "SELECT COUNT(id_peminjaman) AS jmlReq FROM peminjaman WHERE status = 'belum'";
        $resultCountReq = mysqli_query($this->koneksi, $queryCountReq);
        while ($countRU = mysqli_fetch_array($resultCountReq)) {
            $jumlahRU = $countRU["jmlReq"];
            echo $jumlahRU;
        }
    }

    public function historiPeminjaman() //admin
    {
        $this->connect();
        $searchTerm = isset($_POST['searchTerm']) ? mysqli_real_escape_string($this->koneksi, $_POST['searchTerm']) : '';
        if (!empty($searchTerm)) {
            $query = "SELECT p.nim,u.nama, p.status, r.nama_ruang, DAY( p.tanggal) as Hari, p.id_ruang, p.kegiatan, p.kode_jp_mulai, p.kode_jp_selesai,jp.jp_mulai,jp.jp_selesai FROM peminjaman p
            INNER JOIN ruang r ON r.id_ruang = p.id_ruang
            INNER JOIN user u ON u.nim = p.nim
            INNER JOIN jp ON jp.kode_jp = p.kode_jp_mulai
            WHERE (p.status = 'diterima' OR p.status = 'ditolak') AND nama LIKE '%$searchTerm%'";
        } else {
            $query = "SELECT p.nim, u.nama, p.status, r.nama_ruang, DAY( p.tanggal) as Hari, p.id_ruang, p.kegiatan, p.kode_jp_mulai, p.kode_jp_selesai,jp.jp_mulai,jp.jp_selesai FROM peminjaman p
            INNER JOIN ruang r ON r.id_ruang = p.id_ruang
            INNER JOIN user u ON u.nim = p.nim
            INNER JOIN jp ON jp.kode_jp = p.kode_jp_mulai
            WHERE p.status = 'diterima' OR p.status = 'ditolak'";
        }
        $result = mysqli_query($this->koneksi, $query);
        while ($peminjaman = mysqli_fetch_array($result)) {
            // Elemen variabel
            $hari = $peminjaman['Hari'];
            $namedDay = date('l', strtotime($hari));
            // Isi tabel
            echo "<tr>";
            echo "<td>{$peminjaman['nim']}</td>";
            echo "<td>{$peminjaman['nama']}</td>";
            echo "<td>{$peminjaman['nama_ruang']}</td>";
            echo "<td>$namedDay</td>";
            echo "<td>Jam ke-{$peminjaman['kode_jp_mulai']}</td>";
            echo "<td>Jam ke-{$peminjaman['kode_jp_selesai']}</td>";
            echo "<td>{$peminjaman['status']}</td>";
            echo "<td>{$peminjaman['kegiatan']}</td>";
            echo "</tr>";
            // End Isi tabel
        }
    }
}
