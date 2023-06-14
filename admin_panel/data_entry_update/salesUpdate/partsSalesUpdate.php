<?php   

include("../../../DBconfig.php");
$msg="";
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
	$txtProfit=$_POST['txtProfit'];
    $salesBy=$_POST['salesBy'];
    $cusAddress=$_POST['cusAddress'];
    $cusName=$_POST['cusName'];
    $ImportInvoice=$_POST['ImportInvoice'];
	$datepicker=$_POST['datepicker'];

	$oldImportID=$_POST['oldImportID'];
	$oldpurchaseBy=$_POST['oldpurchaseBy'];
	$oldsupAddress=$_POST['oldsupAddress'];
	$oldsupName=$_POST['oldsupName'];
	$oldpartsName=$_POST['oldpartsName'];
	$oldpartsCatagory=$_POST['oldpartsCatagory'];
	$oldpartsSize=$_POST['oldpartsSize'];
	$oldtxtQnt=$_POST['oldtxtQnt'];
	$oldImportInvoice=$_POST['oldImportInvoice'];

    
	 $query="UPDATE `parts_sales` SET `purchase_by`='$purchaseBy',`supplier_address`='$supAddress',`supplier_name`='$supName',
            `parts_name`='$partsName',`catagory`='$partsCatagory',`size`='$partsSize',`quantity`='$txtQnt',
            `amount`='$txtAmount',`profit`='$txtProfit',`sales_by`='$salesBy',`customer_address`='$cusAddress',
            `customer_name`='$cusName',`import_invoice`='$ImportInvoice',`date`='$datepicker'
             WHERE `invoice_no`='$txtInvoice' AND `id`='$fID'";
	$q=mysqli_query($con, $query); 

	// old stock update after sales

	$query2="UPDATE `stock_item` SET `quantity`=`quantity`+'$oldtxtQnt' WHERE `supplier_address`='$oldsupAddress' AND
	 		`supplier_name`='$oldsupName' AND `parts_name`='$oldpartsName' AND `catagory`='$oldpartsCatagory' AND
	 		 `size`='$oldpartsSize' AND `invoice_no`='$oldImportInvoice' AND `sl`='$oldImportID'";
	$q2=mysqli_query($con, $query2); 

	

	// new stock update after sales

	 $query3="UPDATE `stock_item` SET `quantity`=`quantity`-'$txtQnt' WHERE `invoice_no`='$ImportInvoice' AND `purchase_by`='$purchaseBy'
			AND `supplier_address`='$supAddress' AND `supplier_name`='$supName' AND `parts_name`='$partsName' AND
			`catagory`='$partsCatagory' AND `size`='$partsSize'";
	$q3=mysqli_query($con, $query3); 


	$query4="UPDATE `parts_sales` SET `date`='$datepicker' WHERE `invoice_no`='$txtInvoice'";
	$q4=mysqli_query($con, $query4);

	
?>