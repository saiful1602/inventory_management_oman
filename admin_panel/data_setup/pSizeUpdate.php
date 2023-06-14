<?php   

include("../../DBconfig.php");

	$selectSize=$_POST['selectSize'];
	$partsSize=$_POST['partsSize'];

	$query="UPDATE `parts_setup` SET `parts_size`='$partsSize' WHERE `parts_size`='$selectSize'";
	$q=mysqli_query($con, $query);

	$query2="UPDATE `purchased_product` SET `size`='$partsSize' WHERE `size`='$selectSize'";
	$q2=mysqli_query($con, $query2);

	$query3="UPDATE `parts_sales` SET `size`='$partsSize' WHERE `size`='$selectSize'";
	$q3=mysqli_query($con, $query3);

	$query4="UPDATE `stock_item` SET `size`='$partsSize' WHERE `size`='$selectSize'";
	$q4=mysqli_query($con, $query4);


	
?>