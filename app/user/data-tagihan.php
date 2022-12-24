<?php
$titleParent = 'Transaksi';
$title = "Tagihan";
?>
<?php session_start(); ?>
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


            <!-- Main content -->
            <section class="content-header">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <!-- card tagihan -->
                            <!-- <div class="card">
                                <div class="card-header">
                                    <h5>Tagihan</h5>
                                </div>
                                <?php
                                // $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                // $bulan = mysqli_fetch_array($query);
                                ?>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <table id="myTabale" class="table table-md">
                                                <thead>
                                                    <tr>
                                                        <th>Jumlah yang harus dibayar</th>
                                                        <th>Tanggal Jatuh tempo</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Tanggal</td>
                                                        <td>Tanggal</td>
                                                        <td><button class="btn btn-dark" type="submit">Bayar tagihan</button></td>
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div> -->
                            <div class="card card-dark card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                                                <h4>Tagihan saya</h4>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">
                                                <h4>Riwayat tagihan</h4>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                            <div class="invoice p-3 mb-3">
                                                <!-- Table row -->
                                                <div class="row">
                                                    <p class="">
                                                        Pembayaran melalui <strong>Bank BRI</strong>, salin nomor ini &nbsp;
                                                        <button type="button" class="btn btn-sm btn-light">
                                                            <span onclick="copyTeks()" id="dataCopy">
                                                                <strong>098872277</strong>
                                                            </span>
                                                        </button>
                                                        &nbsp; Atas nama Novi novalia
                                                    </p>
                                                    <p class="">
                                                        Pembayaran melalui <strong>Bank BCA</strong>, salin nomor ini &nbsp;
                                                        <button type="button" class="btn btn-sm btn-light">
                                                            <span onclick="copyTeks()" id="dataCopy">
                                                                <strong>56798872277</strong>

                                                            </span>
                                                        </button>
                                                        &nbsp; Atas nama Novi novalia
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table id="tagihan" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <!-- <th>No tagihan</th> -->
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
                                                                $query = mysqli_query($koneksi, "SELECT * FROM transaksi
                                                                                                LEFT JOIN users ON transaksi.id_user = users.id_user 
                                                                                                INNER JOIN kelompok ON transaksi.id_kelompok = kelompok.id_kelompok 
                                                                                                WHERE status_transaksi = 'Belum bayar'
                                                                                                AND users.username = '$_SESSION[username]'");
                                                                while ($data = mysqli_fetch_array($query)) {
                                                                    $no++
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <!-- <td>TGH<?= $data['id_transaksi']; ?></td> -->
                                                                        <td><?= $data['nama_user']; ?></td>
                                                                        <td><?= $data['nama_kelompok']; ?></td>
                                                                        <td>Tagihan arisan <span class="badge badge-warning">bulan ke - <?= $data['bulan']; ?></span></td>
                                                                        <td><?= rupiah($data['jumlah_iuran']); ?></td>
                                                                        <td><button type="button" class="btn btn-success float-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                                <i class="far fa-credit-card"></i> Bayar tagihan
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- this row will not appear when printing -->
                                                <div class="row no-print">
                                                    <div class="col-12">
                                                        <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">Pilih metode pembayaran</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <button type="button" class="btn btn-dark btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                                                    <i class="fas fa-solid fa-money-check-dollar mr-3"></i> Transfer bank
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <?php
                                                                                $nama = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$_SESSION[username]'");
                                                                                $data = mysqli_fetch_array($nama);
                                                                                ?>
                                                                                <a class="btn btn-success btn-block" href="https://api.whatsapp.com/send?phone=6289505347307&text=Halo Admin! saya <?= $data['nama_user']; ?> ingin melakukan pembayaran secara langsung" target="_blank">

                                                                                    <i class="fas fa-solid fa-money-check-dollar mr-3"></i> Pembayaran langsung

                                                                                </a>

                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>

                                                                        <?php
                                                                        if (isset($_POST['metode'])) {
                                                                            if ($_POST['metode'] == 1) {
                                                                                echo "<script>document.getElementById('target').style.data-bs-target = '#staticBackdrop2';</script>";
                                                                            } else {
                                                                                echo "<script>document.getElementById('target').style.data-bs-target = '#staticBackdrop3';</script>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- modal2 atau pembayaran Transfer -->
                                                        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">Pembayaran Transfer</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
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
                                                                        <form action="tambah/tambah-pembayaran.php" method="POST" name="pembayaran" enctype="multipart/form-data">

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
                                                                                    </div>
                                                                                </div>
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

                                                                            </div>
                                                                            <!-- /.card-body -->
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="simpan" class="btn btn-primary float-right">Bayar</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- modal3 atau pembayaran Langsung -->
                                                        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Understood</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <!-- Riwayat tagihan -->
                                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                    <table id="myTable" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Kelompok</th>
                                                                <th>Deskripsi</th>
                                                                <th>Total</th>
                                                                <th>Tanggal pembayaran</th>
                                                                <!-- <th>Aksi</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 0;
                                                            $query = mysqli_query($koneksi, "SELECT * FROM transaksi
                                                                                                LEFT JOIN users ON transaksi.id_user = users.id_user 
                                                                                                INNER JOIN kelompok ON transaksi.id_kelompok = kelompok.id_kelompok 
                                                                                                WHERE status_transaksi = 'Lunas'
                                                                                                AND users.username = '$_SESSION[username]'");
                                                            while ($data = mysqli_fetch_array($query)) {
                                                                $no++
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><?= $data['nama_user']; ?></td>
                                                                    <td><?= $data['nama_kelompok']; ?></td>
                                                                    <td>Tagihan arisan <span class="badge badge-warning">bulan ke - <?= $data['bulan']; ?></span></td>
                                                                    <td><?= rupiah($data['jumlah_iuran']); ?></td>
                                                                    <td><?= $data['waktu']; ?></td>
                                                                    <!-- <td><button type="button" class="btn btn-success float-right" data-bs-toggle="modal" data-bs-target="#detailtagihan">
                                                                            <i class="far fa-eye"></i> Detail
                                                                        </button>
                                                                        
                                                                        <div class="modal fade" id="detailtagihan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                                    </td> -->
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>


                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>

    </div>





    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>