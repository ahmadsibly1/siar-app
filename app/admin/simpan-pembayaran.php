<?php

include('../../conf/config.php');

if (isset($_POST['simpan'])) {
    $data = $_POST['id_pembayaran'];
    $sql = mysqli_query($koneksi, "UPDATE pembayaran SET status_pembayaran ='$_POST[status_pembayaran]' WHERE id_pembayaran = '$data'");
    if ($sql) {
        echo "<script>alert('Konfirmasi Diubah');</script>";
        echo "<script>location  ='pembayaran.php';</script>";
    } else {
        echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
        echo "<script>location  ='pembayaran.php';</script>";
    }
}
