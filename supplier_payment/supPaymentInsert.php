<?php   

include("../DBconfig.php");


	$fID=$_POST['fID'];
	$invo=$_POST['invo'];
	$supName=$_POST['supName'];
	$supAddress=$_POST['supAddress'];
	$txtAmount=$_POST['txtAmnt'];
	$txtReason=$_POST['txtReason'];
	$paymentBy=$_POST['paymentBy'];
	$date=$_POST['dt'];

	$query="INSERT INTO `supplier_payment`(`id`,`invoice_no`,`spName`,`spAddress`,`spAmount`,`reason`,`payment_by`,`date`)
			VALUES('$fID','$invo','$supName','$supAddress','$txtAmount','$txtReason','$paymentBy','$date')";
	$q=mysqli_query($con, $query);


	

?>
