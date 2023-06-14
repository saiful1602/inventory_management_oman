<?php   

include("../../DBconfig.php");

	$selectCatagory=$_POST['selectCatagory'];
	$partsCatagory=$_POST['partsCatagory'];

	$query="UPDATE `parts_setup` SET `parts_catagory`='$partsCatagory' WHERE `parts_catagory`='$selectCatagory'";
	$q=mysqli_query($con, $query);

	$query2="UPDATE `purchased_product` SET `catagory`='$partsCatagory' WHERE `catagory`='$selectCatagory'";
	$q2=mysqli_query($con, $query2);

	$query3="UPDATE `parts_sales` SET `catagory`='$partsCatagory' WHERE `catagory`='$selectCatagory'";
	$q3=mysqli_query($con, $query3);

	$query4="UPDATE `stock_item` SET `catagory`='$partsCatagory' WHERE `catagory`='$selectCatagory'";
	$q4=mysqli_query($con, $query4);


	
?>