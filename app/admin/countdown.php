<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Creating Dynamic Countdown in PHP Example - Mywebtuts.com</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Poppins fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: 'Poppins', sans-serif;
        }

        #counter {
            width: 410px;
            background: #ff190b;
            box-shadow: 0px 2px 9px 0px black;
        }
    </style>
</head>

<body>



    <table id=" example1" class="table table-sm table-bordered table-striped" style="font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelompok</th>
                <th>Waktu Undian</th>
                <th>Jumlah Anggota</th>
                <th>Countdown</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Database Connection
            $mysqli = mysqli_connect('localhost', 'root', '', 'siarapp');

            $result = mysqli_query($mysqli, "SELECT * FROM kelompok ORDER BY id_kelompok DESC");
            $no = 0;
            while ($res = mysqli_fetch_array($result)) {
                $dat = $res['tanggal_mulai'];
                $date = date('Y-m-d', strtotime('+7 days', strtotime($dat)));
                $time = '00:00:00';
                $no++;

            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td width='20%'><?= $res['nama_kelompok']; ?></td>
                    <td><?= date('d-m-Y', strtotime($res['tanggal_mulai'])); ?></td>
                    <td><?= $res['tipe_arisan']; ?></td>
                    <td>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Script -->
    <script>
        <?php
        $data = strtotime($date);
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

</body>

</html>