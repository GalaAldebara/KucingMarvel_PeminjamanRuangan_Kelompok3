<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kucing Marvels</span>
        </div>
    </div>
</footer>
<!-- Footer -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- `````````````````````````````````````````````TEMPAT SCRIPT ````````````````````````````````````````` -->
<!-- `````````````````````````````````````````````TEMPAT SCRIPT ````````````````````````````````````````` -->
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script>
    function cardClicked() {
        alert('Card Ditekan!');

    }
</script>

<!-- Script Jam RealTime -->
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Formatting waktu menjadi HH:MM:SS
        var timeString = padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds);

        // Memperbarui elemen dengan ID "clock" dengan waktu yang baru
        document.getElementById("clock").innerText = timeString;
    }

    function padZero(number) {
        // Menambahkan nol di depan angka jika hanya satu digit
        return (number < 10) ? "0" + number : number;
    }

    // Memperbarui waktu setiap detik
    setInterval(updateClock, 1000);

    // Memanggil fungsi updateClock untuk pertama kali saat halaman dimuat
    updateClock();
</script>
<!-- Script Tabel Jadwal -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#date").change(function() {
            var tanggal = new Date($("#date").val());
            var selectedDay = $("#daySelect").val();
            var selectedWeek = $("#weekSelect").val();
            var hari = tanggal.getDay() % 7;
            var date = tanggal.toISOString().slice(0, 10);
            console.log(date);
            console.log(hari);
            // console.log(selectedDay);

            $.ajax({
                url: "function/prosesUpdateJadwal_Admin.php",
                type: "POST",
                data: {
                    date: date,
                    day: hari,
                    week: selectedWeek
                },
                success: function(result) {
                    $("#jadwalContainer").html(result);
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        });
    });
</script>
<script>
    // !--Script Dropdown Hari-- >
    function updateDay(namaHari, kodeHari) {
        document.getElementById('daftarRuangDropdown').innerText = namaHari;
        // document.getElementById('daftarRuangDropdown') = kodeHari;

    }
    // Script Dropdown Minggu
    function updateWeek(namaMinggu, kodeMinggu) {
        document.getElementById('daftarMingguDropdown').innerText = namaMinggu;

        // Gunakan nilai kodeHari sesuai kebutuhan, contohnya:
        console.log("Kode Minggu: " + kodeMinggu);
    }
</script>

<!-- daftar user script -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- TAMBAH AJAX -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Script Edit/Delete -->
<script>
    function editUser(nim, nama, jurusan, level, telp) {
        $.post("function/edit.php", {
            Nim: nim,
            Nama: nama,
            Jurusan: jurusan,
            Level: level,
            Telp: telp
        }, function(response) {
            console.log(response);
        });
    }

    function deleteUser(nama) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus user '" + nama + "'?");
        if (konfirmasi) {
            console.log("Delete user:", nama);
            $.post({
                url: "function/hapus.php",
                data: {
                    deleteUser: nama
                },
                dataType: "text", // Tambahkan ini untuk memastikan respons sebagai teks
                success: function(response) {
                    // Tampilkan respons dari server
                    console.log(response);
                    location.reload();
                },
                error: function() {
                    console.error("Gagal menghapus pengguna dengan nama:", nama);
                }
            });
        }
    }
</script>


<!-- edit script -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function edit(nim, nama, jurusan, level, no_telp) {
        $.post("function/edit.php", {
            nim: nim,
            nama: nama,
            jurusan: jurusan,
            level: level,
            no_telp: no_telp
        }, function(response) {
            console.log(response);
            if (response.includes("berhasil")) {
                window.location.href = "index.php?page=daftarUser";
            }
        });
    }
</script>

<!-- request script -->
<script>
    function approve(ruang, idruang, idpeminjaman) {
        var konfirmasi = confirm("Apakah Anda yakin ingin mem-validasi peminjaman '" + ruang + "'?");
        if (konfirmasi) {
            $.post("function/terima_tolak.php", {
                Accruang: idpeminjaman
            }, function(response) {
                // Tampilkan respons dari server
                console.log(response);

                var rowToRemove = $("td:contains('" + idpeminjaman + "')").closest("tr");
                rowToRemove.remove();
            });
        }
    }

    function decline(ruang, idruang, idpeminjaman) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menolak peminjaman '" + ruang + "'?");
        if (konfirmasi) {
            $.post("function/terima_tolak.php", {
                Decruang: idpeminjaman
            }, function(response) {
                // Tampilkan respons dari server
                console.log(response);

                var rowToRemove = $("td:contains('" + idpeminjaman + "')").closest("tr");
                rowToRemove.remove();
            });
        }
    }

    function lihatInfo(info) {
        $.post("function/tampilInfo.phpp", {
            Kegiatan: info
        }, function(response) {
            var Text = "Kegiatan:";
            alert(Text + " " + response);
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- script histori -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- script tambah user -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- TAMBAH AJAX -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>