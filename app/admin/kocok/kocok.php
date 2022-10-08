<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kocok arisan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>


    <?php
    include "../../../conf/config.php";
    $id_kelompok = $_GET['id_kelompok'];
    $cari = mysqli_query($koneksi, "SELECT id_user FROM users 
                                WHERE status_menang = 'Belum Menang' 
                                AND id_kelompok = '$id_kelompok' 
                                ORDER BY RAND() LIMIT 1");
    $dtt = mysqli_fetch_array($cari);

    // die(var_dump($id_kelompok));
    $sql = mysqli_query($koneksi, 'UPDATE users  SET status_menang = "Menang", pemenang_bulan=' . $bulan . ' WHERE id_user="' . $dtt['id_user'] . '"');
    if ($sql) {
        echo "<script>
        
    window.alert('Berhasil Mendapatkan Pemenang');window.location.href='undi-kelompok.php?id_kelompok=$id_kelompok';
    </script>";
    } else {
        echo "<script>window.alert('Data gagal di Upload');</script>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>