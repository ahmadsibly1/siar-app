<?php

include('../../../conf/config.php');

$nama_kelompok =  $_GET['nama_kelompok'];
$id_kelompok = $_GET['id_kelompok'];
$tanggal_mulai =  $_GET['tanggal_mulai'];
$tipe_arisan =  $_GET['tipe_arisan'];
$kuota =  $_GET['kuota'];
$isi =  $_GET['isi'];
$jumlah_iuran =  $_GET['jumlah_iuran'];

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

// $query = mysqli_query($koneksi, "UPDATE kelompok (id_kelompok, nama_kelompok, tanggal_mulai, tipe_arisan, kuota, isi, jumlah_iuran) VALUES ('','$nama_kelompok','$tanggal_mulai','$tipe_arisan','$kuota','$isi ','$jumlah_iuran')");


// if ($query == 1) {

//     $message = "Kelompok Berhasil di buat!";
//     echo "<script type='text/javascript'>
//     alert('$message');
//     window.location.href = '../data-kelompok.php';
//     </script>";
// } 
// else {
//     $message = "Kelompok Gagal di buat!";
//     echo "<script type='text/javascript'>
//     alert('$message');
//     window.location.href = 'tambah-kelompok.php';
//     </script>";
// }
$query = "UPDATE kelompok SET
nama_kelompok='$nama_kelompok', 
tanggal_mulai='$tanggal_mulai', 
tipe_arisan='$tipe_arisan', 
kuota='$kuota', 
isi='$isi', 
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
