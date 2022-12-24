<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>;
<?php
include "../../../conf/config.php";
$id_kelompok = $_GET['id_kelompok'];
// $id_bulan = $_GET['id_bulan'];
$cari = mysqli_query($koneksi, "SELECT * FROM users 
                                WHERE status_menang = 'Pending' 
                                AND id_kelompok = '$id_kelompok'
                                -- AND pemenang = '0' 
                                AND level = 'user'");
$dtt = mysqli_fetch_array($cari);

// die(var_dump($dtt));
$sql = mysqli_query($koneksi, 'UPDATE users  SET status_menang = "Menang", pesan = 1 WHERE id_user="' . $dtt['id_user'] . '"');
// $sql2 = mysqli_query($koneksi, 'UPDATE users  SET pesan = 1 WHERE id_kelompok > 0 AND level="user"');
$sql2 = mysqli_query($koneksi, 'INSERT INTO penerima (id_user, id_kelompok) VALUES (' . $dtt['id_user'] . ', ' . $dtt['id_kelompok'] . ')');
if ($sql == true && $sql2 == true) {


    echo "<script type='text/javascript'>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Pemenang berhasil ditetapkan',
        showConfirmButton: false,
        timer: 2000
        }).then(function() {
            window.location ='undi-kelompok.php?id_kelompok=$id_kelompok';
        });
        </script>";
} else {
    echo "<script>window.alert('Data gagal di Upload');</script>";
}
