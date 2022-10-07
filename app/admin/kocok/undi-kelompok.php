<?php include "../../../conf/config.php"; ?>


<html>

<head>
    <title>arisan</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="shortcut icon" href="../../dist/img/logo-siar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <?php
                $id_kelompok = $_GET['id_kelompok'];
                $query = "SELECT nama_kelompok FROM kelompok
                WHERE id_kelompok = '$id_kelompok'";
                $sql = mysqli_query($koneksi, $query);
                $data = mysqli_fetch_array($sql);
                ?>
                <h3 class="justify-content-center">Undian Arisan Kelompok <?= $data['nama_kelompok']; ?></h3>
                <!-- <div>
                    <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
                </div> -->
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <!-- <div class="col-md-3">
               
            </div> -->
            <div class="col-md-5 d-flex justify-content-center" style="margin-bottom: 10px;">
                <!-- <a href="v_tambah.php"><button class="btn waves-effect grey">Tambah</button></a> -->
                <form action="" method="post" class="me-4">
                    <select class="form-select " name="" aria-label="Default select example">
                        <option selected>Pilih Bulan</option>
                        <option value="1">ke - 1</option>
                        <option value="2">ke - 2</option>
                        <option value="3">ke - 3</option>
                        <option value="4">ke - 4</option>
                        <option value="5">ke - 5</option>
                        <option value="6">ke - 6</option>
                        <option value="7">ke - 7</option>
                        <option value="8">ke - 8</option>
                        <option value="9">ke - 9</option>
                        <option value="10">ke - 10</option>
                        <option value="11">ke - 11</option>
                        <option value="12">ke - 12</option>
                    </select>
                </form>
                <a href="kocok.php?id_kelompok=<?= $_GET['id_kelompok']; ?>">
                    <button class="btn waves-effect green me-4">Kocok Arisan</button>
                </a>
                <a href="../../admin/undian.php" class="btn blue">Kembali</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card-panel white-text " style="background-color: #1a667e; width:70%">
                    <table border="1" style="color:#fff;">
                        <tr>
                            <td style="width: 25%;">Nama Anggota</td>
                            <td style="width: 25%;">Status Bayar</td>
                            <td style="width: 25%;">Status Menang</td>
                            <td style="width: 25%;">Aksi</td>
                        </tr>
                        <?php
                        $id_kelompok = $_GET['id_kelompok'];
                        $no = 0;
                        $query = "SELECT DISTINCT (nama_user), status_pembayaran, status_menang FROM users
                        INNER JOIN pembayaran ON users.id_user = pembayaran.id_user
                        WHERE users.id_kelompok = '$id_kelompok'
                        AND status_pembayaran = 'Dikonfirmasi'
                        AND pemenang = '0'
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
                                <td>
                                    <a href="pemenang.php?id_kelompok=<?= $id_kelompok; ?>" class="btn grey modal-trigger">Tetapkan</a>
                                    <?php
                                    // $query = mysqli_query($koneksi, "UPDATE users SET pemenang = '1' WHERE id_kelompok = '$id_kelompok' AND status_menang = 'Menang'");
                                    // $data = mysqli_fetch_array($query);
                                    ?>
                                </td>
                                </tr>
                            <?php } ?>

                    </table>
                </div>
            </div>
        </div>
        <div class="col s12 center">
            <!-- modal -->
            <div class="modal" id="modal">
                <form action="pemenang.php" method="GET">
                    <div class="modal-content">
                        <h4>Tetapkan</h4>
                        <h3><b><?= $data['nama_user']; ?></b></h3>
                        <input type="text" name="nama_user" value="<?= $data['nama_user']; ?>">
                        <input type="text" name="pemenang" value="1">
                        <input type="text" name="pemenang" value="<?= $data['id_kelompok']; ?>">
                        <h4>Sebagai pemenang bulai ini?</h4>
                    </div>
                    <div class="modal-footer center">
                        <!-- <a href="pemenang.php" class="modal-close btn grey">Tetapkan</a> -->
                        <a href=""><button type="submit" class="btn grey">Tetapkan</button></a>

                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.modal').modal();
        });
    </script>

</body>

</html>

<?php include "../footer.php" ?>