<?php session_start();

// $id_user = $_GET['id_user'];

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
                                                        <h3>Data Kelompok</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body ">
                                                <!-- <button type="button" class="btn btn-info mb-3 " data-toggle="modal" data-target="#tambah-kelompok">
                                                    Tambah Kelompok
                                                </button> -->
                                                <div class="table-responsive">
                                                    <table id=" example1" class="table table-sm table-bordered table-striped" style="font-size: 13px;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kelompok</th>
                                                                <th>Tanggal Mulai</th>
                                                                <th>Jenis</th>
                                                                <th>Kuota</th>
                                                                <th>Terisi</th>
                                                                <th>Jumlah Iuran</th>
                                                                <th width="17%">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 0;
                                                            $query = mysqli_query($koneksi, "SELECT * FROM kelompok LEFT JOIN users ON kelompok.id_user = users.id_user");
                                                            while ($kelompok = mysqli_fetch_array($query)) {
                                                                $no++
                                                            ?>
                                                                <tr>
                                                                    <td width='4%'><?= $no; ?></td>
                                                                    <td width='13%'><?= $kelompok['nama_kelompok']; ?></td>
                                                                    <td width='13%'><?= date('d-m-Y', strtotime($kelompok['tanggal_mulai'])); ?></td>
                                                                    <td width='10%'><?= $kelompok['tipe_arisan']; ?></td>
                                                                    <td width='10%'><?= $kelompok['kuota']; ?></td>
                                                                    <td width='10%'><?= $kelompok['isi']; ?></td>
                                                                    <td width='13%'><?= rupiah($kelompok['jumlah_iuran']); ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail-kelompok<?= $kelompok['id_kelompok']; ?>">
                                                                            <i class="bi bi-eye-fill"></i> Detail
                                                                        </button>
                                                                        <a href="gabung-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>"" class=" btn btn-sm btn-success">
                                                                            <i class="bi bi-pen"></i> Gabung
                                                                        </a>
                                                                        <!-- modal target -->
                                                                        <div class="modal fade" id="detail-kelompok<?= $kelompok['id_kelompok']; ?>">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title">Detail Anggota Kelompok</h4>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="mb-3 row">
                                                                                            <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input class="form-control" type="text" value="<?= $kelompok['nama_user']; ?>" aria-label="readonly input example" readonly>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Jam Countdown -->
                                                                                        <div style="padding-left:350px">
                                                                                            <br>

                                                                                            <div id="jam"></div>
                                                                                            <div id="unit">
                                                                                                <span>Jam</span>
                                                                                                <span>Menit</span>
                                                                                                <span>Detik</span>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="modal-footer justify-content-between">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
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
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



        <!-- modal tambah kelompok -->
        <!-- <div class="modal fade" id="tambah-kelompok">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Tambah Kelompok</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="tambah/tambah-kelompok.php" method="POST">
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
    </div> -->


    <!-- edit kelompok -->
    <div class="modal fade" id="edit-kelompok">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tambah Kelompok</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
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