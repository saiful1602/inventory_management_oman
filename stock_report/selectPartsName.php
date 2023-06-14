
<?php
include('../DBconfig.php');

  $data=$_GET['name'];
  $query="SELECT `parts_name` FROM `stock_item` WHERE `supplier_name`='$data' GROUP BY `parts_name`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>