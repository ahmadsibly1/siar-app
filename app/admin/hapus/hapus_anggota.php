<?php

include('../../../conf/config.php');

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id'");
if ($query == 1) {

    $message = "Data Berhasil di hapus!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../data-anggota.php';
    </script>";
} else {
    $message = "Data Gagal di hapus!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = 'tambah-anggota.php';
    </script>";
    // header("Location: ../");
}
