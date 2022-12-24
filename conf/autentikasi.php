<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proses</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="../app/">
  <script src="../app/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

</body>

</html>
<?php
session_start();
require_once 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];


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
    echo "<script type='text/javascript'>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Berhasil Masuk',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                        window.location = '../app/admin/index.php';
                });
        </script>";
  } else {
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "user";
    echo "<script type='text/javascript'>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Berhasil masuk',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                        window.location = '../app/user/index.php';
                });
        </script>";
  }
} else {
  echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Username atau Password salah!',
        }).then(function() {
        window.location = '../index.php';
        });
        </script>";
}
?>