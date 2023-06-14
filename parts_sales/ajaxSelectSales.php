<?php
include('../DBconfig.php');

    $query="SELECT * FROM `stock_item`";
    $q=mysqli_query($con, $query);

    $row=array();
        while($r=mysqli_fetch_assoc($q)){
            $row[]=$r;
    }

    echo json_encode($row);
    
    


?>