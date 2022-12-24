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
    <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>;
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
        <form action="" method="POST">
            <div class="row d-flex justify-content-center">
                <!-- <div class="col-md-3">
               
            </div> -->
                <div class="col-md-4 d-flex justify-content-evenly" style="margin-bottom: 10px;">
                    <!-- <a href="v_tambah.php"><button class="btn waves-effect grey">Tambah</button></a> -->
                    <select class="form-select" name="bulan" aria-label="Default select example">
                        <?php
                        $query_select = "SELECT * FROM users WHERE id_kelompok = '$id_kelompok'";
                        $pemenang_bulan = mysqli_query($koneksi, $query_select);
                        ?>
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

                    <button type="submit" name="undi" class="btn waves-effect green me-4 ms-4">Undi arisan</button>
                    <a href="../../admin/undian.php" class="btn blue">Kembali</a>
        </form>
        <?php
        // 1
        if (isset($_POST['undi'])) {
            // 2
            $id_kelompok = $_GET['id_kelompok'];
            $bulan = $_POST['bulan'];
            $cari = mysqli_query($koneksi, "SELECT id_user FROM users WHERE status_menang = 'Belum Menang' AND id_kelompok = '$id_kelompok' ORDER BY RAND() LIMIT 1");
            $dtt = mysqli_fetch_array($cari);
            $id_user = $dtt['id_user'];
            $sql = mysqli_query($koneksi, "UPDATE users  SET status_menang = 'Pending', pemenang_bulan = $bulan WHERE id_user= $id_user");
            // 3
            if ($sql) {
                // 4
                echo "<script type='text/javascript'>
                    Swal.fire({
                        title: 'Sistem telah mengacak nama anggota, dan berhasil mendapatkan pemenang.',
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        background: '#fff)',
                        backdrop: `
                        rgba(0,0,123,0.4)
                        url('../images/undian.gif')
                        left top
                        no-repeat
                        `
                    }).then(function() {
                        window.location = 'undi-kelompok.php?id_kelompok=$id_kelompok';
                    });
                    </script>";
                // 5
            } else {
                // 6
                echo "<script type='text/javascript'>
                Swal.fire({
                    icon: 'error',
                    title: 'Maaf',
                    text: 'Anda Anda belum Memilih bulan!',
                }).then(function() {
                    window.location = 'undi-kelompok.php?id_kelompok=$id_kelompok';
                });
                </script>";
            }
            // 
        }
        ?>
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
                        -- AND status_menang = 'Menang'
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
                        } else if ($dtt['status_menang'] == 'Pending') {
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
                                <?php
                                if ($dtt['status_menang'] == 'Menang') {
                                ?>
                                    <a class="btn btn-default disabled" role="button" aria-disabled="true" href="pemenang.php?id_kelompok=<?= $id_kelompok; ?>" class="btn grey modal-trigger">
                                        Tetapkan
                                    </a>
                                <?php } elseif ($dtt['status_menang'] == 'Pending') { ?>
                                    <a href="pemenang.php?id_kelompok=<?= $id_kelompok; ?>" class="btn grey modal-trigger">Tetapkan</a>
                                <?php } ?>
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