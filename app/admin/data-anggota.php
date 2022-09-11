<?php $title = "Data Anggota"; ?>
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
    <div class="content-wrapper mt-4">

      <!-- Main content -->
      <section class="content" style="margin-top: 80px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="">Data Anggota</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-responsive-md table-striped" style="font-size: 13px;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>KTP</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>HP</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      $query = mysqli_query($koneksi, "SELECT * FROM users WHERE level ='user' ORDER BY id_user DESC");
                      while ($anggota = mysqli_fetch_array($query)) {
                        $no++
                      ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td width='13%'><?= $anggota['nama_user']; ?></td>
                          <td>
                            <a href="../../conf/img/<?= $anggota['ktp']; ?>">
                              <img src="../../conf/img/<?= $anggota['ktp']; ?>" alt="" width="60px">
                            </a>
                          </td>
                          <td><?= $anggota['jenis_kelamin']; ?></td>
                          <td><?= $anggota['tempat_lahir']; ?></td>
                          <td><?= date('d-m-Y', strtotime($anggota['tanggal_lahir'])); ?></td>
                          <td><?= $anggota['no_telp']; ?></td>
                          <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg<?= $anggota['id_user']; ?>">
                              <i class="bi bi-eye-fill"></i>
                            </button>
                            <!-- modal target -->
                            <div class="modal fade" id="modal-lg<?= $anggota['id_user']; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Detail Data Anggota</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 col-form-label">Nama</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?= $anggota['nama_user']; ?>" aria-label="readonly input example" readonly>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 col-form-label">No HP</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?= $anggota['no_telp']; ?>" aria-label="readonly input example" readonly>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 col-form-label">NIK</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?= $anggota['nik']; ?>" aria-label="readonly input example" readonly>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?= $anggota['tempat_lahir']; ?>" aria-label="readonly input example" readonly>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?= date('d-m-Y', strtotime($anggota['tanggal_lahir'])); ?>" aria-label="readonly input example" readonly>
                                      </div>
                                    </div>

                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?= $anggota['jenis_kelamin']; ?>" aria-label="readonly input example" readonly>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 col-form-label">Agama</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?= $anggota['agama']; ?>" aria-label="readonly input example" readonly>
                                      </div>
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

                            <a href="hapus/hapus_anggota.php?id=<?= $anggota['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="bi bi-trash"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
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

    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Tambah Data Anggota</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="tambah/tambah-anggota.php" method="GET">
            <div class="card-body">
              <div class="card-body">
                <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="notelephone" class="col-sm-2 col-form-label">No HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="notelephone" name="notelephone" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tangallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input class="form-control form-control" type="date" name="tanggallahir" placeholder="Tanggal Lahir" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for=alamat_user" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input class="form-control form-control" type="text" name="alamat_user" placeholder="*" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <div class="input-grup">
                      <select class="form-select form-control" aria-label="Default select example" id="jeniskelamin" name="jeniskelamin" placeholder="*" required>
                        <option selected>...Pilih...</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <div class="input-grup">
                      <select class="form-select form-control" aria-label="Default select example" id="agama" name="agama">
                        <option selected>...Pilih...</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="exampleInputFile" class="col-sm-2 col-form-label">Upload KTP</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="ktp" class="custom-file-input" id="exampleInputFile" placeholder="*" required>
                        <label class="custom-file-label" for="exampleInputFile"></label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                  <a href="daata-anggota.php" type="submit" class="btn btn-default float-right">Cancel</a>
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