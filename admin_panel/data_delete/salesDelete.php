<?php   

include("../../DBconfig.php");
	

	$formSelect= $_POST['formSelect'];

	$InvoiceID= $_POST['InvoiceID'];



	$query="SELECT * FROM `parts_sales` WHERE `invoice_no`='$InvoiceID'";
	$q=mysqli_query($con, $query);


	if(mysqli_num_rows($q) > 0){

		while($row=mysqli_fetch_assoc($q)){


			$ImportInvoice=$row['import_invoice'];
			$supAddress=$row['supplier_address'];
			$supName=$row['supplier_name'];
			$partsName=$row['parts_name'];
			$partsCatagory=$row['catagory'];
			$partsSize=$row['size'];
			$txtQnt=$row['quantity'];

			$query3="SELECT `sl`,`invoice_no` FROM `purchased_product` WHERE `supplier_address`= '$supAddress' AND
					 `supplier_name`='$supName' AND `parts_name`='$partsName' AND `catagory`='$partsCatagory'
					  AND `size`='$partsSize' AND `invoice_no`='$ImportInvoice'";
			$q3=mysqli_query($con, $query3);

			if($row2=mysqli_fetch_assoc($q3))
			{
			  $stockID=$row2['sl'];
			  $stockInvoice = $row2['invoice_no'];
			}
			
			$query2="UPDATE `stock_item` SET `quantity`=`quantity`+'$txtQnt' WHERE `invoice_no`='$stockInvoice' AND `sl`='$stockID'";
			$q2=mysqli_query($con, $query2);
			if(mysqli_affected_rows($con) == 0){
				$query4="INSERT INTO `stock_item` SELECT * FROM `purchased_product` WHERE `invoice_no`='$stockInvoice'
						 AND `sl`='$stockID'";
				$q4=mysqli_query($con, $query4);
				$query5="UPDATE `stock_item` SET `quantity`='$txtQnt' WHERE `invoice_no`='$stockInvoice'
					 	 AND `sl`='$stockID'";
				$q5=mysqli_query($con, $query5);
				
			}else{
				
			}


		}

		$query3="DELETE FROM `parts_sales` WHERE `invoice_no`='$InvoiceID'";
		$q3=mysqli_query($con, $query3);
	}




?>