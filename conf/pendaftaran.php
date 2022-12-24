<?php include('config.php'); ?>
<?php require_once '../app/admin/header.php'; ?>
<script src="../app/plugins/sweetalert2/sweetalert2.all.min.js"></script>;

<?php
$nama =  $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$notelp = $_POST['notelephone'];
$nik = $_POST['nik'];
$tempatlahir = $_POST['tempatlahir'];
$tanggallahir = $_POST['tanggallahir'];
$alamat = $_POST['alamat'];
$jeniskelamin = $_POST['jeniskelamin'];
$agama = $_POST['agama'];
$nama_bank = $_POST['nama_bank'];
$no_rekening = $_POST['no_rekening'];
$ktp = $_FILES['ktp']['name'];


// proses upload foto
// menentukan destinasi untuk menyimpan foro
$dir = "img/";
// temporaari file
$tmpFile = $_FILES['ktp']['tmp_name'];

move_uploaded_file($tmpFile, $dir . $ktp);

$query = mysqli_query($koneksi, "INSERT INTO users (id_user, nama_user, username, password, no_telp, nik, tempat_lahir, alamat, tanggal_lahir, jenis_kelamin, agama, ktp, nama_bank, no_rekening, level) VALUES ('','$nama','$username','$password','$notelp','$nik','$tempatlahir','$alamat','$tanggallahir','$jeniskelamin','$agama','$ktp','$nama_bank','$no_rekening','user')");
if ($query == 1) {
        echo "<script type='text/javascript'>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Pendaftaran berhasil',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                        window.location = '../index.php';
                });
        </script>";
} else {
        echo "<script type='text/javascript'>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Pendaftaran gagal',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                        window.location = '../registrasi.php';
                });
        </script>";
}
