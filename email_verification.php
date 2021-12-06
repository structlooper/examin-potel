<?php
include 'includes/config.php';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$sql=mysqli_query($con,"SELECT * FROM user WHERE activationcode='$code'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$st=0;
$result =mysqli_query($con,"SELECT id FROM user WHERE activationcode='$code' and status='$st'");
$result4=mysqli_fetch_array($result);
if($result4>0)
 {
$st=1;
$result1=mysqli_query($con,"UPDATE user SET status='$st' WHERE activationcode='$code'");
$msg="Your account is activated";
}
else
{
$msg ="Your account is already active, no need to activate again";
}
}
else
{
$msg ="Wrong activation code.";
}
}
?>