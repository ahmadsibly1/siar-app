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
                                                        <h3>Form Edit Biodata</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM users  WHERE username='$_SESSION[username]'");
                                            $anggota = mysqli_fetch_array($query);
                                            ?>
                                            <form action="update/update-biodata.php" method="POST" enctype="multipart/form-data">
                                                <div class="card-body ">

                                                    <div class=" row mb-3">
                                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="hidden" name="id_user" value="<?= $anggota['id_user']; ?>">
                                                            <input class="form-control" type="text" name="nama" value="<?= $anggota['nama_user']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="username" value="<?= $anggota['username']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="password" value="<?= $anggota['password']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="notelephone" class="col-sm-2 col-form-label">No HP</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="notelephone" value="<?= $anggota['no_telp']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="nik" value="<?= $anggota['nik']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="tempatlahir" value="<?= $anggota['tempat_lahir']; ?>">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row mb-3">
                                                        <label for="tangallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="date" name="tanggallahir" value="<?= date('d-m-Y', strtotime($anggota['tanggal_lahir'])); ?>" required>
                                                        </div>
                                                    </div> -->
                                                    <div class="row mb-3">
                                                        <label for="jeniskelamin" class="col-sm-2 col-form-label">Alamat</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?= $anggota['alamat']; ?></textarea>
                                                            <!-- <input class="form-control" type="text" value="<?= $anggota['alamat']; ?>" aria-label="Disabled input example" disabled readonly> -->
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="jeniskelamin" value="<?= $anggota['jenis_kelamin']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="agama" value="<?= $anggota['agama']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="nama_bank" class="col-sm-2 col-form-label">Nama Bank</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="nama_bank" value="<?= $anggota['nama_bank']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="no_rekening" class="col-sm-2 col-form-label">Nomor Rekening</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="no_rekening" value="<?= $anggota['no_rekening']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- <div class="row mb-3">
                                                        <label for="exampleInputFile" class="col-sm-2 col-form-label"> upload KTP</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="ktp" class="custom-file-input" name="ktp" value="<?= $anggota['ktp']; ?>" id=" exampleInputFile" placeholder="*" required>
                                                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <button class="btn btn-primary float-right" type="submit">
                                                        Simpan
                                                    </button>
                                                    <a href="biodata.php">
                                                        <button class="btn btn-default">Kembali</button>
                                                    </a>
                                                </div>
                                                <!-- /.card-body -->
                                            </form>

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