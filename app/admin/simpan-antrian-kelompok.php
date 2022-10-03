<?php

include('../../conf/config.php');

if (isset($_POST['simpan'])) {
    $id_user = $_POST['id_user'];
    $id_kelompok = $_POST['id_kelompok'];
    $sql = mysqli_query($koneksi, "UPDATE users SET ikut ='$_POST[ikut]' WHERE id_user = '$id_user'");
    $query2 = mysqli_query($koneksi, "INSERT INTO transaksi 
    (id_transaksi, id_user, id_pembayaran, id_kelompok, bulan) 
    VALUES 
    ('','$id_user','0','$id_kelompok',1)");


    // $query = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_user, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember) VALUES ('','$data','0','0','0','0','0','0','0','0','0','0','0','0'");
    if ($sql && $query2) {
        echo "<script>alert('Konfirmasi Diubah');</script>";
        echo "<script>location  ='antrian-kelompok.php';</script>";
    } else {
        echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
        echo "<script>location  ='antrian-kelompok.php';</script>";
    }
}
