<?php   

include("../../../DBconfig.php");

	$txtInvoice=$_POST['txtInvoice'];
	$cusAddress=$_POST['cusAddress'];
	$cusName=$_POST['cusName'];
	$txtAmount=$_POST['txtAmount'];
	$txtProfit=$_POST['txtProfit'];
	$txtReason=$_POST['txtReason'];
	$date=$_POST['datepicker'];

	$query="UPDATE `customer_collection` SET `customer_address`='$cusAddress',`customer_name`='$cusName',`amount`='$txtAmount',
		   `profit`='$txtProfit',`reason`='$txtReason',`date`='$date' WHERE `invoice_no`='$txtInvoice'";
	$q=mysqli_query($con, $query);
	


?>
