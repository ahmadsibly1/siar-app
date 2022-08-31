<?php include('conf/config.php');

$get_data = mysqli_query($koneksi, "SELECT nama_user FROM users");
while ($data = mysqli_fetch_array($get_data)) {
    $data_siswa[] = $data;
}
echo json_encode($data_siswa);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Menampilkan Data Dari Database Menggunakan AJAX</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Menampilkan Data Dari Database Menggunakan AJAX
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function() {
            $.ajax({
                url: "get_data.php",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var nomor = 0;
                    for (i = 0; i < data.length; i++) {
                        nomor++;
                        $('tbody').append(data[i].nama_user + '</td><td>');
                    }
                },
                error: function(data) {
                    alert("Terjadi Kesalahan!");
                }
            });
        });
    </script>
</body>

</html>