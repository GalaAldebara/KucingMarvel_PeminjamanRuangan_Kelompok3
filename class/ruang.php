<?php
require_once "php/koneksi.php";

class ruang extends Connection
{

    public function jumlahRuang()
    {
        $this->connect();
        $queryCountJumlahRuang = "SELECT COUNT(id_ruang) AS jmlRuang FROM ruang WHERE lantai=7";
        $resultJumlahRuang = mysqli_query($this->koneksi, $queryCountJumlahRuang);
        while ($count = mysqli_fetch_array($resultJumlahRuang)) {
            $jumlahRuang = $count["jmlRuang"];
            echo $jumlahRuang;
        }
    }

    public function jmlhRuangAval()
    {
        $this->connect();
        $queryCountRuangAvail = "SELECT COUNT(id_ruang) AS jmlRuangAvail FROM ruang WHERE lantai=7 AND status='available'";
        $resultJumlahRuangAvail = mysqli_query($this->koneksi, $queryCountRuangAvail);
        while ($countRA = mysqli_fetch_array($resultJumlahRuangAvail)) {
            $jumlahRA = $countRA["jmlRuangAvail"];
            echo $jumlahRA;
        }
    }

    public function jmlhRuangUnval()
    {
        $this->connect();
        $queryCountRuangUnavail = "SELECT COUNT(id_ruang) AS jmlRuangUnavail FROM ruang WHERE lantai=7 AND (status='unavailable' OR status='urgent')";
        $resultJumlahRuangUnavail = mysqli_query($this->koneksi, $queryCountRuangUnavail);
        while ($countRU = mysqli_fetch_array($resultJumlahRuangUnavail)) {
            $jumlahRU = $countRU["jmlRuangUnavail"];
            echo $jumlahRU;
        }
    }

    public function pendingReq()
    {
        $this->connect();
        $queryCountRuangPending = "SELECT COUNT(id_ruang) AS jmlRuangPend FROM ruang WHERE lantai=7 AND status='pending'";
        $resultJumlahRuangPending = mysqli_query($this->koneksi, $queryCountRuangPending);
        while ($countP = mysqli_fetch_array($resultJumlahRuangPending)) {
            $jumlahP = $countP["jmlRuangPend"];
            echo $jumlahP;
        }
    }

    public function kotak2()
    {
        $this->connect();
        $query = "SELECT nama_ruang,status FROM ruang WHERE lantai = 7 order by nama_ruang asc";
        $result = mysqli_query($this->koneksi, $query);
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_array($result)) {
                $no++;
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

                echo '<a href = "dashboard/user/module/peminjaman/index.php">' .
                    '<div class="card ' . $bg_color . ' text-white shadow-lg" style="width: 120px; height: 120px; cursor: pointer;" )">' .
                    '<div class="card-body">' .
                    $row["nama_ruang"] .
                    '<div class="text-white-50 small">' . $row["status"] . '</div>' .
                    '</div>' .
                    '</div>' .
                    '</a>';
            }
        }
    }
}
