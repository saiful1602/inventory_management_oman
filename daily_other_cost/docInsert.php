<?php   

include("../DBconfig.php");


	$fID=$_POST['fID'];
	$invoice=$_POST['txtInvoice'];
	$costName=$_POST['costName'];
	$costAmount=$_POST['costAmount'];
	$date=$_POST['dt'];
	$query="insert into `daily_other_cost`(`id`,`invoice_no`,`cost_name`,`cost_amount`,`date`)values('$fID','$invoice','$costName','$costAmount','$date')";
	$q=mysqli_query($con, $query);


	

?>
