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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header justify-content-between bg-dark">
                                    <div class="card-title">
                                        <h4>Kelompok Aktif</h4>
                                    </div>
                                    <button type="button" class="btn btn-info float-lg-right" data-toggle="modal" data-target="#tambah-kelompok">
                                        Tambah Kelompok
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">


                                    <table id="myTable" class="table table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Nama Kelompok</th>
                                                <th>Deskripsi</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi, "SELECT * FROM penerima 
                                                                            JOIN users 
                                                                            ON penerima.id_user = users.id_user 
                                                                            JOIN kelompok 
                                                                            ON penerima.id_kelompok = kelompok.id_kelompok
                                                                            
                                                                            ");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $no++
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $data['nama_user']; ?></td>
                                                    <td><?= $data['nama_kelompok']; ?></td>
                                                    <td>Pemenang <span class="badge badge-warning">bulan ke - <?= $data['pemenang_bulan']; ?></span></td>
                                                    <td><?= rupiah($data['jumlah_iuran'] - ($data['jumlah_iuran'] * 5 / 100)); ?></td>
                                                    <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                            <i class="far fa-credit-card"></i> Bayar tagihan
                                                        </button>
                                                    </td>
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









            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <?php include('footer.php'); ?>