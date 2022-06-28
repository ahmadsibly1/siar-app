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
      <div class="content-wrapper mt-4">

         <!-- Main content -->
         <section class="content" style="margin-top: 80px;">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Undian</h3>
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
                                             <h1 id="counter" class="text-center mt-5 m-auto p-3 text-white"></h1>
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
      <!-- Contdown -->
      <!-- Script -->
      <script>
         <?php
         $data = strtotime($date);
         echo $data;
         die();
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