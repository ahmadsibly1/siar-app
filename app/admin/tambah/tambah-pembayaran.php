<?php

include('../../../conf/config.php');

// $bukti_bayar =  $_FILES['bukti_bayar'];
$id_user =  $_POST['id_user'];
$nama_user =  $_POST['nama_user'];
// echo $nama_user;
// die();
$bukti_bayar = $_FILES['bukti_bayar']['name'];
$lokasi = $_FILES['bukti_bayar']['tmp_name'];
$tipe = $_FILES['bukti_bayar']['type'];

move_uploaded_file($lokasi, "images/$bukti_bayar");
if ($nama_kelompok == "") {

    $message = "Anda belum mengikuti kelompok arisan, silahkan ikuti kelompok arisan terlebih dahulu";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../data-pembayaran.php?id_user=$id_user';
    </script>";
} else {
    $query = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembayaran, bukti_bayar, id_user, id_kelompok, bank, tgl_bayar, jumlah, bulan) VALUES ('','$bukti_bayar','$id_user','$nama_kelompok','$bank_tujuan','$tanggal_bayar ','$jumlah','$bulan')");
    // die(var_dump($query));
    $query2 = mysqli_query($koneksi, "UPDATE transaksi SET id_pembayaran = '$id_pembayaran' WHERE id_user = '$id_user' AND bulan = '$bulan'");
    if ($query == 1) {

        $message = "Pembayarana berhasil dan menunggu konfirmasi dari admin";
        echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../data-pembayaran.php?id_user=$id_user';
        </script>";
    }
}
