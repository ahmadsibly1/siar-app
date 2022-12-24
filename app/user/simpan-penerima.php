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
    $id_penerima = $_POST['id_penerima'];
    $status_penerima = $_POST['status_penerima'];

    $query = mysqli_query($koneksi, "UPDATE penerima SET status_penerima = '$status_penerima' WHERE id_penerima = '$id_penerima' AND id_user = '$id_user'");
    $query2 = mysqli_query($koneksi, "UPDATE users set pesan = 0 WHERE id_user = '$id_user'");


    // $query = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_user, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember) VALUES ('','$data','0','0','0','0','0','0','0','0','0','0','0','0'");
    if ($query && $query2) {
        echo "<script>alert('Konfirmasi Diubah');</script>";
        echo "<script>location  ='data-penerima.php?id_user=$id_user';</script>";
    } else {
        echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
        echo "<script>location  ='data-penerima.php?id_user=$id_user';</script>";
    }
}
