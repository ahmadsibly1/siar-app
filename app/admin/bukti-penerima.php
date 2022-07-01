<?php $title = "Pembayaran"; ?>

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
                                    <h3 class="card-title">Bukti Penerima</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="penerima" class="table table-striped style=" style="font-size: 13px;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Terima</th>
                                                <th>Jumlah Terima</th>

                                                <th colspan="2">Status</th>
                                                <th>Aksi</th>
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
                                                    <!-- <td width='5%'>
                                                        <a href="../user/tambah/images/<? $penerima['bukti_bayar']; ?>">
                                                            <img src="../user/tambah/images/<?= $penerima['bukti_bayar']; ?>" alt="" width="60px">
                                                        </a>
                                                    </td> -->
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
                                                        <form action="simpan-penerima.php" method="post">
                                                            <input type="hidden" name="id_penerima" value="<?php echo $penerima['id_penerima']; ?>">
                                                            <select class="form-control1" type="from-control" name="status_penerima">
                                                                <option value="<?= $penerima['status_penerima']; ?>"><?= $penerima['status_penerima']; ?> </option>
                                                                <option value="Dikonfirmasi">Dikonfirmasi</option>
                                                                <!-- <option value="Delumdikonfirmasi">Belum dikonfirmasi</option> -->
                                                            </select>

                                                    </td>
                                                    <td><button type="submit" name="simpan" class="btn btn-info">Ubah</button></td>
                                                    </form>
                                                    <td>
                                                        <a href="hapus/hapus-penerima.php?id=<?= $penerima['id_penerima']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="bi bi-trash"></i></a>
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