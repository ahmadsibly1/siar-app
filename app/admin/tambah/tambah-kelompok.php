<?php

include('../../../conf/config.php');

$nama_kelompok =  $_POST['nama_kelompok'];
$id_user =  $_POST['id_user'];
$tanggal_mulai =  $_POST['tanggal_mulai'];
$tipe_arisan =  $_POST['tipe_arisan'];
$kuota =  $_POST['kuota'];
$isi =  $_POST['isi'];
$jumlah_iuran =  $_POST['jumlah_iuran'];

// if (isset($_POST['submit'])) {
//     mysqli_query($koneksi, "INSERT INTO kelompok SET 
//     nama_kelompok =  '$_POST[nama_kelompok]',
//     tanggal_mulai =  '$_POST[tanggal_mulai]',
//     tipe_arisan =  '$_POST[tipe_arisan]',
//     kuota =  '$_POST[kuota]',
//     isi =  '$_POST[isi]',
//     jumlah_iuran =  '$_POST[jumlah_iuran]'");

//     echo "<script>alert('data berhasil di tambah')</script>";
// }

$query = mysqli_query($koneksi, "INSERT INTO kelompok (id_kelompok, nama_kelompok, tanggal_mulai, tipe_arisan, kuota, isi, jumlah_iuran) VALUES ('','$nama_kelompok','$tanggal_mulai','$tipe_arisan','$kuota','$isi ','$jumlah_iuran')");


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
