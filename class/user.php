<?php
require_once "php/koneksi.php";

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

    // public function updatejadwal()
    // {
    //     $query_jadwal = "SELECT j.kode_jadwal, j.id_ruang, r.nama_ruang, r.status , h.kode_hari ,j.kode_hari,j.kode_minggu, j.jp_mulai, j.jp_selesai
    //                             FROM jadwal j
    //                             INNER JOIN ruang r ON j.id_ruang = r.id_ruang
    //                             INNER JOIN hari h ON j.kode_hari = h.kode_hari
    //                             INNER JOIN minggu m ON j.kode_minggu = m.kode_minggu
    //                             WHERE h.kode_hari = {$_POST['day']} AND m.kode_minggu = {$_POST['week']}";
    //     $result = mysqli_query($this->koneksi, $query_jadwal);
    // }
    public function antiinjection($data)
    {
        $this->connect();

        $filter_sql = mysqli_real_escape_string($this->koneksi, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
        return $filter_sql;
    }
    // public function totalUser() //admin
    // {
    //     $this->connect();
    //     $queryCountUser = "SELECT COUNT(nim) AS jmlUser FROM user WHERE level like 'user'";
    //     $resultCountUser = mysqli_query($this->koneksi, $queryCountUser);
    //     while ($countU = mysqli_fetch_array($resultCountUser)) {
    //         $jumlahU = $countU["jmlUser"];
    //         echo $jumlahU;
    //     }
    // }

    // public function cariUser() //admin
    // {
    //     $this->connect();
    //     $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
    //     if (!empty($searchTerm)) {
    //         $query = "SELECT nim, nama, jurusan, level, no_telp FROM user WHERE (level='user') AND nama LIKE '%$searchTerm%'";
    //     } else {
    //         $query = "SELECT nim, nama, jurusan, level, no_telp FROM user WHERE level='user'";
    //     }

    //     $result = mysqli_query($this->koneksi, $query);
    //     while ($user = mysqli_fetch_array($result)) {
    //         echo "<tr>";
    //         echo "<td>{$user['nama']}</td>";
    //         echo "<td>{$user['jurusan']}</td>";
    //         echo "<td>{$user['level']}</td>";
    //         echo "<td>{$user['no_telp']}</td>";
    //         echo "<td>";
    //         // echo "<button class='btn btn-primary btn-sm' onclick='editUser(\"{$user['nim']}\",\"{$user['nama']}\", \"{$user['jurusan']}\", \"{$user['level']}\", \"{$user['no_telp']}\")'>Edit</button>";
    //         echo "<a class='btn btn-primary btn-sm' href='index.php?pages=edit?nim={$user['nim']}'>Edit</a>";
    //         echo "&nbsp;";
    //         echo "<button class='btn btn-danger btn-sm' onclick='deleteUser(\"{$user['nama']}\")'>Delete</button>";
    //         echo "</td>";
    //         echo "</tr>";
    //     }
    // }
}
