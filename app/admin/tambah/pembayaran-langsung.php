<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>;
<?php

include('../../../conf/config.php');


// $bukti_bayar =  $_FILES['bukti_bayar'];
$id_user =  $_POST['id_user'];
$id_pembayaran =  $_POST['id_pembayaran'];
$nama_kelompok =  $_POST['nama_kelompok'];
// $bank_tujuan =  $_POST['bank_tujuan'];
// $tanggal_bayar =  $_POST['tanggal_bayar'];
$jumlah =  $_POST['jumlah'];
$bulan =  $_POST['bulan'];
$bukti_bayar = $_FILES['bukti_bayar']['name'];



// proses upload foto
// menentukan destinasi untuk menyimpan foro
$dir = "../../user/tambah/images/";
// temporaari file
$tmpFile = $_FILES['bukti_bayar']['tmp_name'];

move_uploaded_file($tmpFile, $dir . $bukti_bayar);

$query = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembayaran, bukti_bayar, id_user, id_kelompok, tgl_bayar, jumlah, bulan, status_pembayaran) VALUES ('','$bukti_bayar','$id_user','$nama_kelompok', NOW(),'$jumlah','$bulan','Dikonfirmasi')");
$query2 = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi = 'Lunas', id_pembayaran = '$id_pembayaran', waktu = NOW() WHERE id_user = '$id_user' AND bulan = '$bulan'");
$query3 = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_user, id_pembayaran, id_kelompok, bulan) VALUES ('','$id_user','0','$nama_kelompok','$bulan' + 1)");
// $result = mysqli_fetch_array($query);
// $id_bayar = $result['id_pembayaran'];
if ($query == 1 && $query2 == 1 && $query3 == 1) {

    $message = "Pembayarana berhasil silahkan konfirmasi";
    // die();
    echo "<script type='text/javascript'>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Pembayarana berhasil',
        showConfirmButton: false,
        timer: 2000
        }).then(function() {
            window.location = '../pembayaran.php';
        });
        </script>";
} else {
    $message = "Pembayarana gagal";
    // die();
    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../pembayaran-langsung.php?id_user=$id_user';
        </script>";
}
