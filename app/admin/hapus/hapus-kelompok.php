<?php

include('../../../conf/config.php');

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kelompok WHERE id_kelompok='$id'");
if ($query == 1) {

    $message = "Data Berhasil di hapus!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../data-kelompok.php';
    </script>";
} else {
    $message = "Data Gagal di hapus!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = 'datakelompok.php';
    </script>";
    // header("Location: ../");
}
