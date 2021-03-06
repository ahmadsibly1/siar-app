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
    <div class="content-wrapper mt-4">

      <!-- Main content -->
      <section class="content" style="margin-top: 80px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Saldo</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="saldo" class="table table-striped">
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
                    $query = mysqli_query($koneksi, "SELECT * FROM saldo
                                                      RIGHT JOIN pembayaran 
                                                      ON saldo.id_pembayaran = pembayaran.id_pembayaran
                                                      RIGHT JOIN kelompok 
                                                      ON saldo.id_kelompok = kelompok.id_kelompok
                                                      ");
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
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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