<?php
$title = "Data transaksi";
$title2 = "Data pembayaran";
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
                                    <h4>Bukti Pembayaran</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Nama Pembayar</th>
                                                <th>Nama Kelompok</th>
                                                <th>Bank Tujuan</th>
                                                <th>Tanggal Transfer</th>
                                                <th>Jumlah</th>
                                                <th>Bulan</th>
                                                <th colspan="2">Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            // $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN users ON pembayaran.id_pembayaran = users.id_user");
                                            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran
                                                            INNER JOIN users 
                                                            ON pembayaran.id_user = users.id_user
                                                            INNER JOIN kelompok 
                                                            ON pembayaran.id_kelompok = kelompok.id_kelompok
                                                            -- LEFT JOIN transaksi
                                                            -- ON pembayaran.id_pembayaran = transaksi.id_pembayaran
                                                            ORDER BY pembayaran.id_pembayaran DESC");
                                            while ($pembayaran = mysqli_fetch_array($query)) {
                                                $no++
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td width='5%'>
                                                        <a href="../user/tambah/images/<?= $pembayaran['bukti_bayar']; ?>" target="_blank" rel="noopener noreferrer">
                                                            <img src="../user/tambah/images/<?= $pembayaran['bukti_bayar']; ?>" alt="" width="60px">
                                                        </a>
                                                    </td>
                                                    <td><?= $pembayaran['nama_user']; ?></td>
                                                    <td><?= $pembayaran['nama_kelompok']; ?></td>
                                                    <td><?= $pembayaran['bank']; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($pembayaran['tgl_bayar'])); ?></td>
                                                    <td><?= rupiah($pembayaran['jumlah']); ?></td>
                                                    <td><?= $pembayaran['bulan']; ?></td>
                                                    <td>
                                                        <form action="simpan-pembayaran.php" method="post">
                                                            <input type="hidden" name="id_pembayaran" value="<?php echo $pembayaran['id_pembayaran']; ?>">
                                                            <input type="hidden" name="bulan" value="<?php echo $pembayaran['bulan']; ?>">
                                                            <input type="hidden" name="id_user" value="<?php echo $pembayaran['id_user']; ?>">
                                                            <input type="hidden" name="id_kelompok" value="<?php echo $pembayaran['id_kelompok']; ?>">
                                                            <select class="form-control1" type="from-control" name="status_pembayaran">
                                                                <option value="<?= $pembayaran['status_pembayaran']; ?>"><?= $pembayaran['status_pembayaran']; ?> </option>
                                                                <option value="Dikonfirmasi">Dikonfirmasi</option>
                                                                <!-- <option value="Delumdikonfirmasi">Belum dikonfirmasi</option> -->
                                                            </select>

                                                    </td>
                                                    <td>
                                                        <button type="submit" name="simpan" class="btn btn-info">Ubah</button>
                                                    </td>
                                                    </form>
                                                    <td>


                                                        <a href="hapus/hapus-pembayaran.php?id=<?= $pembayaran['id_pembayaran']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="bi bi-trash"></i></a>
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







        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>