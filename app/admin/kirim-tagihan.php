
<?php
include('../../conf/config.php');

$id_user = $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE transaksi SET pesan='1' WHERE id_user='$id_user'");

if ($query) {
    $message = "Pesan Berhasil di kirim!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = 'data-tagihan.php';
    </script>";
} else {
    $message = "Gagal mengirim pesan!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href = 'data-tagihan.php';
    </script>";
}
// header('location: tagihan.php');
