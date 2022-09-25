<?php
$title = "Data transaksi";
$title2 = "Data penerima";

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
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        <div class=" d-flex">
                                            <h4 class="">Data Penerima</h4>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-info mb-3 float-right" data-toggle="modal" data-target="#tambah-pembayaran">
                                        Tambah Penerima
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bukti pembayaran</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Terima</th>
                                                <th>Jumlah Terima</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            // $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN users ON pembayaran.id_pembayaran = users.id_user");
                                            $query = mysqli_query($koneksi, "SELECT * FROM penerima
                                                            LEFT JOIN users 
                                                            ON penerima.id_user = users.id_user
                                                            LEFT JOIN kelompok 
                                                            ON penerima.id_kelompok = kelompok.id_kelompok");
                                            while ($penerima = mysqli_fetch_array($query)) {
                                                $no++
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td width='5%'>
                                                        <a href="../user/tambah/images/<? $penerima['bukti_penerima']; ?>">
                                                            <img src="../user/tambah/images/<?= $penerima['bukti_penerima']; ?>" alt="" width="60px">
                                                        </a>
                                                    </td>
                                                    <td><?= $penerima['nama_user']; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($penerima['tanggal_terima'])); ?></td>
                                                    <td>
                                                        <?php
                                                        if ($penerima['tipe_arisan'] == 'Bulanan') {
                                                            echo rupiah($penerima['jumlah_terima'] * 12);
                                                        } else {
                                                            echo rupiah($penerima['jumlah_terima'] * 6);
                                                        }
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        if ($penerima['status_penerima'] == 'Pending') {
                                                            echo '<span class="badge badge-warning p-2">Pending</span>';
                                                        } elseif ($penerima['status_penerima'] == 'Dikonfirmasi') {
                                                            echo '<span class="badge badge-success p-2">Diterima</span>';
                                                        }

                                                        ?>

                                                    </td>

                                                </tr>
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



        <div class="modal fade" id="tambah-pembayaran">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- ganti hidden menjadi text -->
                    <form action="tambah/tambah-pembayaran.php" method="POST" name="pembayaran" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <select class="form-select-lg form-control" aria-label=".form-select-lg example">
                                        <option selected>Pilih nama anggota yang akan dibayar</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE users.pemenang = '1'");
                                        while ($pembayaran = mysqli_fetch_array($query)) {
                                            $id_user = $pembayaran['id_user'];
                                        ?>
                                            <option value="<?= $pembayaran['id_user']; ?>"><?= $pembayaran['nama_user']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM kelompok LEFT JOIN users
                                                        ON kelompok.id_kelompok = users.id_kelompok
                                                        WHERE users.id_user = '$id_user'");
                            while ($data = mysqli_fetch_array($query)) {;

                            ?>
                                <div class="row mb-3">
                                    <label for="exampleInputFile" class="col-sm-3 col-form-label">Foto Pembayaran</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="bukti_bayar" class="custom-file-input" id="exampleInputFile" required>
                                                <label class="custom-file-label" for="exampleInputFile"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for=nama_kelompok" class="col-sm-3 col-form-label">Nama Kelompok</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control" type="text" name="" value="<?= $data['nama_kelompok']; ?>" aria-label="Disabled input example" disabled readonly>
                                        <input class="form-control form-control" type="hidden" name="nama_kelompok" value="<?= $data3['id_kelompok']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bank_tujuan" class="col-sm-3 col-form-label">Bank Tujuan</label>
                                    <div class="col-sm-9">
                                        <div class="input-grup">
                                            <select class="form-select form-control" aria-label="Default select example" id="bank_tujuan" name="bank_tujuan" placeholder="*" required>
                                                <option selected>...Pilih...</option>
                                                <option value="BRI">BRI</option>
                                                <option value="BCA">BCA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_bayar" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control" type="date" name="tanggal_bayar">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for=jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control" type="text" value="<?= rupiah($data3['jumlah_iuran']); ?>" name="jumlah" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for=bulan" class="col-sm-3 col-form-label">Bulan</label>
                                    <div class="col-sm-9">
                                        <div class="input-grup">
                                            <select class="form-select form-control" aria-label="Default select example" id="bulan" name="bulan" placeholder="*" required>
                                                <option selected>...Pilih...</option>
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
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="simpan" class="btn btn-primary float-right">Bayar</button>
                            <a href="." type="submit" class="btn btn-default">Cancel</a>
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