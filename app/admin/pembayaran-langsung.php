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
                                    <h4>Pembayaran langsung</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    $id_user = $_GET['id_user'];
                                    $query2 = mysqli_query($koneksi, "SELECT * FROM pembayaran
                                                                        RIGHT JOIN users 
                                                                        ON pembayaran.id_user = users.id_user
                                                                        RIGHT JOIN kelompok 
                                                                        ON pembayaran.id_kelompok = kelompok.id_kelompok 
                                                                        WHERE pembayaran.id_user = '$id_user'");
                                    $result = mysqli_num_rows($query2);
                                    $anggota = mysqli_fetch_array($query2);

                                    $query3 = mysqli_query($koneksi, "SELECT * FROM users 
                                                                        LEFT JOIN kelompok 
                                                                        ON users.id_kelompok = kelompok.id_kelompok WHERE users.id_user = '$id_user'");
                                    $data3 = mysqli_fetch_array($query3);

                                    ?>
                                    <!-- ganti hidden menjadi text -->
                                    <form action="tambah/pembayaran-langsung.php" method="POST" name="pembayaran" enctype="multipart/form-data">


                                        <div class="card-body">


                                            <div class="row mb-3">
                                                <label for=nama_pembayar" class="col-sm-3 col-form-label">Nama Pembayar</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control form-control" type="text" name="" value="<?= $data3['nama_user']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    <input class="form-control form-control" type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=nama_kelompok" class="col-sm-3 col-form-label">Nama Kelompok</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control form-control" type="text" name="" value="<?= $data3['nama_kelompok']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    <input class="form-control form-control" type="hidden" name="nama_kelompok" value="<?= $data3['id_kelompok']; ?>">
                                                    <input class="form-control form-control" type="hidden" name="id_pembayaran" value="<?= $anggota['id_pembayaran']; ?>">
                                                </div>
                                            </div>
                                            <!-- 
                                            <div class="row mb-3">
                                                <label for="tanggal_bayar" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control form-control" type="date" name="tanggal_bayar">
                                                </div>
                                            </div> -->
                                            <div class="row mb-3">
                                                <label for=jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control form-control" type="text" value="<?= rupiah($data3['jumlah_iuran']); ?>" name="jumlah" disabled>
                                                    <input class="form-control form-control" type="hidden" name="jumlah" value="<?= $data3['jumlah_iuran']; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="exampleInputFile" class="col-sm-3 col-form-label">Upload Struk</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="bukti_bayar" class="custom-file-input" id="exampleInputFile" placeholder="*" required>
                                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=bulan" class="col-sm-3 col-form-label">Bulan</label>
                                                <div class="col-sm-9">
                                                    <div class="input-grup">
                                                        <select class="form-select form-control" aria-label="Default select example" id="bulan" name="bulan" placeholder="*" required>
                                                            <option selected>...Pilih...</option>
                                                            <?php
                                                            $bulan = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                                            $hasil = mysqli_fetch_array($bulan);
                                                            ?>
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
                                            <button type="submit" name="simpan" class="btn btn-primary float-right">Bayar</button>
                                        </div>
                                    </form>
                                    <!-- /.card-body -->
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







    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>