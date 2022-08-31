<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "siar";

$koneksi = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// if (!$koneksi) {
//     die("koneksi gagal" . mysqli_connect_error());
// } else {
//     echo "Koneksi Berhasil";
// }
