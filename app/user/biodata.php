<?php session_start();

// $id_user = $_GET['id_user'];

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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <div class="container-fluid">
                <div class="row mb-2 mt-3">
                    <div class="col-sm-12">
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- /.card -->
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <div class="d-flex justify-content-center">
                                                        <h3>Biodata</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM users  WHERE username='$_SESSION[username]'");
                                            $anggota = mysqli_fetch_array($query);
                                            ?>
                                            <div class="card-body ">

                                                <div class="row mb-3">
                                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['nama_user']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['username']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['password']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="notelephone" class="col-sm-2 col-form-label">No HP</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['no_telp']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['nik']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['tempat_lahir']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tangallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= date('d-m-Y', strtotime($anggota['tanggal_lahir'])); ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for=alamat_user" class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['alamat_user']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['jenis_kelamin']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="<?= $anggota['agama']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="exampleInputFile" class="col-sm-2 col-form-label">KTP</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <a href="../../conf/img/<?= $anggota['ktp']; ?>">
                                                                    <img src="../../conf/img/<?= $anggota['ktp']; ?>" alt="" width="70px">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <a href="edit-biodata.php">
                                                    <button class="btn btn-primary float-right" type="submit">
                                                        Edit
                                                    </button>
                                                </a>

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
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>




        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>