<?php
include('../../../DBconfig.php');

    $purchaseBy=$_GET['purchaseBy'];
    $query="SELECT * FROM `stock_item` WHERE `purchase_by`='$purchaseBy'";
    $q=mysqli_query($con, $query);

    $row=array();
        while($r=mysqli_fetch_assoc($q)){
            $row[]=$r;
    }

    echo json_encode($row);
    
    


?>