<?php
include('../DBconfig.php');

$data=$_GET['name'];
  $query="SELECT `parts_size` FROM `parts_setup` WHERE `parts_catagory`='$data' GROUP BY `parts_size`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>