<?php include "../../../conf/config.php"; ?>
<html>

<head>
    <title>arisan</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col s12 center">
                <?php
                $id_kelompok = $_GET['id_kelompok'];
                $query = "SELECT nama_kelompok FROM kelompok
                WHERE id_kelompok = '$id_kelompok'";
                $sql = mysqli_query($koneksi, $query);
                $data = mysqli_fetch_array($sql);
                ?>
                <h2>Undian Arisan <?= $data['nama_kelompok']; ?></h2>
            </div>
            <div class="col s12 center">
                <!-- <a href="v_tambah.php"><button class="btn waves-effect grey">Tambah</button></a> -->
                <a href="kocok.php?id_kelompok=<?= $_GET['id_kelompok']; ?>"><button class="btn waves-effect green">kocok Arisan</button></a>
            </div>
            <div class="col s12">
                <div class="card-panel white-text" style="background-color: #1a667e;">
                    <table border="1" style="color:#fff;">
                        <tr>
                            <td style="width: 20%;">Nama Anggota</td>
                            <td style="width: 20%;">Status Bayar</td>
                            <td style="width: 20%;">Status Menang</td>
                            <td style="width: 35%;">Aksi</td>
                        </tr>
                        <?php
                        $id_kelompok = $_GET['id_kelompok'];
                        $no = 0;
                        $query = "SELECT DISTINCT (nama_user), status_pembayaran, status_menang FROM users
                        INNER JOIN pembayaran ON users.id_user = pembayaran.id_user
                        WHERE users.id_kelompok = '$id_kelompok'
                        AND status_pembayaran = 'Dikonfirmasi'
                        -- AND status_menang = 'Belum Menang'
                        ";

                        $sql = mysqli_query($koneksi, $query);
                        // die(var_dump($sql));
                        while ($dtt = mysqli_fetch_array($sql)) {

                        ?>
                            <?php
                            if ($dtt['status_menang'] == 'Belum Menang') {
                            ?>
                                <tr>
                                <?php
                            } else if ($dtt['status_menang'] == 'Menang') {
                                ?>
                                <tr style="background: #e65100">
                                <?php
                            }
                                ?>
                                <td><?= $dtt['nama_user']; ?></td>
                                <td><?= $dtt['status_pembayaran']; ?></td>
                                <?php
                                if ($dtt['status_menang'] == 'Belum Menang') {
                                ?>
                                    <td>Belum Menang</td>
                                <?php
                                } else if ($dtt['status_menang'] == 'Menang') {
                                ?>
                                    <td>Menang</td>
                                <?php
                                } else {
                                ?>
                                    <td></td>
                                <?php
                                }
                                ?>
                                <td style="border: 1px solid #fff;">
                                    <!-- <a href="delete.php?id_anggota=<?= $dtt['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus?');"><button class="btn waves-effect red">Hapus</button></a>
                                    <a href="pemenang.php?id_anggota=<?= $dtt['id_user']; ?>"><button class="btn waves-effect orange">Ubah</button></a> -->
                                    <!-- <a href="bayar.php?id_anggota=<?= $dtt['id_user']; ?>" onclick="return confirm('Yakin ingin melanjutkan?');"><button class="btn waves-effect blue">Bayar</button></a> -->
                                </td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>