<?php $title = "Data Kelompok"; ?>
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

      <div class="container-fluid">
        <div class="row mb-2 mt-3">
          <div class="col-sm-12">
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                      <div class="card-header">
                        <div class="card-title">
                          <div class="d-flex justify-content-center">
                            <h3>Data Kelompok</h3>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body ">
                        <button type="button" class="btn btn-info mb-3 " data-toggle="modal" data-target="#tambah-kelompok">
                          Tambah Kelompok
                        </button>
                        <div class="table-responsive">
                          <table id=" example1" class="table table-sm table-striped" style="font-size: 13px;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Kelompok</th>
                                <th>Tanggal Mulai</th>
                                <th>Jenis</th>
                                <th>Kuota</th>
                                <th>Terisi</th>
                                <th>Jumlah Iuran</th>
                                <th width="17%">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 0;
                              $query = mysqli_query($koneksi, "SELECT * FROM kelompok");
                              while ($kelompok = mysqli_fetch_array($query)) {
                                $no++
                              ?>
                                <tr>
                                  <td><?= $no; ?></td>
                                  <td width='20%'><?= $kelompok['nama_kelompok']; ?></td>
                                  <td><?= date('d-m-Y', strtotime($kelompok['tanggal_mulai'])); ?></td>
                                  <td><?= $kelompok['tipe_arisan']; ?></td>
                                  <td><?= $kelompok['kuota']; ?></td>
                                  <td><?= $kelompok['isi']; ?></td>
                                  <td><?= rupiah($kelompok['jumlah_iuran']); ?></td>
                                  <td>
                                    <a type="button" class="btn btn-info" href="detail-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>">
                                      <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="edit-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>"" class=" btn btn-success">
                                      <i class="bi bi-pen"></i>
                                    </a>
                                    <!-- modal target -->
                                    <div class="modal fade" id="detail-kelompok<?= $kelompok['id_kelompok']; ?>">
                                      <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Detail Anggota Kelompok</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="table-responsive">
                                              <table class="table table-sm table-striped" style="font-size: 18px; text-align:center;">
                                                <thead>
                                                  <td style="font-weight:700">Nama Anggota</td>
                                                </thead>
                                                <tbody>
                                                  <td>nama user</td>
                                                </tbody>
                                              </table>
                                            </div>

                                            <!-- Jam Countdown -->
                                            <div style="padding-left:350px">
                                              <br>

                                              <div id="jam<?= $kelompok['id_kelompok']; ?>"></div>
                                              <?php
                                              $date_pendaftaran = date($kelompok['tanggal_mulai']);
                                              $date = date('Y-m-d', strtotime('+6 days', strtotime($date_pendaftaran))); //operasi penjumlahan tanggal sebanyak 6 hari
                                              $time = date('00:00:00');
                                              $date_today = $date . ' ' . $time;
                                              ?>
                                              <script>
                                                // Set the date we're counting down to
                                                var count_id = "<?php echo $date_today; ?>";
                                                var countDownDate = new Date(count_id).getTime();

                                                // Update the count down every 1 second
                                                var x = setInterval(function() {

                                                  // Get today's date and time
                                                  var now = new Date().getTime();

                                                  // Find the distance between now and the count down date
                                                  var distance = countDownDate - now;

                                                  // Time calculations for days, hours, minutes and seconds
                                                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                  // Output the result in an element with id="demo"
                                                  document.getElementById("jam<?= $kelompok['id_kelompok']; ?>").innerHTML = days + " Hari " + hours + "Jam " +
                                                    minutes + "Menit " + seconds + "Detik ";

                                                  // If the count down is over, write some text 
                                                  if (distance < 0) {
                                                    clearInterval(x);
                                                    document.getElementById("jam<?= $kelompok['id_kelompok']; ?>").innerHTML = "Waktunya Undian Arisan";
                                                  }
                                                }, 1000);
                                              </script>
                                            </div>

                                          </div>
                                          <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>



                                    <a href="hapus/hapus-kelompok.php?id=<?= $kelompok['id_kelompok']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="bi bi-trash"></i></a>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
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
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    <!-- tambah kelompok -->
    <div class="modal fade" id="tambah-kelompok">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Tambah Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="tambah/tambah-kelompok.php" method="POST">
            <div class="card-body">
              <div class="row mb-3">
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="id">
                <label for="nama_kelompok" class="col-sm-2 col-form-label">Nama kelompok</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-10">
                  <input class="form-control form-control" type="date" name="tanggal_mulai" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for=tipe_arisan" class="col-sm-2 col-form-label">Tipe Arisan</label>
                <div class="col-sm-10">
                  <input class="form-control form-control" type="text" name="tipe_arisan" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="kuota" class="col-sm-2 col-form-label">Kuota</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="kuota" name="kuota" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="isi" name="isi" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="jumlah_iuran" class="col-sm-2 col-form-label">Jumlah Iuran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jumlah_iuran" name="jumlah_iuran" required>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Buat</button>
              <a href="data-kelompok.php" type="submit" class="btn btn-default float-right">Cancel</a>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    <!-- edit kelompok -->
    <div class="modal fade" id="edit-kelompok">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Tambah Kelompok</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST">
            <div class="card-body">
              <div class="row mb-3">
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="id">
                <label for="nama_kelompok" class="col-sm-2 col-form-label">Nama kelompok</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-10">
                  <input class="form-control form-control" type="date" name="tanggal_mulai" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for=tipe_arisan" class="col-sm-2 col-form-label">Tipe Arisan</label>
                <div class="col-sm-10">
                  <input class="form-control form-control" type="text" name="tipe_arisan" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="kuota" class="col-sm-2 col-form-label">Kuota</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="kuota" name="kuota" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="isi" name="isi" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="jumlah_iuran" class="col-sm-2 col-form-label">Jumlah Iuran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jumlah_iuran" name="jumlah_iuran" required>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Buat</button>
              <a href="data-kelompok.php" type="submit" class="btn btn-default float-right">Cancel</a>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>





    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php include('footer.php'); ?>