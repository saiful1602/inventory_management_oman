<?php
include('../DBconfig.php');

  $invo=$_GET['invo'];
  $supAddress=$_GET['supAddress'];
  $supName=$_GET['supName'];
  $pname=$_GET['pname'];
  $pcat=$_GET['pcat'];
  $psize=$_GET['psize'];
  $purchaseBy=$_GET['purchaseBy'];

  $output ="";

  $query="SELECT `quantity` ,`omr_pp` FROM `purchased_product` WHERE `invoice_no`='$invo' AND `parts_name`='$pname' AND `catagory`='$pcat' AND `size`='$psize' AND `purchase_by`='$purchaseBy' GROUP BY `quantity`";

  $query2="SELECT `quantity` AS QTY FROM `stock_item` WHERE `invoice_no`='$invo' AND `parts_name`='$pname' AND `catagory`='$pcat' AND `size`='$psize' GROUP BY `quantity`";

      $q=mysqli_query($con, $query);

      if($q){
        $q2=mysqli_query($con, $query2);
        $row2=mysqli_fetch_assoc($q2);
      	$row=mysqli_fetch_assoc($q);
      	$quantity=$row['quantity'];
      	$omr=$row['omr_pp'];
        $QTY=$row2['QTY'];
        $salesQNT=$quantity-$QTY;
      	echo $output .="<h5>Import Qty : ".$quantity."</h2>
						<h5>Sale Qty :".$salesQNT." </h2>
						<h5>Balance Qty :".$QTY."</h2>
						<h5>OMR P/P : ".$omr."</h2>";
      }else{
      	$output="<h2>No stock found</h2>";
      }
      


?>