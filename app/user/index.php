<?php $title = 'Dashboard';
include('header.php'); ?>
<?php include('../../conf/config.php'); ?>

<?php session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../../index.php");
}

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
                            <div class="dashborad-admin">
                                <h1 name="nama_user" class="m-1">Selamat Datang <?= $_SESSION['username']; ?>!</h1>
                                <p class="m-1">Di Sistem Informasi Arisan RT 01 RW 07 Kelurahan Lengkong wetan</p>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->


                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <div class="alert alert-warning">
                                Untuk melakukan pembayaran melalui <strong>Bank BRI</strong>, Silahkan salin nomor ini &nbsp;
                                <button type="button" class="btn btn-light">
                                    <span onclick="copyTeks()" id="dataCopy">
                                        <strong>098872277</strong>
                                    </span>
                                </button>
                                &nbsp; Atas nama Ahmad Fauzi
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="alert alert-warning">
                                Untuk melakukan pembayaran melalui <strong>Bank BCA</strong>, Silahkan salin nomor ini &nbsp;
                                <button type="button" class="btn btn-light">
                                    <span onclick="copyTeks()" id="dataCopy">
                                        <strong>56798872277</strong>

                                    </span>
                                </button>
                                &nbsp; Atas nama Ahmad Fauzi
                            </div>
                        </div>
                    </div>
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