<?php

include('../../../conf/config.php');

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
if ($query == 1) {

    $message = "Pembayaran Berhasil di hapus!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../pembayaran.php';
    </script>";
} else {
    $message = "Pembayaran Gagal di hapus!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../pembayaran.php';
    </script>";
    // header("Location: ../");
}
