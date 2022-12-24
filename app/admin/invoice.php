<?php
$title = 'Data Laporan';
include('header.php');
include('../../conf/config.php');
date_default_timezone_set("Asia/Jakarta");
?>



<body>

    <div class="wrapper">
        <!-- Main content -->

        <div class="container mt-4">
            <div class="d-flex justify-content-center">
                <div class="row text-center">
                    <div class="col-lg-12">

                        <span>
                            <img src="../dist/img/logo-siar.png" alt="" width="50">
                        </span>
                        <!-- <h5 class="float-right"><?= $data['waktu']; ?></h5> -->
                        <h2>Sistem Informasi Arisan RT 07</h2>
                        <p>Data Laporan Kelompok</p>
                        <p><?= date("d-m-Y, H:i:s"); ?></p>




                    </div>

                </div>

            </div>




            <!-- /.content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card   rounded">
                        <?php
                        $no = 0;
                        $id_kelompok = $_GET['id_kelompok'];
                        $query2 = mysqli_query($koneksi, "SELECT * FROM users
                                INNER JOIN kelompok ON users.id_kelompok = kelompok.id_kelompok
                                WHERE users.id_kelompok > 0 
                                AND users.id_kelompok = '$id_kelompok' 
                                ORDER BY users.id_user DESC");
                        $data = mysqli_fetch_array($query2);
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <h4 class="mb-2">Invoice #215462</h4> -->
                                    <h5 class="mb-3">Data Laporan <?= $data['nama_kelompok']; ?></h5>
                                    <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p> -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-4">
                                    <div class="table-responsive-lg">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama anggota</th>
                                                    <th>Status pemenang</th>
                                                    <th>Pemenang bulan</th>
                                                    <th>Alamat</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                while ($laporan = mysqli_fetch_array($query2)) {
                                                    $no++
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $laporan['nama_user']; ?></td>
                                                        <td><?= $laporan['status_menang']; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($laporan['pemenang_bulan'] == 0) {
                                                                echo '<span class="badge badge-warning p-2">Belum menang</span>';
                                                            } else {
                                                                echo 'Ke - ' . $laporan['pemenang_bulan'];
                                                            }
                                                            ?>

                                                        </td>
                                                        <td><?= $laporan['alamat']; ?></td>

                                                    </tr>
                                                <?php } ?>
                                                <?php  ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="mb-0 mt-4">
                                        <svg width="30" class="text-primary mb-3 me-2" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                        </svg>
                                        It is a long established fact that a reader will be distracted by the readable content of a page
                                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                        as opposed to using 'Content here, content here', making it look like readable English.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>