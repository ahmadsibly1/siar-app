<?php

include('../../../conf/config.php');

$nama =  $_GET['nama'];
$username = $_GET['username'];
$password = $_GET['password'];
$notelp = $_GET['notelephone'];
$nik = $_GET['nik'];
$tempatlahir = $_GET['tempatlahir'];
$tanggallahir = $_GET['tanggallahir'];
$alamat_user = $_GET['alamat_user'];
$jeniskelamin = $_GET['jeniskelamin'];
$agama = $_GET['agama'];
$ktp = $_FILES['ktp']['name'];


// proses upload foto
// menentukan destinasi untuk menyimpan foro
$dir = "../../../conf/img/";

// temporaari file
$tmpFile = $_FILES['ktp']['tmp_name'];

move_uploaded_file($tmpFile, $dir . $ktp);

$query = mysqli_query($koneksi, "INSERT INTO users (id_user, nama_user, username, password, no_telp, nik, tempat_lahir, tanggal_lahir, alamat_user, jenis_kelamin, agama, ktp, level) VALUES ('','$nama','$username','$password','$notelp','$nik','$tempatlahir','$tanggallahir','$alamat_user','$jeniskelamin','$agama','$ktp','user')");

var_dump($query);
die();
if ($query == 1) {

    $message = "Data Berhasil di tambahkan!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../data-anggota.php';
    </script>";
} else {
    $message = "Data Gagal di tambahkan!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = 'tambah-anggota.php';
    </script>";
    // header("Location: ../");
}
