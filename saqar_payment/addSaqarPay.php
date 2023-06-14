<?php   

include("../DBconfig.php");


	$invoice=$_POST['txtInvoice'];
	$carryVia=$_POST['carryVia'];
	$txtAmnt=$_POST['txtAmnt'];
	$date=$_POST['dt'];
	$query="insert into `saqar_payment`(`invoice_no`,`carry_via`,`amount`,`date`)values('$invoice','$carryVia','$txtAmnt','$date')";
	$q=mysqli_query($con, $query);


	

?>
