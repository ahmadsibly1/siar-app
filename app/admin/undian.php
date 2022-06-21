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
                                    <div class="table-responsive">
                                       <table id=" example1" class="table table-sm table-striped" style="font-size: 13px;">
                                          <thead>
                                             <tr>
                                                <th>No</th>
                                                <th>Nama Kelompok</th>
                                                <th>Waktu Undian</th>
                                                <th>Jumlah Anggota</th>
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
                                                   <td><?= $kelompok['tipe_arisan']; ?></td>
                                                   <td>
                                                      <!-- Jam Countdown -->
                                                      <div id="jam<?= $kelompok['id_kelompok']; ?>"></div>
                                                      <?php
                                                      $date_mulai = $kelompok['tanggal_mulai'];
                                                      $date = date('Y-m-d', strtotime('+6 days', strtotime($date_mulai))); //operasi penjumlahan tanggal sebanyak 6 hari
                                                      // echo $date;
                                                      // die();
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

                                                   </td>
                                                   <td>
                                                      <a type="button" class="btn btn-sm btn-info" href="detail-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>">
                                                         <i class="bi bi-eye-fill">Anggota</i>
                                                      </a>
                                                      <a href="edit-kelompok.php?id_kelompok=<?= $kelompok['id_kelompok']; ?>"" class=" btn btn-sm btn-success">
                                                         <i class="bi bi-pen">Edit</i>
                                                      </a>
                                                      <!-- modal target -->




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

      <!-- edit kelompok -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   <?php include('footer.php'); ?>