<?php
include('../DBconfig.php');


$data=$_GET['name'];
  $query="SELECT `parts_catagory` FROM `parts_setup` WHERE `parts_name`='$data' GROUP BY `parts_catagory`";
      $q=mysqli_query($con, $query);
      $row=array();
  while($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>