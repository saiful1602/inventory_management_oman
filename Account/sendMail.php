<?php
include("../DBconfig.php");
	$txtEmail=$_POST['txtEmail'];
	$arr="";
	$loginQuery="SELECT *FROM `accounts` WHERE `email`='$txtEmail' LIMIT 1";
	$result=mysqli_query($con, $loginQuery);


	if(mysqli_num_rows($result) > 0){
		$row=mysqli_fetch_assoc($result);
		$email=$row['email'];
		$username=$row['username'];
		$password=$row['password'];

		$to_email = $email;
		$subject = "Username/password Recover";
		$body = "                Your Username: $username
		Your Password: $password";
		$headers = "From: sayed@alibinmohammed.com";
		$arr = array('status' => 'success', 'message' => 'Send Mail Successfull');
		mail($to_email, $subject, $body, $headers);

		}
		else{
		$arr = array('status' => 'error', 'message' => 'Invalid Email');
		}

		
		
		echo json_encode($arr);
	
	
?>