<?php   

include("../DBconfig.php");


	$fID=$_POST['fID'];
	$customerName=$_POST['customerName'];
	$customerMobile=$_POST['customerMobile'];
	$customerAddress=$_POST['customerAddress'];
	$oldAmount=$_POST['oldAmount'];

	$query="INSERT INTO `customer_setup` (`id`,`customer_name`,`customer_mobile`,`customer_address`,`old_amount`) VALUES ('$fID','$customerName','$customerMobile','$customerAddress','$oldAmount')";
	mysqli_query($con, $query);


	

?>
