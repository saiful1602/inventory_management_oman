<?php   

include("../DBconfig.php");


		$invo=$_POST['invo'];

		$query="INSERT INTO `purchased_product` SELECT *FROM `purchase_import`";
		$q1=mysqli_query($con, $query);
		if($q1){
			$query3="INSERT INTO `stock_item` SELECT *FROM `purchase_import`";
			$q3=mysqli_query($con, $query3);

			$query2="DELETE FROM `purchase_import` WHERE `invoice_no`='$invo'";
			$q2=mysqli_query($con, $query2);
		}else{
			echo "query failed";
		}
		
		
	



?>