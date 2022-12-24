<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proses</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
</body>

</html>


<?php

include('../../conf/config.php');

if (isset($_POST['simpan'])) {

    $id_user = $_POST['id_user'];
    $id_kelompok = $_POST['id_kelompok'];
    $sql = mysqli_query($koneksi, "UPDATE users SET ikut ='$_POST[ikut]' WHERE id_user = '$id_user'");
    if ($sql == 1) {
        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Anda berhasil mengubah status!',
        }).then(function() {
            window.location = 'antrian-kelompok.php';
        });
        </script>";
    } else {
        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Anda gagal mengubah status!',
        }).then(function() {
            window.location = 'antrian-kelompok.php';
        });
        </script>";
    }

    $sql2 = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
    $ikut = mysqli_fetch_array($sql2);

    if ($ikut['ikut'] == "Terima") {
        $query2 = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_user, id_pembayaran, id_kelompok, bulan) VALUES ('','$id_user','0','$id_kelompok',1)");
    }
}
