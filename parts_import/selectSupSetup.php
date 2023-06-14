<?php
include('../DBconfig.php');

  $data=$_GET['address'];
  $query="SELECT `sup_name` FROM `supplier_setup`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>