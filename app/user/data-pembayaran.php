<?php
$titleParent = 'Transaksi';
$title = "Pembayaran";
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




                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header justify-content-between bg-dark">
                                    <div class="card-title">
                                        <div class="d-flex">
                                            <h4 class="">Pembayaran</h4>
                                        </div>
                                    </div>
                                    <!-- <button type="button" class="btn mb-3 float-right" data-toggle="modal" data-target="#tambah-pembayaran" style="background-color: #1a667e; color:white;">
                                        Tambah Pembayaran
                                    </button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">

                                    <div class="table-responsive">
                                        <table id="pembayaran" class="table table-md">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <!-- <th width="10%">Bukti Pembayaran</th> -->
                                                    <!-- <th>Nama Pembayar</th> -->
                                                    <th>Nama Kelompok</th>
                                                    <!-- <th>Bank Tujuan</th> -->
                                                    <th>Tanggal Transfer</th>
                                                    <th>Jumlah</th>
                                                    <th>Bulan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                $id_user = $_GET['id_user'];
                                                // $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN users ON pembayaran.id_pembayaran = users.id_user");
                                                $query = mysqli_query($koneksi, "SELECT * FROM pembayaran
                                                    LEFT JOIN users 
                                                    ON pembayaran.id_user = users.id_user
                                                    LEFT JOIN kelompok 
                                                    ON pembayaran.id_kelompok = kelompok.id_kelompok
                                                    WHERE pembayaran.id_user = '$id_user'");
                                                while ($pembayaran = mysqli_fetch_array($query)) {
                                                    $no++
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <!-- <td><?= $pembayaran['nama_user']; ?></td> -->
                                                        <td><?= $pembayaran['nama_kelompok']; ?></td>
                                                        <!-- <td><?= $pembayaran['bank']; ?></td> -->
                                                        <td><?= $pembayaran['tgl_bayar']; ?></td>
                                                        <td><?= rupiah($pembayaran['jumlah']); ?></td>
                                                        <td>Ke - <?= $pembayaran['bulan']; ?></td>
                                                        <td>
                                                            <!-- <div id="status"><?= $pembayaran['status_pembayaran']; ?></div> -->
                                                            <?php
                                                            if ($pembayaran['status_pembayaran'] == 'Pending') {
                                                                echo '<span class="badge badge-warning p-2">Pending</span>';
                                                            } elseif ($pembayaran['status_pembayaran'] == 'Dikonfirmasi') {
                                                                echo '<span class="badge badge-success p-2">Diterima</span>';
                                                            }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $pembayaran['id_pembayaran']; ?>">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                            <a href="invoice-print.php?id_pembayaran=<?= $pembayaran['id_pembayaran']; ?>&id_user=<?= $pembayaran['id_user']; ?>" target="_blank">
                                                                <button type="button" class="btn btn-dark">
                                                                    <i class="fa-solid fa-print"></i>
                                                                </button>
                                                            </a>


                                                            <!-- <a href="invoice-print.php?id_pembayaran=<?= $pembayaran['id_pembayaran']; ?>" class="btn btn-dark">
                                                                <i class="fa-solid fa-print"></i>
                                                            </a> -->
                                                        </td>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop<?= $pembayaran['id_pembayaran']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail pembayaran</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-12 text-center">
                                                                                <a href="tambah/images/<?= $pembayaran['bukti_bayar']; ?>" target="_blank" rel="noopener noreferrer">
                                                                                    <img src="tambah/images/<?= $pembayaran['bukti_bayar']; ?>" alt="" width="200px">
                                                                                </a>
                                                                                <p>Bukti transfer</p>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">Nama Pembayar</h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                : <?= $pembayaran['nama_user']; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">Nama Kelompok</h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                : <?= $pembayaran['nama_kelompok']; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">Tanggal transfer</h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                : <?= $pembayaran['tgl_bayar']; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">Jumlah</h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                : <?= $pembayaran['jumlah']; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">Bulan</h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                : Ke - <?= $pembayaran['bulan']; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                </div>
                <!-- /.container-fluid -->
            </section>

        </div>



        <!-- tambah Pembyaran -->
        <div class="modal fade" id="tambah-pembayaran">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                        <!-- <input type="hidden" name="id_user" value="<?= $_SESSION['username'] ?>"> -->

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="exampleInputFile" class="col-sm-3 col-form-label">Foto Pembayaran</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="bukti_bayar" class="custom-file-input" id="exampleInputFile" required>
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <label for="tanggal_bayar" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control" type="date" name="tanggal_bayar">
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
                                <label for=bulan" class="col-sm-3 col-form-label">Bulan</label>
                                <div class="col-sm-9">
                                    <div class="input-grup">
                                        <select class="form-select form-control" aria-label="Default select example" id="bulan" name="bulan" placeholder="*" required>
                                            <option selected>...Pilih...</option>
                                            <?php
                                            $bulan = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                            $hasil = mysqli_fetch_array($bulan);
                                            ?>
                                            <option value="1">1 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="2">2 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="3">3 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="4">4 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="5">5 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="6">6 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="7">7 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="8">8 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="9">9 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="10">10 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="11">11 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                            <option value="12">12 | <?php if ($hasil['status_transaksi'] == 'Belum bayar') {
                                                                        echo 'Belum bayar';
                                                                    } else {
                                                                        echo 'Lunas';
                                                                    }; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="simpan" class="btn btn-primary float-right" <?php if ($data3['ikut'] == 'Belum' || $data3['ikut'] == 'Pending') {
                                                                                                        echo 'disabled';
                                                                                                    } ?>>Bayar</button>
                            <a href="." type="submit" class="btn btn-default">Cancel</a>
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