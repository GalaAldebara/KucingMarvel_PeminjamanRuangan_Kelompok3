<?php
require_once "php/koneksi.php";

class UpdatePasswords extends Connection
{
    public function updatePasswords()
    {
        $this->connect();

        // Ambil data user dari tabel
        $query = "SELECT nim, password FROM user";
        $result = $this->koneksi->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                // Enkripsi password menggunakan password_hash()
                $hashedPassword = password_hash($row['password'], PASSWORD_DEFAULT);

                // Perbarui data user dengan password yang sudah dienkripsi
                $updateQuery = "UPDATE user SET password = '$hashedPassword' WHERE nim = " . $row['nim'];
                $this->koneksi->query($updateQuery);
            }

            // Tutup koneksi
            $this->koneksi->close();
            echo "Password berhasil diperbarui.";
        } else {
            echo "Gagal mengambil data user: " . $this->koneksi->error;
        }
    }
}
