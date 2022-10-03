<?php
$titleParent = 'Transaksi';
$title = "Penerima";
?>
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

            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header justify-content-between bg-dark">
                                    <div class="card-title">
                                        <div class=" d-flex">
                                            <h4 class="">Data Penerima</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="pembayaran" class="table table-md">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto pembayaran</th>
                                                    <th>Tanggal Terima</th>
                                                    <th>Jumlah Terima</th>
                                                    <th colspan="2">Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                $id_user = $_GET['id_user'];
                                                // die(var_dump($id_user));
                                                $query = mysqli_query($koneksi, "SELECT * FROM penerima
                                                            LEFT JOIN users 
                                                            ON penerima.id_user = users.id_user
                                                            LEFT JOIN kelompok 
                                                            ON penerima.id_kelompok = kelompok.id_kelompok
                                                            WHERE penerima.id_user = '$id_user'");
                                                while ($penerima = mysqli_fetch_array($query)) {
                                                    $no++
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td width='20%'>
                                                            <a href="../user/tambah/images/<? $penerima['bukti_terima']; ?>">
                                                                <img src="../user/tambah/images/<?= $penerima['bukti_terima']; ?>" alt="" width="60px">
                                                            </a>
                                                        </td>
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


        <script>
            $(document).ready(function() {
                $('#pembayaran').DataTable();
            });
        </script>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>