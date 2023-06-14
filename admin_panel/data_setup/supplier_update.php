<?php   

include("../../DBconfig.php");


	$supID= $_POST['supID'];
	$supName=$_POST['supName'];
	$mobileNumber=$_POST['mobileNumber'];
	$companyName=$_POST['companyName'];
	$companyAddress=$_POST['companyAddress'];
	$supOldAmount=$_POST['supOldAmount'];

	$query="SELECT `sup_name`,`company_address` FROM `supplier_setup` WHERE `id`='$supID'";
	$q=mysqli_query($con, $query);
	$row=mysqli_fetch_assoc($q);

	$oldSupName=$row['sup_name'];
	$oldSupAddress=$row['company_address'];

	$query2="UPDATE `supplier_setup` SET `sup_name`='$supName',`mobile_no`='$mobileNumber',`company_name`='$companyName',
			`company_address`='$companyAddress',`old_amount`='$supOldAmount' WHERE `id`='$supID'";
	mysqli_query($con, $query2);

	$query3="UPDATE `purchased_product` SET `supplier_name`='$supName',`supplier_address`='$companyAddress'  WHERE `supplier_name`='$oldSupName' AND
			`supplier_address`='$oldSupAddress' AND `purchase_by`='Due' ";
	mysqli_query($con, $query3);

	$query4="UPDATE `stock_item` SET `supplier_name`='$supName',`supplier_address`='$companyAddress'  WHERE `supplier_name`='$oldSupName' AND
			`supplier_address`='$oldSupAddress' AND `purchase_by`='Due' ";
	mysqli_query($con, $query4);

	$query5="UPDATE `parts_sales` SET `supplier_name`='$supName',`supplier_address`='$companyAddress'  WHERE `supplier_name`='$oldSupName' AND
			`supplier_address`='$oldSupAddress' AND `purchase_by`='Due' ";
	mysqli_query($con, $query5);

	$query6="UPDATE `supplier_payment` SET `spName`='$supName',`spAddress`='$companyAddress'  WHERE `spName`='$oldSupName' AND
			`spAddress`='$oldSupAddress'";
	mysqli_query($con, $query6);



?>
