
<?php
include('../../DBconfig.php');

  $formName=$_GET['formName'];
  $InvoiceID=$_GET['InvoiceID'];
  $query="SELECT * FROM `$formName` WHERE `id`='$InvoiceID'";
      $q=mysqli_query($con, $query);
      $row=array();
  if($r=mysqli_fetch_assoc($q)){
     $row[]=$r;

  }
  echo json_encode($row);



?>