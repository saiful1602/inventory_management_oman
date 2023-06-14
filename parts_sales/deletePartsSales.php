<?php   

include("../DBconfig.php");


		$id=$_POST['id'];
		$qnt=$_POST['qnt'];
		$supAddress=$_POST['saddr'];
		$supName=$_POST['sname'];
		$partsName=$_POST['pname'];
		$partsCatagory=$_POST['pcat'];
		$partsSize=$_POST['psize'];
		$ImportInvoice=$_POST['invo'];

		$query="UPDATE `stock_item` SET `quantity`=`quantity`+'$qnt' WHERE `invoice_no`='$ImportInvoice'
				AND `supplier_address`='$supAddress' AND `supplier_name`='$supName' AND `parts_name`='$partsName'
				AND `catagory`='$partsCatagory' AND `size`='$partsSize'";
		$q=mysqli_query($con, $query);
		if($q){
			$query2="DELETE FROM `parts_sales_temp` WHERE `id`='$id'";
			$q2=mysqli_query($con, $query2);
		}
		

?>