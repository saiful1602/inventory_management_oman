<?php   

include("../DBconfig.php");

	$supAddress=$_GET['address'];
	$query="SELECT `sup_name` FROM `supplier_setup` WHERE `company_address`='$supAddress' GROUP BY `sup_name`";
	$q=mysqli_query($con, $query);
	$rw=array();
		while($r=mysqli_fetch_assoc($q)){
			$rw[]=$r;
		}
		echo json_encode($rw);
	

?>