<?php
include('../DBconfig.php');
$id=$_SESSION['admin_id'];
$time=time()+10;
$time2 = time();
if(!isset($_SESSION['admin_id'])){
  header('Location: Account/Login.php');
}else{
	$query="UPDATE `admin_panel` SET `time`='$time',`last_login`='$time2' WHERE `admin_id`='$id'";
	$result=mysqli_query($con, $query);
}

?>