<?php   

include("../DBconfig.php");

		$invo=$_POST['invo'];
		$salesBy=$_POST['salesBy'];
		$cusAddress=$_POST['cusAddress'];
		$cusName=$_POST['cusName'];

		$query="INSERT INTO `parts_sales`(`id`,`invoice_no`,`purchase_by`,`supplier_name`,`supplier_address`,`parts_name`,`catagory`,	`size`,`amount`,`quantity`,`profit`,`date`,`import_invoice`)
				SELECT `id`,`invoice_no`,`purchase_by`,`supplier_name`,`supplier_address`,`parts_name`,
				`catagory`,`size`,`amount`,`quantity`,`profit`,`date`,`import_invoice` FROM `parts_sales_temp`";
		$q=mysqli_query($con, $query);



		if(mysqli_affected_rows($con) > 0){
			$query1="UPDATE `parts_sales` SET `sales_by`='$salesBy',`customer_name`='$cusName',`customer_address`='$cusAddress'
		 		 WHERE `invoice_no`='$invo'";
			$q2=mysqli_query($con, $query1);


			if($q2){
				$query2="DELETE FROM `parts_sales_temp` WHERE `invoice_no`='$invo'";
				$q3=mysqli_query($con, $query2);
				
				// Optional Query Delete if quantity is 0
				$query3="DELETE FROM `stock_item` WHERE `quantity`=0";
				mysqli_query($con, $query3);
			}
		}

		

		
	



?>