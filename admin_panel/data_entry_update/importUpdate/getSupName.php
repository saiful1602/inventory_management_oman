
<?php
include('../../../DBconfig.php');


    $supAddress=$_GET['Address'];
    $query="SELECT `sup_name`,`mobile_no` FROM `supplier_setup` WHERE `company_address`='$supAddress' GROUP BY `sup_name`,`mobile_no`";
        $q=mysqli_query($con, $query);
        $row=array();
    while($r=mysqli_fetch_assoc($q)){
       $row[]=$r;

    }
    echo json_encode($row);


?>