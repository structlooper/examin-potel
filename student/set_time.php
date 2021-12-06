<?php 
require_once '../includes/config.php';


$from_time1 = date('Y-m-d H:i:s');
$to_time = $_SESSION['end_time'];

$timefirst = strtotime($from_time1);
echo "<br>";
$timesecond = strtotime($to_time);

$differenceInseconds = $timesecond - $timefirst;
//echo gmdate("H:i:s",$differenceInseconds);

?>