<?php
include('../DBconfig.php');

  $invo=$_GET['invo'];
  $supAddress=$_GET['supAddress'];
  $supName=$_GET['supName'];
  $pname=$_GET['pname'];
  $pcat=$_GET['pcat'];
  $psize=$_GET['psize'];


  $query="SELECT `quantity` FROM `stock_item` WHERE `invoice_no`='$invo' AND `parts_name`='$pname' AND `catagory`='$pcat' AND `size`='$psize' GROUP BY `quantity`";
      $q=mysqli_query($con, $query);
      if($q){
      	$row=mysqli_fetch_array($q);
      	$quantity=$row['quantity'];
      	
      }
      echo $quantity;
      


?>