<?php $title = "Data Penerima"; ?>

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
            <div class="modal-dialog">
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
                                    <select class="form-select-lg form-control" aria-label=".form-select-lg example" name="nama_user">
                                        <option selected>Pilih nama anggota yang akan dibayar</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE users.pemenang = '1' AND users.level = 'user'");
                                        while ($pembayaran = mysqli_fetch_array($query)) {
                                            $id_user = $pembayaran['id_user'];
                                        ?>
                                            <option value="<?= $pembayaran['nama_user']; ?>"><?= $pembayaran['nama_user']; ?></option>

                                    </select>
                                    <input class="form-control form-control" type="hidden" name="id_user" value="<?= $pembayaran['id_user']; ?>">
                                <?php } ?>
                                </div>
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