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
                                       <th>Waktu Undian</th>
                                       <th>Countdown</th>
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
                                          <td>
                                             <h1 id="counter" class="text-center mt-5 m-auto p-3 text-white"></h1>
                                          </td>
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
      <script>
         <?php
         $data = strtotime($date);
         echo $data;

         $getDate = date("F d, Y", $data);
         ?>
         var countDownDate = new Date("<?php echo "$getDate $time"; ?>").getTime();
         // Update the count down every 1 second
         var x = setInterval(function() {
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="counter"11
            document.getElementById("counter").innerHTML = days + "Day : " + hours + "h " +
               minutes + "m " + seconds + "s ";
            // If the count down is over, write some text 
            if (distance < 0) {
               clearInterval(x);
               document.getElementById("counter").innerHTML = "EXPIRED";
            }
         }, 1000);
      </script>

      <!-- edit kelompok -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   <?php include('footer.php'); ?>