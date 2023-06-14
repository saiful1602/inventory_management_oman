<?php   

include("../../../DBconfig.php");

	$txtInvoice=$_POST['txtInvoice'];
	$costDetails=$_POST['costDetails'];
	$txtAmount=$_POST['txtAmount'];
	$datepicker=$_POST['datepicker'];

	$query="UPDATE `saqar_cost_entry` SET `cost_details`='$costDetails',`amount`='$txtAmount',`date`='$datepicker'
			 WHERE `invoice_no`='$txtInvoice'";
	$q=mysqli_query($con, $query);
	


?>
