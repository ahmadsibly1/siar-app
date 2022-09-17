<?php
session_start();
require_once 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
// $id_user = $_POST['nama_user'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

if (mysqli_num_rows($query) == 1) {

    $data = mysqli_fetch_assoc($query);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {
        // buat session login dan username

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin

        $message = "Anda berhasil masuk";
        echo "<script>
        alert('$message');
        window.location.href = '../app/admin/';
        </script>";
        // header("Location: ../app/admin");
    } else if ($data['level'] == "user") {
        // buat session login dan username
        // $_SESSION['id_user'] = $cek['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";
        // $_SESSION['nama_user'] = $nama_user;
        // alihkan ke halaman dashboard pegawai
        $message = "Anda berhasil masuk";
        echo "<script>
        alert('$message');
        window.location.href = '../app/user/';
        </script>";
        // header("Location: ../app/user");
    } else {
        $message = "Username atau Password salah!";
        echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = '../index.php';
        </script>";
    }
} else {
    $message = "Username atau Password salah!";
    echo "<script type='text/javascript'>
        window.location.href = '../index.php';
        </script>";
}
?>
<script src="../app/plugins/sweetalert2/sweetalert2.all.min.js"></script>