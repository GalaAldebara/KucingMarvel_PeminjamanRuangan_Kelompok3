<?php


class ruang extends Connection
{

    public function jumlahRuangLt7()
    {
        $this->connect();
        $queryCountJumlahRuang = "SELECT COUNT(id_ruang) AS jmlRuang FROM ruang WHERE lantai=7";
        $resultJumlahRuang = mysqli_query($this->koneksi, $queryCountJumlahRuang);
        while ($count = mysqli_fetch_array($resultJumlahRuang)) {
            $jumlahRuang = $count["jmlRuang"];
            echo $jumlahRuang;
        }
    }
    public function jumlahRuangLt8()
    {
        $this->connect();
        $queryCountJumlahRuang = "SELECT COUNT(id_ruang) AS jmlRuang FROM ruang WHERE lantai=8";
        $resultJumlahRuang = mysqli_query($this->koneksi, $queryCountJumlahRuang);
        while ($count = mysqli_fetch_array($resultJumlahRuang)) {
            $jumlahRuang = $count["jmlRuang"];
            echo $jumlahRuang;
        }
    }

    public function jmlhRuangDiterima()
    {
        $this->connect();
        $queryCountDiterima = "SELECT COUNT(id_peminjaman) AS jmlPermintaanDiterima FROM peminjaman WHERE nim={$_SESSION['nim']} AND status='diterima'";
        $resultJumlahDiterima = mysqli_query($this->koneksi, $queryCountDiterima);
        while ($count = mysqli_fetch_array($resultJumlahDiterima)) {
            $jumlah = $count["jmlPermintaanDiterima"];
            echo $jumlah;
        }
    }

    public function jmlhPermintaanDitolak()
    {
        $this->connect();
        $queryPermintaanDitolak = "SELECT COUNT(id_peminjaman) AS jmlPermintaanDitolak FROM peminjaman WHERE nim={$_SESSION['nim']} AND status='ditolak'";
        $resultPermintaanDitolak = mysqli_query($this->koneksi, $queryPermintaanDitolak);
        while ($count = mysqli_fetch_array($resultPermintaanDitolak)) {
            $jumlah = $count["jmlPermintaanDitolak"];
            echo $jumlah;
        }
    }

    public function pendingReq()
    {
        $this->connect();
        $queryCountRuangPending = "SELECT COUNT(id_peminjaman) AS jmlRuangPend FROM peminjaman WHERE nim={$_SESSION['nim']} AND status='belum'";
        $resultJumlahRuangPending = mysqli_query($this->koneksi, $queryCountRuangPending);
        while ($countP = mysqli_fetch_array($resultJumlahRuangPending)) {
            $jumlahP = $countP["jmlRuangPend"];
            echo $jumlahP;
        }
    }
    function getDataFasilitasByRuang($idRuang)
    {
        $this->connect();
        $query = "SELECT kapasitas, proyektor, papantulis, stopkontak FROM fasilitas WHERE id_ruang = '$idRuang'";
        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            $data = mysqli_fetch_assoc($result);
            return $data;
        } else {
            return null;
        }
    }
}
