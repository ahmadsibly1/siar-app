<?php include('../../conf/config.php'); ?>


<?php
$id_kelompok = $_GET['id_kelompok'];
$data = [];
$query = mysqli_query($koneksi, "SELECT nama_user FROM users where id_kelompok = '$id_kelompok' ");
while ($row = mysqli_fetch_object($query)) {
    $data[] = $row;
}
$mydata = json_encode($data);
echo $mydata;
?>