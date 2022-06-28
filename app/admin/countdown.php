<?php
include('../../conf/config.php');


// Database Connection

$result = mysqli_query($koneksi, "SELECT * FROM kelompok");
while ($res = mysqli_fetch_array($result)) {
    $date = $res['tanggal_mulai'];
    $time = '00:00:00';
}
?>

<h1 id="counter" class="text-center mt-5 m-auto p-3 text-white"></h1>
<script>
    <?php
    $date = strtotime($date);
    die(var_dump($data));
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