<?php
include "../../../conf/config.php";
$id_kelompok = $_GET['id_kelompok'];
$cari = mysqli_query($koneksi, "SELECT * FROM users 
                                WHERE status_menang = 'Menang' 
                                AND id_kelompok = '$id_kelompok'
                                AND pemenang = '0' 
                                AND level = 'user'");
$dtt = mysqli_fetch_array($cari);

// die(var_dump($dtt));
$sql = mysqli_query($koneksi, 'UPDATE users  SET pemenang = 1 WHERE id_user="' . $dtt['id_user'] . '"');
if ($sql) {
    echo "<script>
    window.alert('Pemenang berhasil ditetapkan');window.location.href='undi-kelompok.php?id_kelompok=$id_kelompok';
    </script>";
} else {
    echo "<script>window.alert('Data gagal di Upload');</script>";
}
