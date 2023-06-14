
<?php
include('../../../DBconfig.php');

  $purchaseBy=$_GET['purchaseBy'];
  $supName=$_GET['name'];
  $supAddress=$_GET['supAddress'];
  $query="SELECT `parts_name` FROM `stock_item` WHERE `supplier_address`='$supAddress' AND `supplier_name`='$supName'
           AND `purchase_by`='$purchaseBy'  GROUP BY `parts_name`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>