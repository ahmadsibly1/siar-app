<?php
$abc = "Abc";
$number = 052;
$mydata = array("val1", "val2", "val3");
?>
<script type="text/javascript">
    var abc = '<?php echo $abc ?>';
    var number = '<?php echo $number ?>';
    var mydata = <?php echo json_encode($mydata); ?>;
</script>