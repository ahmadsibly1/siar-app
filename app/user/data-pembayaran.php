<?php session_start(); ?>
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <div class="container-fluid">
                <div class="row mb-2 mt-3">
                    <div class="col-sm-12">
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- /.card -->
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <div class="d-flex justify-content-center">
                                                        <h3>Pembayaran</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body ">
                                                <button type="button" class="btn btn-info mb-3 " data-toggle="modal" data-target="#tambah-pembayaran">
                                                    Tambah Pembayaran
                                                </button>
                                                <div class="table-responsive">
                                                    <table id=" example1" class="table table-responsive table-sm table-bordered table-striped" style="font-size: 13px;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th width="10%">Bukti Pembayaran</th>
                                                                <th>Nama Pembayar</th>
                                                                <th>Nama Kelompok</th>
                                                                <th>Bank Tujuan</th>
                                                                <th>Tanggal Transfer</th>
                                                                <th width="10%">Jumlah</th>
                                                                <th>Bulan</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 0;
                                                            $id_user = $_GET['id_user'];
                                                            // $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN users ON pembayaran.id_pembayaran = users.id_user");
                                                            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran
                                                            LEFT JOIN users 
                                                            ON pembayaran.id_user = users.id_user
                                                            LEFT JOIN kelompok 
                                                            ON pembayaran.id_kelompok = kelompok.id_kelompok
                                                            WHERE pembayaran.id_user = '$id_user'");
                                                            while ($pembayaran = mysqli_fetch_array($query)) {
                                                                $no++
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td width='15%'><?= $pembayaran['bukti_bayar']; ?></td>
                                                                    <td><?= $pembayaran['nama_user']; ?></td>
                                                                    <td><?= $pembayaran['nama_kelompok']; ?></td>
                                                                    <td><?= $pembayaran['bank']; ?></td>
                                                                    <td><?= date('d-m-Y', strtotime($pembayaran['tgl_bayar'])); ?></td>
                                                                    <td><?= rupiah($pembayaran['jumlah']); ?></td>
                                                                    <td><?= $pembayaran['bulan']; ?></td>
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
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



        <!-- tambah Pembyaran -->
        <div class="modal fade" id="tambah-pembayaran">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    $query2 = mysqli_query($koneksi, "SELECT * FROM users, kelompok  WHERE username='$_SESSION[username]'");
                    $anggota = mysqli_fetch_array($query2);
                    ?>
                    <form action="tambah/tambah-pembayaran.php" method="POST" name="pembayaran" enctype="multipart/form-data">
                        <input type="hidden" name="id_regis" value="<?= $_SESSION['id_user'] ?>">
                        <div class="card-body">
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
                                <label for=nama_pembayar" class="col-sm-3 col-form-label">Nama Pembayar</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control" type="text" name="nama_pembayar" value="<?= $anggota['nama_user']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for=nama_kelompok" class="col-sm-3 col-form-label">Nama Kelompok</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control" type="text" name="nama_kelompok" value="<?= $anggota['nama_kelompok']; ?>" required>
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
                                    <input class="form-control form-control" type="date" name="tanggal_bayar" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for=jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control" type="text" name="jumlah" required>
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

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Bayar</button>
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