<?php

include('../../../conf/config.php');

$bukti_bayar =  $_FILES['bukti_bayar'];
$nama_pembayar =  $_POST['id_user'];
$nama_kelompok =  $_POST['nama_kelompok'];
$bank_tujuan =  $_POST['bank_tujuan'];
$tanggal_bayar =  $_POST['tanggal_bayar'];
$jumlah =  $_POST['jumlah'];
$bulan =  $_POST['bulan'];



$query = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembayaran, bukti_bayar, id_user, id_kelompok, bank, tanggal_bayar, jumlah, bulan) VALUES ('','$bukti_bayar','$nama_pembayar','$nama_kelompok','$bank_tujuan','$tanggal_bayar ','$jumlah','$bulan')");


if ($query == 1) {

    $message = "Kelompok Berhasil di buat!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../data-kelompok.php';
    </script>";
} 
// else {
//     $message = "Kelompok Gagal di buat!";
//     echo "<script type='text/javascript'>
//     alert('$message');
//     window.location.href = 'tambah-kelompok.php';
//     </script>";
// }
