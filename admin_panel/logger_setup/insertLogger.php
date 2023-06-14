<?php   

include("../../DBconfig.php");


	$fID=$_POST['fID'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$txtEmail=$_POST['txtEmail'];
	$txtUserName=$_POST['txtUserName'];
	$txtPassword=$_POST['txtPassword'];

	$query="INSERT INTO `accounts`(`id`,`first_name`,`last_name`,`email`,`username`,`password`)VALUES('$fID','$firstName','$lastName','$txtEmail','$txtUserName','$txtPassword')";
	$q=mysqli_query($con, $query);


	

?>
