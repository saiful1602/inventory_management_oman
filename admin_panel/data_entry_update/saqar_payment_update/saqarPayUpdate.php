<?php   

include("../../../DBconfig.php");

	$txtInvoice=$_POST['txtInvoice'];
	$carryVia=$_POST['carryVia'];
	$txtAmount=$_POST['txtAmount'];
	$datepicker=$_POST['datepicker'];

	$query="UPDATE `saqar_payment` SET `carry_via`='$carryVia',`amount`='$txtAmount',`date`='$datepicker'
			 WHERE `invoice_no`='$txtInvoice'";
	$q=mysqli_query($con, $query);
	


?>
