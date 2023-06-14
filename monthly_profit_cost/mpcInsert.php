<?php   

include("../DBconfig.php");


	$fID=$_POST['fID'];
	$invoice=$_POST['txtInvoice'];
	$costName=$_POST['costName'];
	$txtReason=$_POST['txtReason'];
	$costAmount=$_POST['costAmount'];
	$date=$_POST['dt'];
	$query="insert into `monthly_profit_cost`(`id`,`invoice_no`,`cost_name`,`reason`,`cost_amount`,`date`)values('$fID','$invoice','$costName','$txtReason','$costAmount','$date')";
	$q=mysqli_query($con, $query);


	

?>
