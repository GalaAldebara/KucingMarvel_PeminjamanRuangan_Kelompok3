<?php
require_once __DIR__ . "/../php/koneksi.php";

class user extends Connection
{
    public $nim = '';
    public $nama = '';
    public $jurusan = '';
    public $level = '';
    public $no_telp = '';
    public $password = '';
    public $hasil = false;

    public function cekUser($nim)
    {
        $this->connect();

        $sql = "SELECT * FROM user WHERE nim = '$nim'";
        $result = mysqli_query($this->koneksi, $sql);

        if (mysqli_num_rows($result) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_array($result);
            $this->nim = $data['nim'];
            $this->nama = $data['nama'];
            $this->jurusan = $data['jurusan'];
            $this->level = $data['level'];
            $this->no_telp = $data['no_telp'];
            $this->password = $data['password'];
        }
    }

    public function antiinjection($data)
    {
        $this->connect();

        $filter_sql = mysqli_real_escape_string($this->koneksi, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
        return $filter_sql;
    }

    public function editDataDiri()
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
            $password = $_POST['password'];
            $level = $_POST['level'];
            $no_telp = $_POST['no_telp'];

            // Gunakan prepared statement untuk menghindari SQL injection
            $query_update = $this->koneksi->prepare("UPDATE user SET nama=?, jurusan=?, password=?, level=?, no_telp=? WHERE nim=?");
            $query_update->bind_param("ssssss", $nama, $jurusan, $password, $level, $no_telp, $nim);
            $query_update->execute();

            // Periksa apakah query berhasil dijalankan
            if ($query_update->affected_rows > 0) {
                echo "Data Berhasil Dirubah";
                header("Location: /xampp/KucingMarvel_PeminjamanRuangan_Kelompok3/bootstrap/index.php?page=tampilinformasi");
                exit();
            } else {
                echo "Gagal Mengupdate Data Diri Anda" . $this->koneksi->error;
                header("Location: /xampp/KucingMarvel_PeminjamanRuangan_Kelompok3/bootstrap/index.php?page=tampilinformasi");
                exit();
            }

            // Tutup prepared statement
            $query_update->close();
        }
    }
}
