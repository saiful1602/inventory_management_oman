<?php
include('../DBconfig.php');
$id=$_SESSION['id'];
$time=time()+10;
$time2 = time();
$query="UPDATE `accounts` SET `time`='$time',`last_login`='$time2' WHERE `id`='$id'";
$result=mysqli_query($con, $query);
?>