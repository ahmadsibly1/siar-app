<!-- <a href="../../../conf/img/"></a> -->
<?php
include('../../../conf/config.php');
$id_user     = $_POST['id_user'];
$id_kelompok =  $_POST['id_kelompok'];


$query = "UPDATE users SET id_kelompok='$id_kelompok' WHERE id_user=$id_user";

if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
        $message = "Anda berhasil bergabung ke kelompok! tunggu konfirmasi dari admin";
        echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../data-kelompok.php?id_user=$id_user';
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
