<?php   

include("../DBconfig.php");

	$id= $_POST['id'];

	$query="DELETE FROM `customer_collection` WHERE `invoice_no`=".$id;
	$q=mysqli_query($con, $query);

?>




