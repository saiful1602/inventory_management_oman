
<?php
include('../DBconfig.php');

  $data=$_GET['address'];
  $query="SELECT `customer_name` FROM `customer_setup` WHERE `customer_address`='$data' GROUP BY `customer_name`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>