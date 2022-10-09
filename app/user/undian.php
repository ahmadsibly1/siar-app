<?php

$title = "Undian";
?>
<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>
<?php include('../../conf/rupiah.php'); ?>


<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">

            <!-- Sidebar -->
            <?php include('sidebar.php'); ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content-header">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">




                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header justify-content-between bg-dark">
                                    <div class="card-title">
                                        <div class="d-flex">
                                            <h4 class="">Undian</h4>
                                        </div>
                                    </div>
                                    <!-- <button type="button" class="btn mb-3 float-right" data-toggle="modal" data-target="#tambah-pembayaran" style="background-color: #1a667e; color:white;">
                                        Tambah Pembayaran
                                    </button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">

                                    <div class="">
                                        <div class="row mb-1">
                                            <div class="col-sm-12">
                                                <?php
                                                $id_user = $_GET['id_user'];
                                                $query = mysqli_query($koneksi, "SELECT * FROM users WHERE users.id_user = $id_user AND id_kelompok > 0 AND pesan = 1");
                                                if ($data = mysqli_num_rows($query)) {

                                                    $data = mysqli_fetch_assoc($query);
                                                    if ($data['status_menang'] == 'Menang') {
                                                        echo '<div class="alert alert-success" role="alert">
                                                        Selamat, Anda Menang Undian bulan ke - ' . $data['pemenang_bulan'] . '
                                                        <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        ';
                                                    } else {
                                                        echo '<div class="alert alert-danger" role="alert"> Anda belum menang undian bulan ini
                                                        <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        ';
                                                    }
                                                }

                                                ?>


                                            </div><!-- /.col -->
                                        </div>


                                        <!-- <form action="" method="post">
                                            <div class="alert alert-dark" role="alert">
                                                Selamat, Anda Menang Undian bulan ini
                                                <button name="close" type="submit" class="btn btn-danger text-white float-right" data-dismiss="alert">
                                                    &times;
                                                </button>

                                            </div>
                                        </form> -->

                                        <?php
                                        if (isset($_POST['close'])) {
                                            $id_user = $_GET['id'];
                                            $sql = mysqli_query($koneksi, "UPDATE users  SET pesan = 0 WHERE id_user='$id_user'");
                                        }
                                        ?>

                                        <?php

                                        $query = mysqli_query($koneksi, "SELECT * FROM users
                                        INNER JOIN kelompok
                                        ON users.id_kelompok = kelompok.id_kelompok
                                        WHERE username='$_SESSION[username]'
                                        ");
                                        // menghitung jumlah data yang ditemukan
                                        $cek = mysqli_num_rows($query);
                                        if (mysqli_num_rows($query) == 1) {
                                            $data = mysqli_fetch_assoc($query);

                                            if ($data['ikut'] == "Terima") {
                                                $message = '<div class="rounded ikut text-white text-center p-2" style="background-color: #1a667e;">
                                                <h3>Anda sedang mengikuti kelompok ' . $data["nama_kelompok"] . '</h3>
                                                </div>';
                                                echo $message;
                                            } elseif ($data['ikut'] == "Pending") {
                                                $message2 = '<div class="ikut text-white text-center p-2 bg-warning rounded">
                                                <h3>Anda telah mendaftar kelompok ' . $data["nama_kelompok"] . ' dengan status menunggu konfirmasi admin</h3>
                                                </div>';
                                                echo $message2;
                                            } else {
                                                $message2 = '<div class="ikut rounded text-white text-center p-2" style="background-color: #1a667e;">
                                                <h3>Anda tidak mengikuti kelompok manapun</h3>
                                                </div>';
                                                echo $message2;
                                            }
                                        } else {
                                            $message2 = '<div class="ikut text-white text-center p-2" style="background-color: #1a667e;">
                                            <h3>Anda tidak mengikuti kelompok manapun</h3>
                                            </div>';
                                            echo $message2;
                                        }

                                        // $anggota = mysqli_fetch_array($query);

                                        ?>

                                        <script>
                                            var countDownDate = <?php echo strtotime('+31 days', strtotime($data['tanggal_mulai'])) ?> * 1000;
                                            var now = <?php echo time() ?> * 1000;


                                            var x = setInterval(function() {

                                                now = now + 1000;


                                                var distance = countDownDate - now;


                                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                                                document.getElementById("demo").innerHTML = days + " Hari " + hours + " Jam " +
                                                    minutes + " Menit " + seconds + " Detik ";

                                                if (distance < 0) {
                                                    clearInterval(x);
                                                    document.getElementById("demo").innerHTML = "Waktunya undian";
                                                }
                                            }, 1000);
                                        </script>
                                    </div>


                                    <div class="row mt-3 justify-content-center ">
                                        <div class="col-sm-5 text-center">
                                            <div class="rounded  p-3" style="background-color: #1a667e;">
                                                <h1 class="badge rounded-pill text-white" id="demo"></h1>
                                                <h3 class="text-white">Menuju waktu undian</h3>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>

        </div>






        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php'); ?>