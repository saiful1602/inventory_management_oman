<?php   

include("../../../DBconfig.php");

	$txtInvoice=$_POST['txtInvoice'];
	$supAddress=$_POST['supAddress'];
	$supName=$_POST['supName'];
	$txtAmount=$_POST['txtAmount'];
	$txtReason=$_POST['txtReason'];
	$paymentBy=$_POST['paymentBy'];
	$date=$_POST['datepicker'];

	$query="UPDATE `supplier_payment` SET `spAddress`='$supAddress',`spName`='$supName',`spAmount`='$txtAmount',
		   `reason`='$txtReason',`payment_by`='$paymentBy',`date`='$date' WHERE `invoice_no`='$txtInvoice'";
	$q=mysqli_query($con, $query);
	


?>
