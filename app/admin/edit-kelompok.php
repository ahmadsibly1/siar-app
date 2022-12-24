<?php $title = "Edit Kelompok"; ?>
<?php include('header.php'); ?>
<?php include('../../conf/config.php'); ?>


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
      <section class="content" style="margin-top: 80px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <div class="card-header bg-dark">
                  <div class="card-title">
                    <div class="d-flex justify-content-center">
                      <h3>Edit Kelompok</h3>
                    </div>
                  </div>
                </div>

                <!-- /.card-header -->


                <?php
                $id_kelompok = $_GET['id_kelompok'];
                $query = mysqli_query($koneksi, "SELECT * FROM kelompok WHERE id_kelompok=$id_kelompok");
                $kelompok = mysqli_fetch_array($query)

                ?>
                <form action="update/update-kelompok.php" method="GET">
                  <div class="card-body">
                    <div class="row mb-3">
                      <input type="hidden" class="form-control" id="id_kelompok" name="id_kelompok" value="<?= $kelompok['id_kelompok']; ?>">
                      <label for="nama_kelompok" class="col-sm-2 col-form-label">Nama kelompok</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" value="<?= $kelompok['nama_kelompok']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                      <div class="col-sm-10">
                        <input class="form-control form-control" type="text" name="tanggal_mulai" value=" <?= $kelompok['tanggal_mulai']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="kuota" class="col-sm-2 col-form-label">Kuota</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kuota" name="kuota" value=" <?= $kelompok['kuota']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="jumlah_iuran" class="col-sm-2 col-form-label">Jumlah Iuran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah_iuran" name="jumlah_iuran" value=" <?= $kelompok['jumlah_iuran']; ?>">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">simpan</button>
                  </div>
                </form>
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
                <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="notelephone" class="col-sm-2 col-form-label">No HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="notelephone" name="notelephone" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nik" name="nik" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tangallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input class="form-control form-control" type="date" name="tanggallahir" placeholder="Tanggal Lahir" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for=alamat_user" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input class="form-control form-control" type="text" name="alamat_user" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="agama" name="agama" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="exampleInputFile" class="col-sm-2 col-form-label">Upload KTP</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="ktp" class="custom-file-input" id="exampleInputFile" required>
                        <label class="custom-file-label" for="exampleInputFile"></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jenispekerjaan" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jenispekerjaan" name="jenispekerjaan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="notelpperusahaan" class="col-sm-2 col-form-label">No Telp Perusahaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="notelpperusahaan" name="notelpperusahaan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="alamatperusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamatperusahaan" name="alamatperusahaan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jumlahgaji" class="col-sm-2 col-form-label">Jumlah Gaji</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jumlahgaji" name="jumlahgaji" required>
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