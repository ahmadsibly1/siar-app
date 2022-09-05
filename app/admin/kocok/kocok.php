<?php
include "../../../conf/config.php";
$id_kelompok = $_GET['id_kelompok'];
$cari = mysqli_query($koneksi, "SELECT id_user FROM users 
                                WHERE status_menang = 'Belum Menang' 
                                AND id_kelompok = '$id_kelompok' 
                                ORDER BY RAND() LIMIT 1");
$dtt = mysqli_fetch_array($cari);

// die(var_dump($id_kelompok));
$sql = mysqli_query($koneksi, 'UPDATE users  SET status_menang = "Menang" WHERE id_user="' . $dtt['id_user'] . '"');
if ($sql) {
    echo "<script>
    window.alert('Berhasil Mendapatkan Pemenang');window.location.href='undi-kelompok.php?id_kelompok=$id_kelompok';
    </script>";
} else {
    echo "<script>window.alert('Data gagal di Upload');</script>";
}
