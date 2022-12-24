<?php include('../../../conf/config.php'); ?>
<?php include('../header.php'); ?>

<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>;

<?php

$nama_kelompok = $_POST['nama_kelompok'];
$id_user = $_POST['id_user'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$kuota = $_POST['kuota'];
$jumlah_iuran = $_POST['jumlah_iuran'];

$query = mysqli_query($koneksi, "INSERT INTO kelompok (id_kelompok, nama_kelompok, tanggal_mulai, kuota, isi, jumlah_iuran) VALUES ('','$nama_kelompok','$tanggal_mulai','$kuota','0','$jumlah_iuran')");


// die(var_dump($query));
if ($query == 1) {

    $message = "Kelompok Berhasil di buat!";
    echo "<script type='text/javascript'>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
        }).then(function() {
            window.location = '../data-kelompok.php';
        });
</script>";
}
// else {
// $message = "Kelompok Gagal di buat!";
// echo "<script type='text/javascript'>
    //     alert('$message');
    //     window.location.href = 'tambah-kelompok.php';
    //     
// }