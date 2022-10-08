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
                                <div class="card-header justify-content-between bg-dark">
                                    <div class="card-title">
                                        <div class=" d-flex">
                                            <h4 class="">Data Penerima</h4>
                                        </div>
                                    </div>
                                    <!-- <button type="button" class="btn btn-info mb-3 float-right" data-toggle="modal" data-target="#tambah-pembayaran">
                                        Tambah Penerima
                                    </button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="myTable" class="table table-responsive-md table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kelompok</th>
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




        <!-- 
        <div class="modal fade" id="tambah-pembayaran">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar Pemenang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- ganti hidden menjadi text -->
        <form action="" method="POST" name="pembayaran" enctype="multipart/form-data">
            <div class="modal-body">

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
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Bayar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <a href="." type="submit" class="btn btn-default">Cancel</a> -->
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>

    -->




    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>