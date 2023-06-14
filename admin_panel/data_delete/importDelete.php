<?php   

include("../../DBconfig.php");

	$formSelect= $_POST['formSelect'];
	$InvoiceID= $_POST['InvoiceID'];


	$query="DELETE FROM `purchased_product` WHERE `invoice_no`='$InvoiceID'";
	$q=mysqli_query($con, $query);

	$query2="DELETE FROM `stock_item` WHERE `invoice_no`='$InvoiceID'";
	$q2=mysqli_query($con, $query2);

?>