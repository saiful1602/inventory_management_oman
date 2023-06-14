
<?php
include('../../../DBconfig.php');

  $purchaseBy=$_GET['purchaseBy'];
  $supAddress=$_GET['supAddress'];
  $supName=$_GET['supName'];
  $partsName=$_GET['name'];
  
  $query="SELECT `catagory` FROM `stock_item` WHERE `supplier_address`='$supAddress' AND
          `supplier_name`='$supName' AND `parts_name`='$partsName' AND `purchase_by`='$purchaseBy' GROUP BY `catagory`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>