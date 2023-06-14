<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $sel="SELECT `cost_name`,`cost_amount` FROM `daily_other_cost` WHERE `date` = '$date1' ";
  $q=mysqli_query($con, $sel);

  $sel2="SELECT `supplier_address`,`supplier_name`,`amount` FROM `purchased_product` WHERE `purchase_by`='Cash' AND  `date`='$date1'";
  $q2=mysqli_query($con, $sel2);

  $sel3="SELECT `spAddress`,`spName`,`spAmount` FROM `supplier_payment` WHERE `date`='$date1' AND `payment_by`='my_cash'";
  $q3=mysqli_query($con, $sel3);

  $count=0;
  $totalAmount=0;
  $totalProfit=0;

  $output .= " <table id='table' class='table table-striped table-bordered'>

        <thead>
          <tr>

            <th>Cost Name</th>
            <th>Amount(OMR)</th>
          </tr>
        </thead>";
      if(mysqli_num_rows($q) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q))  

           {  
            $count++;
            $totalAmount += $row['cost_amount'];
                $output .= '  
                     <tr>
                          
                          <td>'. $row["cost_name"] .'</td>  
                          <td>'. number_format($row["cost_amount"],3) .'</td>
                     </tr> ';  
           }  
      }else{
        
      }

      if(mysqli_num_rows($q2) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q2))  

           {  
            $count++;
            $totalAmount += $row['amount'];
                $output .= '  
                     <tr>
                          
                          <td>Parts Purchase/ '. $row["supplier_name"] .' ,'. $row["supplier_address"] .'</td>  
                          <td>'. number_format($row["amount"],3) .'</td>
                     </tr> ';  
           }  
      }else{
       
      }

      if(mysqli_num_rows($q3) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q3))  

           {  
            $count++;
            $totalAmount += $row['spAmount'];
                $output .= '  
                     <tr>
                          
                          <td>Sup_Pay/ '. $row["spName"] .' ,'. $row["spAddress"] .'</td>  
                          <td>'. number_format($row["spAmount"],3) .'</td>
                     </tr> ';  
           }  
      }else{
       
      }


       $output .= '  
               <tr>
                    <td style="color:red;font-weight:bold;">Total</td>
                    <td style="color:red;font-weight:bold;">'. number_format($totalAmount,3) .'</td>  
               </tr> ';  

        $output .="</table>";
      echo $output;


?>