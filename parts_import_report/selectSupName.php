
<?php
include('../DBconfig.php');

  $data=$_GET['address'];
  $query="SELECT `supplier_name` FROM `purchased_product` WHERE `supplier_address`='$data' GROUP BY `supplier_name`";
  $q=mysqli_query($con,$query);
  $row=array();
      while($r=mysqli_fetch_assoc($q)){
          $row[]=$r;

      }
  echo json_encode($row);



?>