<?php
include('../../../DBconfig.php');

  $invo=$_GET['invo'];
  $supAddress=$_GET['supAddress'];
  $supName=$_GET['supName'];
  $pname=$_GET['pname'];
  $pcat=$_GET['pcat'];
  $psize=$_GET['psize'];
  $purchaseBy=$_GET['purchaseBy'];

  $output ="";

  $query="SELECT `sl`,`quantity`,`omr_pp` FROM `purchased_product` WHERE `invoice_no`='$invo' AND `parts_name`='$pname'
          AND `catagory`='$pcat' AND `size`='$psize' AND `purchase_by`='$purchaseBy'";

  $query2="SELECT SUM(`quantity`) AS QTY FROM `parts_sales` WHERE `import_invoice`='$invo' AND `parts_name`='$pname'
           AND `catagory`='$pcat' AND `size`='$psize' GROUP BY `quantity`";

      $q=mysqli_query($con, $query);

      if(mysqli_num_rows($q) > 0){
        $q2=mysqli_query($con, $query2);
      	$row=mysqli_fetch_assoc($q);
        $row2=mysqli_fetch_assoc($q2);
      	$quantity=$row['quantity'];
      	$omr=$row['omr_pp'];
        $oldID=$row['sl'];
        if(mysqli_num_rows($q2) > 0){
          $QTY=$row2['QTY'];
        }else{
          $QTY=0;
        }
        $balanceQTY=$quantity-$QTY;
      	echo $output .="<h5 hidden class='oldImportID'>".$oldID."</h2>
            <h5>Import Qty : ".$quantity."</h2>
						<h5>Sale Qty :".$QTY." </h2>
						<h5 class='txtBalance'>Balance Qty :".$balanceQTY."</h2>
						<h5>OMR P/P : ".$omr."</h2>";
      }else{
        echo $output="<h2>No stock found</h2>";
      }
      


?>