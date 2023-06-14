<?php   

include("../DBconfig.php");

	$id= $_POST['id'];

	$query="DELETE FROM `daily_other_cost` WHERE `invoice_no`=".$id;
	$q=mysqli_query($con, $query);

	
?>

