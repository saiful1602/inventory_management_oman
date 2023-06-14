<?php   

include("../../DBconfig.php");

	$selectName=$_POST['selectName'];
	$partsName=$_POST['partsName'];

	$query="UPDATE `parts_setup` SET `parts_name`='$partsName' WHERE `parts_name`='$selectName'";
	$q=mysqli_query($con, $query);

	$query2="UPDATE `purchased_product` SET `parts_name`='$partsName' WHERE `parts_name`='$selectName'";
	$q2=mysqli_query($con, $query2);

	$query3="UPDATE `parts_sales` SET `parts_name`='$partsName' WHERE `parts_name`='$selectName'";
	$q3=mysqli_query($con, $query3);

	$query4="UPDATE `stock_item` SET `parts_name`='$partsName' WHERE `parts_name`='$selectName'";
	$q4=mysqli_query($con, $query4);


	
?>