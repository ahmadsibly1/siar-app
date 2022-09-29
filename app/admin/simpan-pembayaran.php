<?php

include('../../conf/config.php');

if (isset($_POST['simpan'])) {
    $data = $_POST['id_pembayaran'];
    $bulan = $_POST['bulan'];
    $id_user = $_POST['id_user'];
    $sql = mysqli_query($koneksi, "UPDATE pembayaran SET status_pembayaran ='$_POST[status_pembayaran]' WHERE id_pembayaran = '$data'");
    $sql2 = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi ='Lunas', pesan = 0, bulan ='$bulan', id_pembayaran = '$data' WHERE id_user = '$id_user' AND bulan = '$bulan'");
    if ($sql == true && $sql2 == true) {
        echo "<script>alert('Konfirmasi Diubah');</script>";
        echo "<script>location  ='pembayaran.php';</script>";
    } else {
        echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
        echo "<script>location  ='pembayaran.php';</script>";
    }
}
