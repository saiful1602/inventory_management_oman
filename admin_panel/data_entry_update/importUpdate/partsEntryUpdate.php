<?php   

include("../../../DBconfig.php");

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
	$datepicker=$_POST['datepicker'];


	$query="UPDATE `purchased_product` SET 
			`parts_name`='$partsName',`catagory`='$partsCatagory',`size`='$partsSize',`quantity`='$txtQnt',`amount`='$txtAmount',
			`omr_pp`='$txtOMR' WHERE `invoice_no`='$txtInvoice' AND `sl`='$fID'";
	$q=mysqli_query($con, $query);

	$query2="UPDATE `purchased_product` SET `purchase_by`='$purchaseBy',`supplier_address`='$supAddress',`supplier_name`='$supName',
			`date`='$datepicker' WHERE `invoice_no`='$txtInvoice'";
	$q2=mysqli_query($con, $query2);

	$query3="UPDATE `stock_item` SET 
			`parts_name`='$partsName',`catagory`='$partsCatagory',`size`='$partsSize',`quantity`='$txtQnt',`amount`='$txtAmount',
			`omr_pp`='$txtOMR' WHERE `invoice_no`='$txtInvoice' AND `sl`='$fID'";
	$q3=mysqli_query($con, $query3);

	$query4="UPDATE `stock_item` SET `purchase_by`='$purchaseBy',`supplier_address`='$supAddress',`supplier_name`='$supName',
			`date`='$datepicker' WHERE `invoice_no`='$txtInvoice'";
	$q4=mysqli_query($con, $query4);

	$query5="SELECT SUM(`quantity`) as Qnt FROM `parts_sales` WHERE `import_invoice`='$txtInvoice' AND `parts_name`='$partsName'
			 AND `catagory`='$partsCatagory' AND `size`='$partsSize'";
	$q5=mysqli_query($con, $query5);
	if(mysqli_num_rows($q5) > 0){

		$row5=mysqli_fetch_assoc($q5);
		$salesQty=$row5['Qnt'];
		$upQuery="UPDATE `stock_item` SET `quantity`=`quantity`-'$salesQty' WHERE `invoice_no`='$txtInvoice' AND `sl`='$fID'";
		$q6=mysqli_query($con, $upQuery);
	}


?>