<table id="myTable" class="table table-md table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelompok</th>
            <th>Waktu Undian</th>
            <th>Countdown</th>
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
                <td width='20%'><?= $kelompok['nama_kelompok']; ?></td>
                <td><?= date('d-m-Y', strtotime($kelompok['tanggal_mulai'])); ?></td>
                <td>
                    <p id="demo"></p>
                </td>
                <script>
                    var countDownDate = <?php echo strtotime($kelompok['tanggal_mulai']) ?> * 1000;
                    var now = <?php echo time() ?> * 1000;


                    var x = setInterval(function() {

                        now = now + 1000;


                        var distance = countDownDate - now;


                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                        document.getElementById("demo").innerHTML = days + " Hari " + hours + "Jam " +
                            minutes + "Menit " + seconds + "Detik ";

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