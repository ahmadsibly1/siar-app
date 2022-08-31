<!-- <a href="../../../conf/img/"></a> -->
<?php
include('../../../conf/config.php');
$id_user = $_POST['id_user'];
$nama =  $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$notelp = $_POST['notelephone'];
$nik = $_POST['nik'];
$tempatlahir = $_POST['tempatlahir'];
// $tanggallahir = $_POST['tanggallahir'];
$alamat_user = $_POST['alamat_user'];
$jeniskelamin = $_POST['jeniskelamin'];
$agama = $_POST['agama'];
// $ktp = $_FILES['ktp']['name'];



// proses upload foto
// menentukan destinasi untuk menyimpan foro
// $dir = "../../../conf/img/";
// // temporaari file
// $tmpFile = $_FILES['ktp']['tmp_name'];

// move_uploaded_file($tmpFile, $dir . $ktp);

$query = "UPDATE users SET
nama_user='$nama', 
username = '$username',
password = '$password',
no_telp = '$notelp',
nik = '$nik',
tempat_lahir = '$tempatlahir',
jenis_kelamin = '$jeniskelamin',
agama = '$agama'
WHERE id_user=$id_user";

if (mysqli_query($koneksi, $query)) {

    $message = "Data Berhasil di Ubah!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = '../biodata.php';
    </script>";
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}
