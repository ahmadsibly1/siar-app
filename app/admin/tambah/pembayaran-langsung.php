<?php

include('../../../conf/config.php');

// $bukti_bayar =  $_FILES['bukti_bayar'];
$id_user =  $_POST['id_user'];
// $id_pembayaran =  $_POST['id_pembayaran'];
$nama_kelompok =  $_POST['nama_kelompok'];
// $bank_tujuan =  $_POST['bank_tujuan'];
$tanggal_bayar =  $_POST['tanggal_bayar'];
$jumlah =  $_POST['jumlah'];
$bulan =  $_POST['bulan'];
$bukti_bayar = $_FILES['bukti_bayar']['name'];



// proses upload foto
// menentukan destinasi untuk menyimpan foro
$dir = "../../user/tambah/images/";
// temporaari file
$tmpFile = $_FILES['bukti_bayar']['tmp_name'];

move_uploaded_file($tmpFile, $dir . $bukti_bayar);

$query = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembayaran, bukti_bayar, id_user, id_kelompok, tgl_bayar, jumlah, bulan) VALUES ('','$bukti_bayar','$id_user','$nama_kelompok','$tanggal_bayar ','$jumlah','$bulan')");
$query2 = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi = 'Pending', waktu = NOW() WHERE id_user = '$id_user' AND bulan = '$bulan'");
// $result = mysqli_fetch_array($query);
// $id_bayar = $result['id_pembayaran'];
if ($query == 1 && $query2 == 1) {

    $message = "Pembayarana berhasil silahkan konfirmasi";
    // die();
    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../pembayaran.php';
        </script>";
} else {
    $message = "Pembayarana gagal";
    // die();
    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../pembayaran-langsung.php?id_user=$id_user';
        </script>";
}
