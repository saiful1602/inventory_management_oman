<?php   

include("../DBconfig.php");


	$fID=$_POST['fID'];
	$productName=$_POST['productName'];
	$productCatagory=$_POST['productCatagory'];
	$productSize=$_POST['productSize'];

	$query="INSERT INTO `parts_setup` (`id`,`parts_name`,`parts_catagory`,`parts_size`) VALUES ('$fID','$productName','$productCatagory','$productSize')";
	mysqli_query($con, $query);


	

?>
