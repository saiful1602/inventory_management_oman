<?php   

include("../../DBconfig.php");

	$cusID=$_POST['cusID'];
	$cusName=$_POST['cusName'];
	$cusMobile=$_POST['cusMobile'];
	$cusAddress=$_POST['cusAddress'];
	$cusOldAmount=$_POST['cusOldAmount'];

	$query="SELECT `customer_name`,`customer_address` FROM `customer_setup` WHERE `id`='$cusID'";
	$q=mysqli_query($con, $query);
	$row=mysqli_fetch_assoc($q);

	$oldCusName=$row['customer_name'];
	$oldCusAddress=$row['customer_address'];

	$query2="UPDATE `customer_setup` SET `customer_name`='$cusName',`customer_mobile`='$cusMobile',`customer_address`='$cusAddress',
			`old_amount`= '$cusOldAmount' WHERE `id`='$cusID'";
	mysqli_query($con, $query2);

	$query3="UPDATE `parts_sales` SET `customer_name`='$cusName',`customer_address`='$cusAddress'
			 WHERE `customer_name`='$oldCusName' AND `customer_address`='$oldCusAddress' AND `sales_by`='Due'";
	mysqli_query($con, $query3);

	$query4="UPDATE `customer_collection` SET `customer_name`='$cusName',`customer_address`='$cusAddress'
			 WHERE `customer_name`='$oldCusName' AND `customer_address`='$oldCusAddress'";
	mysqli_query($con, $query4);
	
?>

