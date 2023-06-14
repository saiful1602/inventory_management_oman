
<?php
include('../../../DBconfig.php');

  $data=$_GET['purchaseBy'];
  $query="SELECT `supplier_address` FROM `stock_item` WHERE `purchase_by`='$data'  GROUP BY `supplier_address`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>