<?php   

include("../../DBconfig.php");

	$selectCostName=$_POST['selectCostName'];
	$costName=$_POST['costName'];

	$query="UPDATE `monthly_cost_setup` SET `cost_name`='$costName' WHERE `cost_name`='$selectCostName'";
	mysqli_query($con, $query);

	$query2="UPDATE `monthly_profit_cost` SET `cost_name`='$costName' WHERE `cost_name`='$selectCostName'";
	mysqli_query($con, $query2);

	
?>