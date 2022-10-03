<?php

include('../../conf/config.php');

if (isset($_POST['simpan'])) {
    $data = $_POST['id_pembayaran'];
    $bulan = $_POST['bulan'];
    $id_user = $_POST['id_user'];
    $id_kelompok = $_POST['id_kelompok'];
    $sql = mysqli_query($koneksi, "UPDATE pembayaran SET status_pembayaran ='$_POST[status_pembayaran]' WHERE id_pembayaran = '$data'");
    $sql2 = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi ='Lunas', id_pembayaran = '$data' WHERE id_user = '$id_user' AND bulan = '$bulan'");
    $sql3 = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_user, id_pembayaran, id_kelompok, bulan) VALUES ('','$id_user','0','$id_kelompok','$bulan' + 1)");
    // die();
    if ($sql == true && $sql2 == true && $sql3 == true) {
        echo "<script>alert('Konfirmasi Diubah');</script>";
        echo "<script>location  ='pembayaran.php';</script>";
    } else {
        echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
        echo "<script>location  ='pembayaran.php';</script>";
    }
}
