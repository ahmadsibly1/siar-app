<?php

include('../../../conf/config.php');

// $bukti_bayar =  $_FILES['bukti_bayar'];
$id_user =  $_POST['id_user'];
$nama_kelompok =  $_POST['nama_kelompok'];
$bank_tujuan =  $_POST['bank_tujuan'];
$tanggal_bayar =  $_POST['tanggal_bayar'];
$jumlah =  $_POST['jumlah'];
$bulan =  $_POST['bulan'];
$bukti_bayar = $_FILES['bukti_bayar']['name'];
$lokasi = $_FILES['bukti_bayar']['tmp_name'];
$tipe = $_FILES['bukti_bayar']['type'];
// die(print_r($nama_kelompok));
move_uploaded_file($lokasi, "images/$bukti_bayar");
if ($nama_kelompok == "") {

    $message = "Anda belum mengikuti kelompok arisan, silahkan ikuti kelompok arisan terlebih dahulu";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../data-pembayaran.php?id_user=$id_user';
    </script>";
} else {
    $query = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembayaran, bukti_bayar, id_user, id_kelompok, bank, tgl_bayar, jumlah, bulan) VALUES ('','$bukti_bayar','$id_user','$nama_kelompok','$bank_tujuan','$tanggal_bayar ','$jumlah','$bulan')");
    if ($query == 1) {

        $message = "Pembayarana berhasil dan menunggu konfirmasi dari admin";
        echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../data-pembayaran.php?id_user=$id_user';
        </script>";
    }
}




// if (isset($_POST['simpan'])) {
//     $nama_foto = $_FILES['bukti_bayar']['name'];
//     $lokasi = $_FILES['bukti_bayar']['tmp_name'];
//     $tipe = $_FILES['bukti_bayar']['type'];

//     if ($lokasi == "") {
//         $query = "INSERT INTO pembayaran SET
//         id_user = '$_POST[id_user]',
//         id_kelompok ='$_POST[nama_kelompok]',
//         bank ='$_POST[bank_tujuan]',
//         tgl_bayar = '$_POST[tanggal]',
//         jumlah ='$_POST[jumlah]',
//         bulan ='$_POST[bulan]'";
//     } else {

//         move_uploaded_file($lokasi, "images/$nama_foto");
//         $query = "INSERT INTO pembayaran SET
//         bukti_bayar = '$nama_foto',
//         id_user = '$_POST[id_user]',
//         id_kelompok ='$_POST[nama_kelompok]',
//         bank ='$_POST[bank_tujuan]',
//         tgl_bayar = '$_POST[tanggal]',
//         jumlah ='$_POST[jumlah]',
//         bulan ='$_POST[bulan]'";

//         $proses = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

//         if ($proses) {
//             echo "<script>alert('Data Sudah disimpan');</script>";
//             echo "<script>window.location='index.php?page=data_pembayaran';</script>";
//         } else {
//             echo "<script>alert('Data Gagal disimpan');</script>";
//             echo "<script>window.location='index.php?page=data_pembayaran';</script>";
//         }
//     }
// }
