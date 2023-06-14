<?php   

include("../DBconfig.php");


		$id=$_POST['id'];

		$query="DELETE FROM `purchase_import` WHERE `sl`=".$id;
		mysqli_query($con, $query);
		
	

?>