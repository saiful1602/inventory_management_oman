<?php
include('../DBconfig.php');


	// print_r($_POST);
	$fID=$_POST['fID'];
	$txtInvoice=$_POST['txtInvoice'];
	$purchaseBy=$_POST['purchaseBy'];

	$supAddress=$_POST['supAddress'];
	$supName=$_POST['supName'];

	$partsName=$_POST['partsName'];
	$partsCatagory=$_POST['partsCatagory'];
	$partsSize=$_POST['partsSize'];
	$txtQnt=$_POST['txtQnt'];
	$txtAmount=$_POST['txtAmount'];
	$txtOMR=$_POST['txtOMR'];
	$date=$_POST['dt'];


	$query="SELECT * FROM `purchase_import` WHERE `parts_name`='$partsName' AND `catagory`='$partsCatagory' AND `size`='$partsSize'";
	$q=mysqli_query($con, $query);
	if(mysqli_num_rows($q) > 0){
		$arr = array('status' => 'error', 'message' => 'Sorry!! Same product not accept for this Invoice');
	}else{
		$query2="INSERT INTO `purchase_import`(`sl`,`invoice_no`,`purchase_by`,`supplier_address`,`supplier_name`,`parts_name`,`catagory`,`size`,`quantity`,`amount`,`omr_pp`,`date`)VALUES('$fID','$txtInvoice','$purchaseBy','$supAddress','$supName','$partsName','$partsCatagory','$partsSize','$txtQnt','$txtAmount','$txtOMR','$date')";
		$q2=mysqli_query($con, $query2);
		$arr = array('status' => 'success', 'message' => 'Data Insert successfull');
	}
	echo json_encode($arr);


?>