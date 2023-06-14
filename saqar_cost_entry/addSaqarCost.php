<?php   

include("../DBconfig.php");


	$invoice=$_POST['txtInvoice'];
	$costDetails=$_POST['costDetails'];
	$txtAmnt=$_POST['txtAmnt'];
	$date=$_POST['dt'];
	$query="insert into `saqar_cost_entry`(`invoice_no`,`cost_details`,`amount`,`date`)values('$invoice','$costDetails','$txtAmnt','$date')";
	$q=mysqli_query($con, $query);


	

?>
