<?php   

include("../../DBconfig.php");

	$formSelect= $_POST['formSelect'];
	$InvoiceID= $_POST['InvoiceID'];


	$query="DELETE FROM `$formSelect` WHERE `invoice_no`='$InvoiceID'";
	$q=mysqli_query($con, $query);

?>