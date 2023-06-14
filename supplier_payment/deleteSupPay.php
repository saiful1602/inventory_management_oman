<?php   

include("../DBconfig.php");

	$id= $_POST['id'];

	$query="DELETE FROM `supplier_payment` WHERE `invoice_no`=".$id;
	$q=mysqli_query($con, $query);

	

?>


