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
	$ImportInvoice=$_POST['ImportInvoice'];
	$txtQnt=$_POST['txtQnt'];
	$txtAmount=$_POST['txtAmount'];
	$txtProfit=$_POST['txtProfit'];
	$date=$_POST['dt'];




		$query="INSERT INTO `parts_sales_temp`(`id`,`invoice_no`,`purchase_by`,`supplier_address`,
				`supplier_name`,`parts_name`,`catagory`,`size`,`amount`,`quantity`,`profit`,`date`,`import_invoice`)
			VALUES('$fID','$txtInvoice','$purchaseBy','$supAddress','$supName','$partsName','$partsCatagory'
			,'$partsSize','$txtAmount','$txtQnt','$txtProfit','$date','$ImportInvoice')";

		$query2="UPDATE `stock_item` SET `quantity`=`quantity`-'$txtQnt' WHERE `invoice_no`='$ImportInvoice'
				 AND `supplier_address`='$supAddress' AND `supplier_name`='$supName' AND `parts_name`='$partsName'
				AND `catagory`='$partsCatagory' AND `size`='$partsSize'";
		$q=mysqli_query($con, $query);
		$q2=mysqli_query($con, $query2);


	

?>