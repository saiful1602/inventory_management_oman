
<?php
include('../DBconfig.php');

  $supAddress=$_GET['supAddress'];
  $supName=$_GET['supName'];

  $query="SELECT `mobile_no` FROM `supplier_setup` WHERE `company_address`='$supAddress' AND `sup_name`='$supName'";
      $q=mysqli_query($con, $query);
      $row=array();
  if(mysqli_num_rows($q) > 0){
    $row=mysqli_fetch_assoc($q);
    echo $row['mobile_no'];
  }
  



?>