<?php

include('../../../conf/config.php');

$nama_kelompok =  $_GET['nama_kelompok'];
$id_kelompok = $_GET['id_kelompok'];
$tanggal_mulai =  $_GET['tanggal_mulai'];
$kuota =  $_GET['kuota'];
$jumlah_iuran =  $_GET['jumlah_iuran'];


$query = "UPDATE kelompok SET
nama_kelompok='$nama_kelompok', 
tanggal_mulai='$tanggal_mulai', 
kuota='$kuota',  
jumlah_iuran='$jumlah_iuran'

WHERE id_kelompok=$id_kelompok";

if (mysqli_query($koneksi, $query)) {
    // echo "Record updated successfully";
    $message = "Kelompok Berhasil di Ubah!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../data-kelompok.php';
    </script>";
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}
