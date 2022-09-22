<?php $title = "Saldo";

include('header.php'); ?>
<?php include('../../conf/config.php'); ?>
<?php session_start();
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
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <div class="card-header justify-content-between">
                  <div class="card-title">
                    <div class=" d-flex">
                      <h4 class="">Pembayaran</h4>
                    </div>
                  </div>
                  <button type="button" class="btn btn-info mb-3 float-right" data-toggle="modal" data-target="#tambah-pembayaran">
                    Tambah Pembayaran
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kelompok</th>
                          <th>Saldo</th>
                          <th>Bulan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php
                      $no = 0;
                      $totalSaldo = 0;
                      // $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN users ON pembayaran.id_pembayaran = users.id_user");
                      $query = mysqli_query($koneksi, "SELECT * FROM pembayaran 
                                                      INNER JOIN kelompok 
                                                      ON pembayaran.id_kelompok = kelompok.id_kelompok
                                                      Group BY pembayaran.id_kelompok");
                      while ($saldo = mysqli_fetch_array($query)) {
                        $no++

                      ?>
                        <?php  ?>
                        <tbody>
                          <tr>
                            <td><?= $no; ?></td>
                            <td><?= $saldo['nama_kelompok']; ?></td>
                            <td><?= $saldo['jumlah']; ?></td>
                            <td><?= $saldo['bulan']; ?></td>
                            <td>X</td>
                          </tr>
                        </tbody>
                      <?php } ?>
                    </table>
                  </div>
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










  <!-- titip -->
  <button type="button" class="btn btn-info mb-3 " data-toggle="modal" data-target="#tambah-kelompok">
    Tambah Pembayaran
  </button>