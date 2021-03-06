<?php $title = "Data Kelompok"; ?>
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
        <div class="content-wrapper mt-4">

            <!-- Main content -->
            <section class="content" style="margin-top: 80px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Antrian Kelompok</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">

                                    <table id="saldo" class="table table-sm table-striped table-bordered" style="font-size: 13px;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Nama Kelompok</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Jumlah Iuran</th>
                                                <th colspan="2">Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $id_user = $_GET['id_user'];
                                            $no = 0;
                                            $query = mysqli_query($koneksi, "SELECT * FROM kelompok 
                                                            inner JOIN users 
                                                            ON kelompok.id_kelompok = users.id_kelompok 
                                                            ");
                                            while ($kelompok = mysqli_fetch_array($query)) {
                                                $no++
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td width='20%'><?= $kelompok['nama_user']; ?></td>
                                                    <td><?= $kelompok['nama_kelompok']; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($kelompok['tanggal_mulai'])); ?></td>
                                                    <td><?= rupiah($kelompok['jumlah_iuran']); ?></td>
                                                    <td>
                                                        <form action="simpan-antrian-kelompok.php" method="post">
                                                            <input type="hidden" name="id_user" value="<?php echo $kelompok['id_user']; ?>">
                                                            <select class="form-control1" type="from-control" name="ikut">
                                                                <option value="<?php echo $kelompok['ikut']; ?>"><?php echo $kelompok['ikut']; ?></option>
                                                                <option value="Terima">Terima</option>
                                                                <option value="Tolak">Tolak</option>
                                                            </select>

                                                    </td>
                                                    <td><button type="submit" name="simpan" class="btn btn-info">Ubah</button></td>
                                                    <td><button type="submit" name="simpan" class="btn btn-info">Lihat</button></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
            <!-- /.content -->
        </div>



        <!-- tambah kelompok -->

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