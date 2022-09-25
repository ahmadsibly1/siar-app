<?php $title = "home";

include('header.php'); ?>
<?php include('../../conf/config.php'); ?>
<?php
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:../../index.php");
}

?>

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
    <div class="content-wrapper" style="margin-top: 60px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="dashborad-admin rounded">
                <h1 name="nama_user" class="m-1">Selamat Datang <?= $_SESSION['username']; ?>!</h1>
                <p class="m-1">Di Sistem Informasi Arisan RT 01 RW 07 Kelurahan Lengkong wetan</p>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row mb-3">
            <div class="col-sm-4">
              <div class="info-box">
                <span class="info-box-icon" style="background-color: #e65100; color:#ffffff; --fa-animation-duration: 2s;"><i class="fa-solid fa-user fa-beat"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Anggota</span>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM users WHERE level='user'");
                  $data = mysqli_num_rows($query);
                  ?>
                  <span class="info-box-number"><?= $data; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info-box">
                <span class="info-box-icon" style="background-color: #e65100; color:#ffffff; --fa-animation-duration: 2s;"><i class="fas fa-solid fa-users fa-beat"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Kelompok</span>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM kelompok");
                  $data = mysqli_num_rows($query);
                  ?>
                  <span class="info-box-number"><?= $data; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info-box">
                <span class="info-box-icon" style="background-color: #e65100; color:#ffffff; --fa-animation-duration: 2s;"><i class="fas fa-solid fa-dollar-sign fa-beat"></i></span>

                <div class="info-box-content">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM pembayaran");
                  $data = mysqli_num_rows($query);
                  $total = mysqli_fetch_array($query);
                  ?>
                  <span class="info-box-text">Total Saldo</span>
                  <span class="info-box-number"> Rp. <?= number_format($total['total']); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </div>
            <!-- <div class="col-sm-3">
              <div class="info-box">
                <span class="info-box-icon" style="background-color: #e65100; color:#ffffff; --fa-animation-duration: 2s;"><i class="far fa-envelope fa-beat"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Messages</span>
                  <span class="info-box-number">1,410</span>
                </div>
               
              </div>
            </div> -->
          </div>
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_kelompok > 0 AND ikut = 'Pending'");
          while ($data = mysqli_fetch_array($query)) {
            # code...
          ?>
            <div class="row mb-2">
              <div class="col-sm-12">

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong><?= $data['nama_user']; ?></strong> Telah bergabung kelompok, segera tinjau untuk konfirmasi.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                </div>
              </div><!-- /.col -->
            </div>
          <?php  } ?>


          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN users ON pembayaran.id_user = users.id_user WHERE status_pembayaran = 'Pending'");
          while ($data = mysqli_fetch_array($query)) {
            # code...
          ?>
            <div class="row mb-1">
              <div class="col-sm-12">

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong><?= $data['nama_user']; ?></strong> Telah melakukan pembayaran bulan ke <?= $data['bulan']; ?>, segera tinjau untuk konfirmasi.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                </div>
              </div><!-- /.col -->
            </div>
          <?php  } ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <!-- /.content -->
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php include('footer.php'); ?>