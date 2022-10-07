<?php $title = "Data Kelompok"; ?>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <div class="card-title">
                                        <h4>Antrian Kelompok</h4>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">

                                    <table id="myTable" class="table table-md table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Nama Kelompok</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Jumlah Iuran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $id_user = $_GET['id_user'];
                                            $no = 0;
                                            $query = mysqli_query($koneksi, "SELECT * FROM kelompok 
                                                            inner JOIN users 
                                                            ON kelompok.id_kelompok = users.id_kelompok 
                                                            ORDER BY users.id_user DESC");
                                            while ($kelompok = mysqli_fetch_array($query)) {
                                                $no++
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $kelompok['nama_user']; ?></td>
                                                    <td><?= $kelompok['nama_kelompok']; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($kelompok['tanggal_mulai'])); ?></td>
                                                    <td><?= rupiah($kelompok['jumlah_iuran']); ?></td>
                                                    <td>
                                                        <form action="simpan-antrian-kelompok.php" method="post">
                                                            <input type="hidden" name="id_user" value="<?php echo $kelompok['id_user']; ?>">
                                                            <input type="hidden" name="id_kelompok" value="<?php echo $kelompok['id_kelompok']; ?>">
                                                            <select class="form-control1" type="from-control" name="ikut">
                                                                <option value="<?php echo $kelompok['ikut']; ?>"><?php echo $kelompok['ikut']; ?></option>
                                                                <option value="Terima">Terima</option>
                                                                <option value="Tolak">Tolak</option>
                                                            </select>

                                                    </td>
                                                    <td>
                                                        <button type="submit" name="simpan" class="btn btn-info">Ubah</button>
                                                        <!-- <button type="submit" name="simpan" class="btn btn-info">Lihat</button> -->
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg<?= $kelompok['id_user']; ?>">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="modal-lg<?= $kelompok['id_user']; ?>">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Detail Data Anggota</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="text" value="<?= $kelompok['nama_user']; ?>" aria-label="readonly input example" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">No HP</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="text" value="<?= $kelompok['no_telp']; ?>" aria-label="readonly input example" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">NIK</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="text" value="<?= $kelompok['nik']; ?>" aria-label="readonly input example" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="text" value="<?= $kelompok['tempat_lahir']; ?>" aria-label="readonly input example" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="text" value="<?= date('d-m-Y', strtotime($kelompok['tanggal_lahir'])); ?>" aria-label="readonly input example" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="text" value="<?= $kelompok['jenis_kelamin']; ?>" aria-label="readonly input example" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Agama</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="text" value="<?= $kelompok['agama']; ?>" aria-label="readonly input example" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Tela menyetujui</label>
                                                                            <div class="col-sm-9">
                                                                                <li>Pembayaran arisan wajib lunas maksimal 2 hari sebelum waktu undian.</li>
                                                                                <li>Waktu undian dilakukan pada tanggal 1 setiap bulannya.</li>
                                                                                <li>Admin mendapat biaya administrasi sebesar 5% dari hasil undian.</li>
                                                                                <li>Bagi anggota yang sudah mendapatkan arisan wajib komitmen dengan pembayaran tagihannya.</li>
                                                                                <li>Data anggota arisan akan diberikan kepada RT 01 demi kenyamanan bersama.</li>
                                                                                <li>Jika anda bergabung maka anda patuh tehadap ketentuan yang telah dibuat</li>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </td>


                                                </tr>
                                                </form>
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



            <!-- tambah kelompok -->

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
                                    <label for=tipe_arisan" class="col-sm-2 col-form-label">Tipe Arisan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control" type="text" name="tipe_arisan" required>
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