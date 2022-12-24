<?php include('../../../conf/config.php'); ?>
<?php include('../header.php'); ?>
<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>;


<?php
$id_user     = $_POST['id_user'];
$id_kelompok =  $_POST['id_kelompok'];


$query = "UPDATE users SET id_kelompok='$id_kelompok', ikut = 'Pending' WHERE id_user=$id_user";
$query2 = "UPDATE kelompok SET isi = isi + 1 WHERE id_kelompok=$id_kelompok";

if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, $query);
    $sql2 = mysqli_query($koneksi, $query2);
    if ($sql && $sql2) {

        echo "<script type='text/javascript'>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Berhasil mendaftar dan menunggung konfirmasi admin',
        showConfirmButton: false,
        timer: 1500
        }).then(function() {
            window.location = '../data-kelompok.php?id_user=$id_user';
        });
        </script>";
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}
// if (mysqli_query($koneksi, $query)) {

//     $message = "Anda berhasil bergabung ke kelompok! tunggu konfirmasi dari admin";
//     echo "<script type='text/javascript'>
//     alert('$message');
//     window.location.href = '../data-kelompok.php?id_user=$id_user';
//     </script>";
// } else {
//     echo "Error updating record: " . mysqli_error($koneksi);
// }
