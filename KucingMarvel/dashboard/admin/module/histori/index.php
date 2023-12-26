<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-6 mb-4">
            <h1 class="h3 mb-0 text-gray-800">History Page</h1>
        </div>
    </div>

    <div class="RequestList">

    </div>
    <div class="cardInfo">
        <div class="container mt-2">

            <form action="" method="POST" class="mb-3">
                <div class="row form-group">
                    <input type="text" name="searchTerm" id="searchTerm" class="form-control" placeholder="Cari berdasarkan tanggal...">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nim/Nip</th>
                                <th>Nama</th>
                                <th>Ruang</th>
                                <th>Tanggal</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $admin->historiPeminjaman();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->