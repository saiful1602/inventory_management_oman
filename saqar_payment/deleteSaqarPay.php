<?php   

include("../DBconfig.php");

	$invoice= $_POST['txtInvoice'];

	$query="DELETE FROM `saqar_payment` WHERE `invoice_no`='$invoice'";
	$q=mysqli_query($con, $query);

	

?>
