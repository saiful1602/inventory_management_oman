
<?php
include('../../../DBconfig.php');
  
  $purchaseBy=$_GET['purchaseBy'];
  $supAddress=$_GET['supAddress'];
  $supName=$_GET['supName'];
  $pname=$_GET['pname'];
  $pcat=$_GET['pcat'];
  $psize=$_GET['psize'];
  $query="SELECT `invoice_no` FROM `stock_item` WHERE `supplier_address`='$supAddress' AND
          `supplier_name`='$supName' AND `parts_name`='$pname' AND `catagory`='$pcat' AND `size`='$psize'
           AND `purchase_by`='$purchaseBy' GROUP BY `invoice_no`";
      $q=mysqli_query($con, $query);
      $row=array();
      while($r=mysqli_fetch_assoc($q)){
      $row[]=$r;

  }
  echo json_encode($row);



?>