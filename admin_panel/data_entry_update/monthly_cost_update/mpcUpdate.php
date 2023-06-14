<?php   

include("../../../DBconfig.php");

	$txtInvoice=$_POST['txtInvoice'];
	$costName=$_POST['costName'];
	$txtReason=$_POST['txtReason'];
	$costAmount=$_POST['costAmount'];
	$datepicker=$_POST['datepicker'];

	$query="UPDATE `monthly_profit_cost` SET `cost_name`='$costName',`reason`='$txtReason',`cost_amount`='$costAmount',`date`='$datepicker'
			 WHERE `invoice_no`='$txtInvoice'";
	$q=mysqli_query($con, $query);
	


?>
