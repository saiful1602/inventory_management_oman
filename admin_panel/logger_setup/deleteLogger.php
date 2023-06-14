<?php   

include("../../DBconfig.php");

	$id= $_POST['id'];

	$query="DELETE FROM `accounts` WHERE `id`='$id'";
	$q=mysqli_query($con, $query);

?>




