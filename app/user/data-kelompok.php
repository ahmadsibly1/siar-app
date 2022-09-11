<?php session_start();
$title = 'kelompok';
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
                                                        <h4>Kelompok Tersedia</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body ">
                                                <div class="table-responsive">
                                                    <table id=" example1" class="table table-md" style="font-size: 13px;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kelompok</th>
                                                                <th>Tanggal Mulai</th>
                                                                <th>Jenis</th>
                                                                <th>Kuota</th>
                                                                <th>Terisi</th>
                                                                <th>Jumlah Iuran</th>
                                                                <th width="17%">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 0;
                                                            $query = mysqli_query($koneksi, "SELECT * FROM kelompok");
                                                            while ($kelompok = mysqli_fetch_array($query)) {
                                                                $no++
                                                            ?>
                                                                <tr>
                                                                    <td width='4%'><?= $no; ?></td>
                                                                    <td width='13%'><b><?= $kelompok['nama_kelompok']; ?></b></td>
                                                                    <td width='13%'><?= date('d-m-Y', strtotime($kelompok['tanggal_mulai'])); ?></td>
                                                                    <td width='10%'><?= $kelompok['tipe_arisan']; ?></td>
                                                                    <td width='10%'><?= $kelompok['kuota']; ?></td>
                                                                    <td width='10%'><?= $kelompok['isi']; ?></td>
                                                                    <td width='13%'><?= rupiah($kelompok['jumlah_iuran']); ?></td>
                                                                    <td>
                                                                        <a type="button" class="btn btn-sm btn-info" href="detail-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>">
                                                                            <i class="bi bi-eye-fill"></i> Detail
                                                                        </a>

                                                                        <a href="gabung-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>" id="gabung" class=" btn btn-sm btn-success">
                                                                            <i class="bi bi-pen"></i> Gabung
                                                                        </a>
                                                                        <?php
                                                                        // $query2 = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$_SESSION[username]'");
                                                                        // $data2 = mysqli_fetch_array($query2);
                                                                        // if ($data2['id_kelompok'] == !0) {
                                                                        //     echo '
                                                                        //     <script>
                                                                        //     var parent = document.getElementById("gabung");
                                                                        //     parent.style.visibility = "hidden";
                                                                        //     </script>
                                                                        //     ';
                                                                        // }
                                                                        ?>
                                                                        <!-- modal target -->
                                                                        <div class="modal fade" id="detail-kelompok<?= $kelompok['id_kelompok']; ?>">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title">Detail Anggota Kelompok</h4>
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

                                                                                        <!-- Jam Countdown -->
                                                                                        <div style="padding-left:350px">
                                                                                            <br>

                                                                                            <div id="jam"></div>
                                                                                            <div id="unit">
                                                                                                <span>Jam</span>
                                                                                                <span>Menit</span>
                                                                                                <span>Detik</span>
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


                        <!-- kelompok yang diikuti -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- kelompok yang diikuti -->
                                        <?php

                                        $query = mysqli_query($koneksi, "SELECT * FROM users
                                        INNER JOIN kelompok
                                        ON users.id_kelompok = kelompok.id_kelompok
                                        WHERE username='$_SESSION[username]'
                                        ");
                                        // menghitung jumlah data yang ditemukan
                                        $cek = mysqli_num_rows($query);
                                        if (mysqli_num_rows($query) == 1) {
                                            $data = mysqli_fetch_assoc($query);

                                            if ($data['ikut'] == "Terima") {
                                                $message = '<div class="ikut text-white text-center p-2" style="background-color: #1a667e;">
                                                <h3>Anda sedang mengikuti kelompok ' . $data["nama_kelompok"] . '</h3>
                                                </div>';
                                                echo $message;
                                            } else {
                                                $message2 = '<div class="ikut text-white text-center p-2" style="background-color: #1a667e;">
                                                <h3>Anda tidak mengikuti kelompok manapun</h3>
                                                </div>';
                                                echo $message2;
                                            }
                                        } else {
                                            $message2 = '<div class="ikut text-white text-center p-2" style="background-color: #1a667e;">
                                            <h3>Anda tidak mengikuti kelompok manapun</h3>
                                            </div>';
                                            echo $message2;
                                        }

                                        // $anggota = mysqli_fetch_array($query);

                                        ?>

                                        <!-- /.card -->

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


    </div>
    <!-- /.modal-content -->






    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>