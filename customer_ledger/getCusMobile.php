
<?php
include('../DBconfig.php');

  $cusAddress=$_GET['cusAddress'];
  $cusName=$_GET['cusName'];

  $query="SELECT `customer_mobile` FROM `customer_setup` WHERE `customer_address`='$cusAddress' AND `customer_name`='$cusName'";
      $q=mysqli_query($con, $query);
      $row=array();
  if(mysqli_num_rows($q) > 0){
    $row=mysqli_fetch_assoc($q);
    echo $row['customer_mobile'];
  }
  



?>