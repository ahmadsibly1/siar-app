<?php
$title = 'Print data';
include('header.php');
date_default_timezone_set("Asia/Jakarta");
?>

<?php
include('../../conf/config.php');
include('../../conf/rupiah.php');
// $id_user = $_GET['id_user'];
$id_pembayaran = $_GET['id_pembayaran'];
$query = mysqli_query($koneksi, "SELECT * FROM pembayaran
    LEFT JOIN users 
    ON pembayaran.id_user = users.id_user
    LEFT JOIN kelompok 
    ON pembayaran.id_kelompok = kelompok.id_kelompok
    INNER JOIN transaksi
    ON pembayaran.id_pembayaran = transaksi.id_pembayaran
    WHERE pembayaran.id_pembayaran = '$id_pembayaran'");
$data = mysqli_fetch_array($query);

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
                        <p>Bukti Transaksi</p>
                        <p>Tanggal Cetak : <?= date("d-m-Y, H:i:s"); ?></p>




                    </div>

                </div>

            </div>


            <?php
            $no = 0;
            $id_user = $_GET['id_user'];
            $id_pembayaran = $_GET['id_pembayaran'];
            // $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN users ON pembayaran.id_pembayaran = users.id_user");
            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran
                                                    LEFT JOIN users 
                                                    ON pembayaran.id_user = users.id_user
                                                    LEFT JOIN kelompok 
                                                    ON pembayaran.id_kelompok = kelompok.id_kelompok
                                                    WHERE pembayaran.id_user = '$id_user'
                                                    AND pembayaran.id_pembayaran = '$id_pembayaran'");
            $pembayaran = mysqli_fetch_array($query);
            ?>

            <!-- /.content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card   rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="mb-2">Foto Struk</p>
                                    <a href="tambah/images/<?= $pembayaran['bukti_bayar']; ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="tambah/images/<?= $pembayaran['bukti_bayar']; ?>" alt="" width="200px">
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-4">
                                    <div class="table-responsive-lg">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama Pembayar</th>
                                                    <th class="text-center" scope="col">Nama kelompok</th>
                                                    <th class="text-center" scope="col">Tanggal Transfer</th>
                                                    <th class="text-center" scope="col">Jumlah</th>
                                                    <th class="text-center" scope="col">Bulan</th>
                                                    <th class="text-center" scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <!-- <td><?= $no; ?></td> -->
                                                    <td><?= $pembayaran['nama_user']; ?></td>
                                                    <td class="text-center" scope="col"><?= $pembayaran['nama_kelompok']; ?></td>
                                                    <!-- <td><?= $pembayaran['bank']; ?></td> -->
                                                    <td class="text-center" scope="col"><?= $pembayaran['tgl_bayar']; ?></td>
                                                    <td class="text-center" scope="col"><?= rupiah($pembayaran['jumlah']); ?></td>
                                                    <td class="text-center" scope="col">Ke - <?= $pembayaran['bulan']; ?></td>
                                                    <td class="text-center" scope="col">
                                                        <!-- <div id="status"><?= $pembayaran['status_pembayaran']; ?></div> -->
                                                        <?php
                                                        if ($pembayaran['status_pembayaran'] == 'Pending') {
                                                            echo '<span class="badge badge-warning p-2">Pending</span>';
                                                        } elseif ($pembayaran['status_pembayaran'] == 'Dikonfirmasi') {
                                                            echo '<span class="badge badge-success p-2">Diterima</span>';
                                                        }

                                                        ?>
                                                    </td>


                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h6 class="mb-0">Total</h6>
                                                    </td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"><b><?= rupiah($pembayaran['jumlah']); ?></b></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="mb-0 mt-4">
                                        Terimakasih telah melakukan pembayaran || Admin Arisan
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