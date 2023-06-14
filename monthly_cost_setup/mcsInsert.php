<?php   

include("../DBconfig.php");

	$fID=$_POST['fID'];
	$costName=$_POST['costName'];

	$query="INSERT INTO `monthly_cost_setup` (`id`,`cost_name`) VALUES ('$fID','$costName')";
	mysqli_query($con, $query);


	

?>
