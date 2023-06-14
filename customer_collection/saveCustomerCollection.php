<?php   

include("../DBconfig.php");


	$fID=$_POST['fID'];
	$invo=$_POST['invo'];
	$cusAddress=$_POST['cusAddress'];
	$cusName=$_POST['cusName'];
	$txtAmount=$_POST['txtAmnt'];
	$txtProfit=$_POST['txtProfit'];
	$txtReason=$_POST['txtReason'];
	$date=$_POST['dt'];

	$query="INSERT INTO `customer_collection`(`id`,`invoice_no`,`customer_address`,`customer_name`,`amount`,`profit`,`reason`,`date`)
			VALUES('$fID','$invo','$cusAddress','$cusName','$txtAmount','$txtProfit','$txtReason','$date')";
	$q=mysqli_query($con, $query);



	

?>
