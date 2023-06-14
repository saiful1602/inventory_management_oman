
<?php
include('../DBconfig.php');

  $address=$_GET['address'];
  $query="SELECT `customer_name`,`customer_mobile` FROM `customer_setup` WHERE `customer_address`='$address' GROUP BY `customer_name`,`customer_mobile`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>