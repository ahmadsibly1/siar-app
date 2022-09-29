<?php $title = "Undian Arisan"; ?>
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
      <div class="content-wrapper" style="margin-top: 60px;">

         <!-- Main content -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <div class="card-title">
                              <h4>Undian</h4>
                           </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                           <div class="table-responsive">
                              <table id="myTable" class="table table-md table-striped">
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>Nama Kelompok</th>
                                       <th>Jumlah Anggota</th>
                                       <th>Waktu Undian</th>
                                       <th>Aksi</th>
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
                                          <td><?= $kelompok['nama_kelompok']; ?></td>
                                          <td><?= $kelompok['isi']; ?> Anggota</td>
                                          <td><?= date('1 F Y', strtotime('+31 days', strtotime($kelompok['tanggal_mulai']))); ?></td>

                                          <script>
                                             var countDownDate = <?php echo strtotime('+31 days', strtotime($kelompok['tanggal_mulai'])) ?> * 1000;
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

                                          <td>
                                             <a type="button" class="btn btn-sm btn-info" href="detail-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>">
                                                <i class="bi bi-eye-fill">Anggota</i>
                                             </a>
                                             <a href="kocok/undi-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>" class=" btn btn-sm btn-success">
                                                <i class="bi bi-pen">Undi</i>
                                             </a>
                                             <!-- modal target -->
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
                     <div class="row mb-3 justify-content-center ">
                        <div class="col-sm-5 text-center">
                           <div class="rounded  p-3" style="background-color: #1a667e;">
                              <h1 class="badge rounded-pill text-white" id="demo"></h1>
                              <h3 class="text-white">Menuju waktu undian</h3>
                           </div>
                        </div><!-- /.col -->
                     </div><!-- /.row -->

                     <!-- <button type="button" class="btn btn-info justify-content-center" data-toggle="modal" data-target="#modal-lg">
                        UNDI KELOMPOK
                     </button> -->

                     <!-- Modal UNDIAN -->
                     <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">Pilih data yang akan diundi</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form action="kocok/undi-kelompok.php" method="POST">
                                 <div class="card-body">
                                    <div class="card-body">
                                       <div class="row mb-3">
                                          <label for="jeniskelamin" class="col-sm-2 col-form-label">Kelompok</label>
                                          <div class="col-sm-10">
                                             <div class="input-grup">
                                                <select class="form-select form-control" aria-label="Default select example" id="jeniskelamin" name="jeniskelamin" placeholder="*" required>
                                                   <option selected>...Pilih...</option>
                                                   <?php
                                                   $query = mysqli_query($koneksi, "SELECT * FROM kelompok");
                                                   while ($kelompok = mysqli_fetch_array($query)) {
                                                   ?>
                                                      <option value="Laki-laki"><?= $kelompok['nama_kelompok']; ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row mb-3">
                                          <label for="agama" class="col-sm-2 col-form-label">Bulan</label>
                                          <div class="col-sm-10">
                                             <div class="input-grup">
                                                <select class="form-select form-control" aria-label="Default select example" id="agama" name="agama">
                                                   <option selected>...Pilih...</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                   <option value="11">11</option>
                                                   <option value="12">12</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- /.card-body -->

                                       <button type="submit" class="btn btn-primary">Lanjut</button>

                              </form>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->

         </section>
         <!-- /.content -->
      </div>



      <!-- Script -->



      <!-- edit kelompok -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   <?php include('footer.php'); ?>