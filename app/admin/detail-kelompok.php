<?php $title = "Detail Kelompok"; ?>
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
        <div class="content-wrapper mt-4">

            <!-- Main content -->
            <section class="content" style="margin-top: 80px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="d-flex justify-content-center">
                                            <h3>Detail Anggota Kelompok</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">

                                    <div class="table-responsive">
                                        <table id=" " class="table-striped" style="font-size: 18px;">
                                            <thead>
                                                <tr>
                                                    <th width="2%">No</th>
                                                    <th>Nama Anggota</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $kelas = $_GET['id_kelompok'];
                                                $no = 0;
                                                $query = mysqli_query($koneksi, "SELECT * 
                                                                                            FROM users 
                                                                                            inner join kelompok 
                                                                                            ON users.id_kelompok = kelompok.id_kelompok
                                                                                            WHERE users.id_kelompok = kelompok.id_kelompok
                                                                                            AND users.id_kelompok = '$kelas'");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $no++
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td width='20%'><?= $data['nama_user']; ?></td>
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





            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <?php include('footer.php'); ?>