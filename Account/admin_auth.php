<?php
include("../DBconfig.php");
include("UserInformation.php");
	$userName=$_POST['txtName'];
	$Password=$_POST['txtPassword'];

	$loginQuery="SELECT *FROM `admin_panel` WHERE `admin_user`='$userName' AND `password`='$Password' LIMIT 1";
	$result=mysqli_query($con, $loginQuery);

	if(mysqli_num_rows($result) > 0){
		$row=mysqli_fetch_assoc($result);
		$date = date("d-m-Y h:i:sa");
		$device = UserInfo::get_device();
		$_SESSION['admin_id'] = $row['admin_id'];
		$arr = array('status' => 'success', 'message' => 'Login Successfull');
		$to_email = "supersaiful19@gmail.com";
		$subject = " Admin login";
		$body = "Admin: $userName is login successfully at: $date 
Device : $device
		";
		$headers = "From: sayed@alibinmohammed.com";
		mail($to_email, $subject, $body, $headers);
	}else{
		$arr = array('status' => 'error', 'message' => 'Invalid UserName or Password');
	}

	





	echo json_encode($arr);
?>