
<?php
include('../DBconfig.php');


    $address=$_GET['address'];
    $query="SELECT `sup_name`,`mobile_no` FROM `supplier_setup` WHERE `company_address`='$address' GROUP BY `sup_name`,`mobile_no`";
        $q=mysqli_query($con, $query);
        $row=array();
    while($r=mysqli_fetch_assoc($q)){
       $row[]=$r;

    }
    echo json_encode($row);
    

  



?>