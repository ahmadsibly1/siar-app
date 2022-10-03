<?php $title = 'Dashboard';
include('header.php'); ?>
<?php include('../../conf/config.php'); ?>

<?php session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../../index.php");
}

$query = mysqli_query($koneksi, "SELECT * FROM users  WHERE username='$_SESSION[username]'");
$data = mysqli_fetch_array($query);
?>


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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="alert alert-dark">
                                <h1 name="nama_user" class="m-1">Selamat Datang <?= $data['nama_user']; ?>!</h1>
                                <h5 class="m-1">Di Sistem Informasi Arisan RT 01 RW 07 Kelurahan Lengkong wetan</h5>
                                <hr>
                                <p class="m-1 mb-4">
                                    Untuk melakukan pembayaran melalui <strong>Bank BRI</strong>, Silahkan salin nomor ini &nbsp;
                                    <button type="button" class="btn btn-sm btn-light">
                                        <span onclick="copyTeks()" id="dataCopy">
                                            <strong>098872277</strong>
                                        </span>
                                    </button>
                                    &nbsp; Atas nama Ahmad Fauzi
                                </p>
                                <p class="m-1">
                                    Untuk melakukan pembayaran melalui <strong>Bank BCA</strong>, Silahkan salin nomor ini &nbsp;
                                    <button type="button" class="btn btn-sm btn-light">
                                        <span onclick="copyTeks()" id="dataCopy">
                                            <strong>56798872277</strong>

                                        </span>
                                    </button>
                                    &nbsp; Atas nama Ahmad Fauzi
                                </p>

                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->


                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN users ON transaksi.id_user = users.id_user WHERE status_transaksi = 'Belum bayar' AND transaksi.pesan = 1 AND users.username = '$_SESSION[username]'");
                    while ($data = mysqli_fetch_array($query)) {
                        # code...
                    ?>
                        <div class="row mb-1">
                            <div class="col-sm-12">

                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Hallo <strong><?= $data['nama_user']; ?></strong>! Anda mempunyai tagihan pada bulan ke <?= $data['bulan']; ?>, segera lakukan pembayaran sebelum jatuh tempo.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>
                            </div><!-- /.col -->
                        </div>
                    <?php  } ?>


                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

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