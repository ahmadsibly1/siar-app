<?php include('../header.php'); ?>

<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>;

<?php

include('../../../conf/config.php');

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kelompok WHERE id_kelompok='$id'");
$query2 = mysqli_query($koneksi, "UPDATE users SET id_kelompok='0', ikut='Belum' WHERE id_kelompok='$id'");
if ($query == 1 && $query2 == 1) {
    echo "<script type='text/javascript'>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Data Berhasil di Hapus',
        showConfirmButton: false,
        timer: 1500
        }).then(function() {
            window.location = '../data-kelompok.php';
        });
    </script>";
} else {
    echo "<script type='text/javascript'>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Data Berhasil di Hapus',
        showConfirmButton: false,
        timer: 1500
        }).then(function() {
            window.location = '../data-kelompok.php';
        });
    </script>";
}
