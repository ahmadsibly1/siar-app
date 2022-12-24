<?php include('../../../conf/config.php'); ?>
<?php include('../header.php'); ?>
<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>;

<?php

$nama_kelompok =  $_GET['nama_kelompok'];
$id_kelompok = $_GET['id_kelompok'];
$tanggal_mulai =  $_GET['tanggal_mulai'];
$kuota =  $_GET['kuota'];
$jumlah_iuran =  $_GET['jumlah_iuran'];


$query = "UPDATE kelompok SET
nama_kelompok='$nama_kelompok', 
tanggal_mulai='$tanggal_mulai', 
kuota='$kuota',  
jumlah_iuran='$jumlah_iuran'

WHERE id_kelompok=$id_kelompok";

if (mysqli_query($koneksi, $query)) {
    // echo "Record updated successfully";
    echo "<script type='text/javascript'>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Kelompok berhasil di rubah',
        showConfirmButton: false,
        timer: 1500
        }).then(function() {
            window.location = '../data-kelompok.php';
        });
        </script>";
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}
