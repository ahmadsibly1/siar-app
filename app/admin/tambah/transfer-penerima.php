<?php

include('../../../conf/config.php');

$id_user =  $_POST['id_user'];
$id_penerima =  $_POST['id_penerima'];
$jumlah =  $_POST['jumlah'];
$bukti_bayar = $_FILES['bukti_bayar']['name'];


// proses upload foto
// menentukan destinasi untuk menyimpan foro
$dir = "../../user/tambah/images/";
// temporaari file
$tmpFile = $_FILES['bukti_bayar']['tmp_name'];
move_uploaded_file($tmpFile, $dir . $bukti_bayar);
// die(var_dump($id_user, $id_penerima, $nama_kelompok, $metode, $tanggal_bayar, $jumlah, $bukti_bayar));

$query = mysqli_query($koneksi, "UPDATE penerima SET 
jumlah_terima = '$jumlah',
tanggal_terima = NOW(),
status_penerima = 'Pending',
bukti_terima = '$bukti_bayar', 
metode = 'transfer'
WHERE id_penerima = '$id_penerima'
AND id_user = '$id_user'");



if ($query == 1) {

    $message = "Pembayaran berhasil";
    // die();
    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../data-penerima.php';
        </script>";
} else {
    $message = "Pembayaran gagal";
    // die();
    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../data-penerima.php';
        </script>";
}
