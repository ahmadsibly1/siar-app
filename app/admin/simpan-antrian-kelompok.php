<?php

include('../../conf/config.php');

if (isset($_POST['simpan'])) {
    $data = $_POST['id_user'];
    $sql = mysqli_query($koneksi, "UPDATE users SET ikut ='$_POST[ikut]' WHERE id_user = '$data'");
    $query2 = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_user) VALUES ('','$data')");

    if ($sql && $query2) {
        echo "<script>alert('Konfirmasi Diubah');</script>";
        echo "<script>location  ='antrian-kelompok.php';</script>";
    } else {
        echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
        echo "<script>location  ='antrian-kelompok.php';</script>";
    }
}
