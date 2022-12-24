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
    $data = $_POST['id_pembayaran'];
    $bulan = $_POST['bulan'];
    $id_user = $_POST['id_user'];
    $id_kelompok = $_POST['id_kelompok'];

    $sql = mysqli_query($koneksi, "UPDATE pembayaran SET status_pembayaran ='$_POST[status_pembayaran]' WHERE id_pembayaran = '$data'");

    if ($sql == true) {
        echo "<script type='text/javascript'>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil di ubah',
                showConfirmButton: false,
                timer: 2000
                }).then(function() {
                    window.location = 'pembayaran.php';
                });
                </script>";
        $query = mysqli_query($koneksi, "SELECT status_pembayaran FROM pembayaran WHERE id_pembayaran = '$data'");
        $status = mysqli_fetch_array($query);
        // 6
        if ($status['status_pembayaran'] == "Pending") {
            echo "<script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Maaf',
                text: 'Anda Anda belum mengubah status!',
            }).then(function() {
                window.location = 'pembayaran.php';
            });
            </script>";
        } else {
            $sql2 = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi ='Lunas', id_pembayaran = '$data' WHERE id_user = '$id_user' AND bulan = '$bulan'");

            $sql3 = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_user, id_pembayaran, id_kelompok, bulan) VALUES ('','$id_user','0','$id_kelompok','$bulan' + 1)");

            if ($sql2 == true && $sql3 == true) {
                echo "<script type='text/javascript'>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil di ubah',
                showConfirmButton: false,
                timer: 2000
                }).then(function() {
                    window.location = 'pembayaran.php';
                });
                </script>";
            } else {
                echo "<script type='text/javascript'>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Data gagal di ubah',
                showConfirmButton: false,
                timer: 2000
                }).then(function() {
                    window.location = 'pembayaran.php';
                });
                </script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'Maaf',
            text: 'Anda Anda belum mengubah status!',
        }).then(function() {
            window.location = 'pembayaran.php';
        });
        </script>";
    }
}
