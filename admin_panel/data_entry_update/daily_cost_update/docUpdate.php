<?php   

include("../../../DBconfig.php");

	$txtInvoice=$_POST['txtInvoice'];
	$costName=$_POST['costName'];
	$costAmount=$_POST['costAmount'];
	$datepicker=$_POST['datepicker'];

	$query="UPDATE `daily_other_cost` SET `cost_name`='$costName',`cost_amount`='$costAmount',`date`='$datepicker'
			 WHERE `invoice_no`='$txtInvoice'";
	$q=mysqli_query($con, $query);
	


?>
