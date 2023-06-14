
<?php
include('../../../DBconfig.php');

  $data=$_GET['address'];
  $purchaseBy=$_GET['purchaseBy'];
  $query="SELECT `supplier_name` FROM `stock_item` WHERE `supplier_address`='$data' AND `purchase_by`='$purchaseBy'  GROUP BY `supplier_name`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);





?>