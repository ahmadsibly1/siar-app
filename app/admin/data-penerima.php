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
                                        <h4>Data Penerima Arisan</h4>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">


                                    <table id="myTable" class="table table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Nama Kelompok</th>
                                                <th>Total</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Pembayaran</th>
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
                                                    <td><?= rupiah($data['jumlah_iuran'] - ($data['jumlah_iuran'] * 5 / 100)); ?></td>
                                                    <td>Pemenang <span class="badge badge-warning">bulan ke - <?= $data['pemenang_bulan']; ?></span></td>
                                                    <td>
                                                        <?php
                                                        if ($data['status_penerima'] == "Belum bayar") {
                                                            echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                                                        } else {
                                                            echo "<span class='badge badge-success'>Sudah Dibayar</span>";
                                                        }
                                                        ?>
                                                    <td>
                                                        <!-- Button untuk modal -->
                                                        <a href="#" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_user']; ?>">
                                                            <i class="fa-solid fa-hand-holding-dollar"></i> Langsung
                                                        </a>
                                                        <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal1<?php echo $data['id_user']; ?>">
                                                            <i class="fa-solid fa-money-bill-transfer"></i> Transfer
                                                        </a>

                                                        <!-- PEMBAYARAN LANGSUNG -->
                                                        <form action="tambah/tambah-penerima.php" method="post" enctype="multipart/form-data">
                                                            <div class="modal fade" id="myModal<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form pembayaran langsung</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
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
                                                                                <label for="bank_tujuan" class="col-sm-3 col-form-label">Metode pembayaran</label>
                                                                                <div class="col-sm-9">
                                                                                    <div class="input-grup">
                                                                                        <input class="form-control form-control" type="text" name="" value="COD / pembayaran langsung" aria-label="Disabled input example" disabled readonly>
                                                                                        <!-- <input class="form-control form-control" type="" name="metode" value="cod" aria-label="Disabled input example" disabled readonly> -->
                                                                                        <!-- <select class="form-select form-control" aria-label="Default select example" id="bank_tujuan" name="bank_tujuan" placeholder="*" required>
                                                                                            <option selected>...Pilih...</option>
                                                                                            <option value="BRI">COD</option>
                                                                                            <option value="BRI">BRI</option>
                                                                                            <option value="BCA">BCA</option>
                                                                                        </select> -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for=nama_penerima" class="col-sm-3 col-form-label">Nama Penerima</label>
                                                                                <div class="col-sm-9">
                                                                                    <input class="form-control form-control" type="text" name="" value="<?= $data['nama_user']; ?>" aria-label="Disabled input example" disabled readonly>
                                                                                    <input class="form-control form-control" type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
                                                                                    <input class="form-control form-control" type="hidden" name="id_penerima" value="<?= $data['id_penerima']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for=nama_kelompok" class="col-sm-3 col-form-label">Nama Kelompok</label>
                                                                                <div class="col-sm-9">
                                                                                    <input class="form-control form-control" type="text" name="" value="<?= $data['nama_kelompok']; ?>" aria-label="Disabled input example" disabled readonly>
                                                                                    <input class="form-control form-control" type="hidden" name="nama_kelompok" value="<?= $data['id_kelompok']; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <!-- <div class="row mb-3">
                                                                                <label for="tanggal_bayar" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                                                                                <div class="col-sm-9">
                                                                                    <input class="form-control form-control" type="date" name="tanggal_bayar">
                                                                                </div>
                                                                            </div> -->
                                                                            <div class="row mb-3">
                                                                                <label for=jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                                                                <div class="col-sm-9">
                                                                                    <input class="form-control form-control" type="text" value="<?= rupiah($data['jumlah_iuran'] - ($data['jumlah_iuran'] * 5 / 100)); ?>" name="jumlah" disabled>
                                                                                    <input class="form-control form-control" type="hidden" name="jumlah" value="<?= $data['jumlah_iuran'] - ($data['jumlah_iuran'] * 5 / 100); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <!-- Pembayaran Transfer -->
                                                        <div class="modal fade" id="myModal1<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form pembayaran transfer</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row mb-3 px-5">
                                                                            <label for="exampleInputFile" class="col-sm-3 col-form-label">Upload struk</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" name="bukti_bayar" class="custom-file-input" id="exampleInputFile" placeholder="*" required>
                                                                                        <label class="custom-file-label" for="exampleInputFile"></label>

                                                                                    </div>
                                                                                </div>
                                                                                <!-- <div class="form-text">bukti telah memberika hasil undian ke angota</div> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 px-5">
                                                                            <label for=nama_pembayar" class="col-sm-3 col-form-label">Nama Penerima</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control form-control" type="text" name="" value="<?= $data['nama_user']; ?>" aria-label="Disabled input example" disabled readonly>
                                                                                <input class="form-control form-control" type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 px-5">
                                                                            <label for=nama_kelompok" class="col-sm-3 col-form-label">Nama Kelompok</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control form-control" type="text" name="" value="<?= $data['nama_kelompok']; ?>" aria-label="Disabled input example" disabled readonly>
                                                                                <input class="form-control form-control" type="hidden" name="nama_kelompok" value="<?= $data['id_kelompok']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 px-5">
                                                                            <label for="bank_tujuan" class="col-sm-3 col-form-label">Bank Tujuan</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-grup">
                                                                                    <select class="form-select form-control" aria-label="Default select example" id="bank_tujuan" name="bank_tujuan" placeholder="*" required>
                                                                                        <option selected>...Pilih...</option>
                                                                                        <option value="BRI">BRI</option>
                                                                                        <option value="BCA">BCA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 px-5">
                                                                            <label for="bank_tujuan" class="col-sm-3 col-form-label">Bank Tujuan</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-grup">
                                                                                    <input class="form-control form-control" type="text" name="" value="<?= $data['nama_kelompok']; ?>" aria-label="Disabled input example" disabled readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 px-5">
                                                                            <label for="tanggal_bayar" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control form-control" type="date" name="tanggal_bayar">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 px-5">
                                                                            <label for=jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control form-control" type="text" value="<?= rupiah($data['jumlah_iuran'] - ($data['jumlah_iuran'] * 5 / 100)); ?>" name="jumlah" disabled>
                                                                                <input class="form-control form-control" type="hidden" name="jumlah" value="<?= $data['jumlah_iuran'] - ($data['jumlah_iuran'] * 5 / 100); ?>">
                                                                                <div class="form-text">Setelah dipotong 5%</div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

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