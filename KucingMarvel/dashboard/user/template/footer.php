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
                url: "function/prosesUpdateJadwal.php",
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

    $(document).ready(function() {
        $("#date2").change(function() {
            var tanggal = new Date($("#date2").val());
            var selectedDay = $("#daySelect").val();
            var selectedWeek = $("#weekSelect").val();
            var hari2 = tanggal.getDay() % 7;
            var date2 = tanggal.toISOString().slice(0, 10);
            console.log(date2);
            console.log(hari2);
            // console.log(selectedDay);

            $.ajax({
                url: "function/prosesUpdateJadwal2.php",
                type: "POST",
                data: {
                    date: date2,
                    day: hari2,
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

    $(document).ready(function() {
        $(document).on('click', '#jadwalTable td', function() {
            var roomId = $(this).closest('tr').find('th').text();
            var day = $("#daySelect").val();
            var week = $("#weekSelect").val();

            $.ajax({
                url: "index.php?page=peminjaman",
                type: "POST",
                data: {
                    roomId: roomId,
                    day: day,
                    week: week
                },
                success: function(result) {
                    $("#peminjamanContainer").html(result);
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        });
    });
</script>
<!-- <script>
                        $(document).ready(function() {
                            $(document).on('click', '#jadwalTable td', function() {
                                var roomId = $(this).closest('tr').find('th').text();
                                var day = $("#daySelect").val();
                                var week = $("#weekSelect").val();

                                // Kirim request Ajax ke peminjaman.php
                                $.ajax({
                                    url: "peminjaman.php", // Ganti dengan URL yang sesuai
                                    type: "POST",
                                    data: {
                                        roomId: roomId,
                                        day: day,
                                        week: week
                                    },
                                    success: function(result) {
                                        // Tampilkan hasil di div peminjamanContainer atau lakukan sesuai kebutuhan
                                        $("#peminjamanContainer").html(result);
                                    },
                                    error: function(error) {
                                        console.log("Error:", error);
                                    }
                                });
                            });
                        });
                    </script> -->
<script>
    // !--Script Dropdown Hari-- >
    function updateDay(namaHari, kodeHari) {
        document.getElementById('daftarRuangDropdown').innerText = namaHari;
        // document.getElementById('daftarRuangDropdown') = kodeHari;

    }
    // Script Dropdown Minggu
    function updateWeek(namaMinggu, kodeMinggu) {
        document.getElementById('daftarMingguDropdown').innerText = namaMinggu;

        console.log("Kode Minggu: " + kodeMinggu);
    }
</script>
<script>
    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);
        const iconButton = document.getElementById('eye-slash-' + inputId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            iconButton.className = 'far fa-eye-slash';
        } else {
            passwordInput.type = "password";
            iconButton.className = 'far fa-eye-slash';
        }
    }
</script>
</body>

</html>