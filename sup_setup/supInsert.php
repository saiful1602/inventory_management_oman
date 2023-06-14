<?php   

include("../DBconfig.php");


	$fID=$_POST['fID'];
	$supName=$_POST['supName'];
	$mobileNumber=$_POST['mobileNumber'];
	$companyName=$_POST['companyName'];
	$companyAddress=$_POST['companyAddress'];
	$oldAmount=$_POST['oldAmount'];

	$query="insert into `supplier_setup`(`id`,`sup_name`,`mobile_no`,`company_name`,`company_address`,`old_amount`)values('$fID','$supName','$mobileNumber','$companyName','$companyAddress','$oldAmount')";
	$q=mysqli_query($con, $query);
	if($q){
		echo "query success";
	}else{
		echo "query failed";
	}


	

?>
