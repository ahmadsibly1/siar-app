<?php
if (isset($_POST['close'])) {
    $id_user = $_GET['id'];
    $id_pesan = $_GET['id_pesan'];
    $sql = mysqli_query($koneksi, "UPDATE users  SET pesan = 0 WHERE id_user='$id_user'");
    if ($sql) {
        echo "<script>alert('Pesan berhasil dihapus!'); window.location = 'pesan.php'</script>";
    } else {
        echo "<script>alert('Pesan gagal dihapus!'); window.location = 'pesan.php'</script>";
    }
}
