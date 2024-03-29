<?php $title = "Gabung kelompok"; ?>
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
                                                        <h3>Data Kelompok</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body ">
                                                <!-- <button type="button" class="btn btn-info mb-3 " data-toggle="modal" data-target="#tambah-kelompok">
                                                    Tambah Kelompok
                                                </button> -->

                                                <?php
                                                $id_kelompok = $_GET['id_kelompok'];
                                                $query = mysqli_query($koneksi, "SELECT * FROM kelompok WHERE id_kelompok=$id_kelompok");
                                                $kelompok = mysqli_fetch_array($query);


                                                $query2 = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$_SESSION[username]'");
                                                $data2 = mysqli_fetch_array($query2);
                                                // die(var_dump($data2));
                                                ?>

                                                <form action="update/update-kelompok.php" method="POST">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <input type="hidden" class="form-control" name="id_kelompok" value="<?= $kelompok['id_kelompok']; ?>">
                                                            <input type="hidden" class="form-control" name="id_user" value="<?= $data2['id_user']; ?>">

                                                            <label for="nama_kelompok" class="col-sm-2 col-form-label">Nama kelompok</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" value="<?= $kelompok['nama_kelompok']; ?>" aria-label="Disabled input example" disabled readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control form-control" type="text" name="tanggal_mulai" value=" <?= $kelompok['tanggal_mulai']; ?>" aria-label="Disabled input example" disabled readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="kuota" class="col-sm-2 col-form-label">Kuota</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="kuota" name="kuota" value=" <?= $kelompok['kuota']; ?>" aria-label="Disabled input example" disabled readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="isi" name="isi" value=" <?= $kelompok['isi']; ?>" aria-label="Disabled input example" disabled readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="jumlah_iuran" class="col-sm-2 col-form-label">Jumlah Iuran</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="jumlah_iuran" name="jumlah_iuran" value=" <?= $kelompok['jumlah_iuran']; ?>" aria-label="Disabled input example" disabled readonly>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <label for="jumlah_iuran" class="col-sm-2 col-form-label text-danger">Penting!</label>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="jumlah_iuran" class="col-sm-2 col-form-label">Ketentuan</label>
                                                            <div class="col-sm-10">
                                                                <li>Pembayaran arisan wajib lunas maksimal 2 hari sebelum waktu undian.</li>
                                                                <li>Waktu undian dilakukan pada tanggal 1 setiap bulannya.</li>
                                                                <li>Admin mendapat biaya administrasi sebesar 5% dari hasil undian.</li>
                                                                <li>Bagi anggota yang sudah mendapatkan arisan wajib komitmen dengan pembayaran tagihannya.</li>
                                                                <li>Data anggota arisan akan diberikan kepada RT 01 demi kenyamanan bersama.</li>
                                                                <li>Jika anda bergabung maka anda patuh tehadap ketentuan yang telah dibuat</li>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" onclick="isChecked()">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Setuju
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer">
                                                        <button type="submit" name="simpan" class="btn btn-primary float-right" id="gabung" disabled>Gabung</button>
                                                        <a href="data-kelompok.php" type="submit" class="btn btn-default">Cancel</a>
                                                    </div>
                                                    <script>
                                                        function isChecked() {
                                                            var checkBox = document.getElementById("flexCheckDefault");
                                                            var text = document.getElementById("gabung");
                                                            if (checkBox.checked == true) {
                                                                text.disabled = false;
                                                            } else {
                                                                text.disabled = true;
                                                            }
                                                        }
                                                    </script>
                                                </form>
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
        <!-- /.card-body -->
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div> -->


    <!-- edit kelompok -->
    <div class="modal fade" id="edit-kelompok">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tambah Kelompok</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="row mb-3">
                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="id">
                            <label for="nama_kelompok" class="col-sm-2 col-form-label">Nama kelompok</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control" type="date" name="tanggal_mulai" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kuota" class="col-sm-2 col-form-label">Kuota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kuota" name="kuota" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="isi" name="isi" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jumlah_iuran" class="col-sm-2 col-form-label">Jumlah Iuran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jumlah_iuran" name="jumlah_iuran" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Buat</button>
                        <a href="data-kelompok.php" type="submit" class="btn btn-default float-right">Cancel</a>
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