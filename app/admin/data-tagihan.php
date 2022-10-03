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
                                <div class="card-header bg-dark">
                                    <h5>Kirim Tagihan</h5>
                                </div>
                                <?php
                                // $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                // $bulan = mysqli_fetch_array($query);
                                ?>
                                <div class="card-body">
                                    <div class="row justify-content-center">

                                        <div class="col-md-3">
                                            <form action="data-tagihan.php" method="POST">
                                                <select class="form-select" name="id_kelompok" aria-label="Default select example">
                                                    <option selected>Pilih kelompok</option>
                                                    <?php
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM kelompok");
                                                    while ($pilihan = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $pilihan['id_kelompok']; ?>"><?= $pilihan['nama_kelompok']; ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-select" name="bulan" aria-label="Default select example">
                                                <option selected>Pilih bulan</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-dark" type="submit" name="cari">Cari</button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4>Data Tagihan</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Bulan</th>
                                                <th>Status</th>
                                                <th>Kirim Notifikasi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $no = 0;
                                            if (isset($_POST['cari'])) {
                                                $bulan = $_POST['bulan'];
                                                $kelompok = $_POST['id_kelompok'];
                                                $query2 = mysqli_query($koneksi, "SELECT * FROM transaksi
                                                                INNER JOIN users ON transaksi.id_user = users.id_user
                                                                INNER JOIN kelompok ON transaksi.id_kelompok = kelompok.id_kelompok
                                                                WHERE transaksi.status_transaksi = 'Belum bayar'
                                                                AND transaksi.id_kelompok = '$kelompok'
                                                                AND transaksi.bulan = '$bulan'
                                                                ORDER BY transaksi.id_transaksi DESC");
                                                while ($transaksi = mysqli_fetch_array($query2)) {
                                                    $no++
                                            ?>
                                                    <tr>

                                                        <td><?= $no; ?></td>
                                                        <td><?= $transaksi['nama_user']; ?></td>
                                                        <td><?= rupiah($transaksi['jumlah_iuran']); ?></td>
                                                        <td><?= $transaksi['bulan']; ?></td>
                                                        <td>
                                                            <span class="badge badge-danger p-2"><?= $transaksi['status_transaksi']; ?></span>
                                                        </td>
                                                        <td>

                                                            <a href="kirim-tagihan.php?id=<?= $transaksi['id_user']; ?>" class="btn btn-primary">Dashboard</a>
                                                            <a href="https://api.whatsapp.com/send?phone=6289505347307&text=Kepada%20Yth%20Bpk/ibu%20<?= $transaksi['nama_user']; ?>,%20Anda%20terdaftar%20pada%20kelompok%20<?= $transaksi['nama_kelompok']; ?>%20dan%20belum%20melakukan%20pembayaran%20pada%20bulan%20<?= $transaksi['bulan']; ?>%20sejumalah%20<?= rupiah($transaksi['jumlah_iuran']); ?>.%20Segera melakukan pembayaran sebelum jatuh tempo" target="_blank" rel="noopener noreferrer" class="btn btn-success">Watsapp</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>

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