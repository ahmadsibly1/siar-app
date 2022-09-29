<?php
$title = "Data transaksi";
$title2 = "Data tagihan";
?>

<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>
<?php include('../../conf/rupiah.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">

            <!-- Sidebar -->
            <?php include('sidebar.php'); ?>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 60px;">

            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Kirim Tagihan</h5>
                                </div>
                                <?php
                                // $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                // $bulan = mysqli_fetch_array($query);
                                ?>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <?php
                                            $sql = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                            $pilihan = mysqli_fetch_array($sql);
                                            ?>
                                            <form action="data-tagihan.php" method="POST">
                                                <select class="form-select form-select-md mb-3" name="bulan" aria-label=".form-select-lg example">

                                                    <option selected>Pilih Bulan</option>
                                                    <option <?php if ($pilihan == 1) {
                                                                echo 'selected';
                                                            } ?> value="Januari">Januari</option>
                                                    <option <?php if ($pilihan == 2) {
                                                                echo 'selected';
                                                            } ?> value="Februari">Februari</option>
                                                    <option <?php if ($pilihan == 3) {
                                                                echo 'selected';
                                                            } ?> value="Maret">Maret</option>
                                                    <option <?php if ($pilihan == 4) {
                                                                echo 'selected';
                                                            } ?> value="April">April</option>
                                                    <option <?php if ($pilihan == 5) {
                                                                echo 'selected';
                                                            } ?> value="Mei">Mei</option>
                                                    <option <?php if ($pilihan == 6) {
                                                                echo 'selected';
                                                            } ?> value="Juni">Juni</option>
                                                    <option <?php if ($pilihan == 7) {
                                                                echo 'selected';
                                                            } ?> value="Juli">Juli</option>
                                                    <option <?php if ($pilihan == 8) {
                                                                echo 'selected';
                                                            } ?> value="Agustus">Agustus</option>
                                                    <option <?php if ($pilihan == 9) {
                                                                echo 'selected';
                                                            } ?> value="September">September</option>
                                                    <option <?php if ($pilihan == 10) {
                                                                echo 'selected';
                                                            } ?> value="Oktober">Oktober</option>
                                                    <option <?php if ($pilihan == 11) {
                                                                echo 'selected';
                                                            } ?> value="November">November</option>
                                                    <option <?php if ($pilihan == 12) {
                                                                echo 'selected';
                                                            } ?> value="Desember">Desember</option>
                                                </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-dark" type="submit">Cari</button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Tagihan</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nama Kelompok</th>
                                                <th>Jumlah</th>
                                                <th>Bulan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $no = 0;
                                            // if (isset($_POST['submit'])) {
                                            // $bulan = $_POST['bulan'];
                                            // $kelompok = $_POST['kelompok'];
                                            $query2 = mysqli_query($koneksi, "SELECT * FROM transaksi
                                                                INNER JOIN users ON transaksi.id_user = users.id_user
                                                                INNER JOIN kelompok ON users.id_kelompok = kelompok.id_kelompok
                                                                WHERE transaksi.status_transaksi = 'Belum bayar'");
                                            while ($transaksi = mysqli_fetch_array($query2)) {
                                                $no++
                                            ?>
                                                <tr>

                                                    <td><?= $no; ?></td>
                                                    <td><?= $transaksi['nama_user']; ?></td>
                                                    <td><?= $transaksi['nama_kelompok']; ?></td>
                                                    <td><?= rupiah($transaksi['jumlah_iuran']); ?></td>
                                                    <td>
                                                        <?php
                                                        function bulan($angka)
                                                        {
                                                            global $transaksi;
                                                            if ($transaksi['bulan'] == 1) {
                                                                echo date("F", strtotime("+1 month"));
                                                            } elseif ($transaksi['bulan'] == 2) {
                                                                echo date("F", strtotime("+2 month"));
                                                            } elseif ($transaksi['bulan'] == 3) {
                                                                echo date("F", strtotime("+3 month"));
                                                            } elseif ($transaksi['bulan'] == 4) {
                                                                echo date("F", strtotime("+4 month"));
                                                            } elseif ($transaksi['bulan'] == 5) {
                                                                echo date("F", strtotime("+5 month"));
                                                            } elseif ($transaksi['bulan'] == 6) {
                                                                echo date("F", strtotime("+6 month"));
                                                            } elseif ($transaksi['bulan'] == 7) {
                                                                echo date("F", strtotime("+7 month"));
                                                            } elseif ($transaksi['bulan'] == 8) {
                                                                echo date("F", strtotime("+8 month"));
                                                            } elseif ($transaksi['bulan'] == 9) {
                                                                echo date("F", strtotime("+9 month"));
                                                            } elseif ($transaksi['bulan'] == 10) {
                                                                echo date("F", strtotime("+10 month"));
                                                            } elseif ($transaksi['bulan'] == 11) {
                                                                echo date("F", strtotime("+11 month"));
                                                            } elseif ($transaksi['bulan'] == 12) {
                                                                echo date("F", strtotime("+12 month"));
                                                            }
                                                        }
                                                        ?>
                                                        <?= bulan($transaksi['bulan']); ?>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger p-2"><?= $transaksi['status_transaksi']; ?></span>
                                                    </td>
                                                    <td>

                                                        <a href="kirim-tagihan.php?id=<?= $transaksi['id_user']; ?>" class="btn btn-primary">Kirim</a>
                                                        <a href="https://api.whatsapp.com/send?phone=6289505347307&text=Kepada%20Yth%20Bpk/ibu%20<?= $transaksi['nama_user']; ?>,%20%0Anda%20terdaftar%20pada%20kelompok%20<?= $transaksi['nama_kelompok']; ?>%20dan%20belum%20melakukan%20pembayaran%20pada%20bulan%20<?= bulan($transaksi['bulan']); ?>%20sejumalah%20<?= rupiah($transaksi['jumlah_iuran']); ?>.%20%0Segera melakukan pembayaran sebelum" target="_blank" rel="noopener noreferrer" class="btn btn-success">Watsapp</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php   ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>



        <!-- tambah kelompok -->
        <div class="modal fade" id="tambah-kelompok">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="tambah/tambah-kelompok.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row mb-3">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="id">
                                <label for="nama_kelompok" class="col-sm-2 col-form-label">Nama kelompok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control" type="date" name="tanggal_mulai" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for=tipe_arisan" class="col-sm-2 col-form-label">Tipe Arisan</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control" type="text" name="tipe_arisan" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kuota" class="col-sm-2 col-form-label">Kuota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kuota" name="kuota" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="isi" name="isi" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jumlah_iuran" class="col-sm-2 col-form-label">Jumlah Iuran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jumlah_iuran" name="jumlah_iuran" required>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Buat</button>
                            <a href="data-kelompok.php" type="submit" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>





        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>