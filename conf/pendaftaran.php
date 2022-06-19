<?php
include('config.php');

$nama =  $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$notelp = $_POST['notelephone'];
$nik = $_POST['nik'];
$tempatlahir = $_POST['tempatlahir'];
$tanggallahir = $_POST['tanggallahir'];
$alamat_user = $_POST['alamat_user'];
$jeniskelamin = $_POST['jeniskelamin'];
$agama = $_POST['agama'];
$ktp = $_FILES['ktp']['name'];


// proses upload foto
// menentukan destinasi untuk menyimpan foro
$dir = "img/";
// temporaari file
$tmpFile = $_FILES['ktp']['tmp_name'];

move_uploaded_file($tmpFile, $dir . $ktp);

$query = mysqli_query($koneksi, "INSERT INTO users (id_user, nama_user, username, password, no_telp, nik, tempat_lahir, tanggal_lahir, alamat_user, jenis_kelamin, agama, ktp, level) VALUES ('','$nama','$username','$password','$notelp','$nik','$tempatlahir','$tanggallahir','$alamat_user','$jeniskelamin','$agama','$ktp','user')");

$message = "Anda berhasil mendaftar silahkan masuk!";
echo "<script>
        alert('$message');
        window.location.href = '../index.php';
        </script>";
// header('Location:../index.php');
