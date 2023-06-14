<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $sel="SELECT `invoice_no`,`cost_details`,TRUNCATE(`amount`,3) AS amount,`date` FROM `saqar_cost_entry`
        WHERE `date` BETWEEN '$date1' AND '$date2' ";
  $q=mysqli_query($con, $sel);

  $sel2="SELECT `date`,`invoice_no`,`spAmount`,`spName`,`reason` FROM `supplier_payment` WHERE `payment_by`='saqar_cash' AND 
        `date` BETWEEN '$date1' AND '$date2' ";
  $q2=mysqli_query($con, $sel2);

  $count=0;
  $totalAmount=0;

  $output .= " <table id='table2' class='table table-striped table-bordered'>

        <thead>
          <tr>
            <th>Date</th>
            <th>Inv</th>
            <th>Cost Details</th>
            <th>Reason</th>
            <th>Amount</th>
          </tr>
        </thead>";
      
      if(mysqli_num_rows($q2) > 0)  
      {  
           while($row2 = mysqli_fetch_assoc($q2))  

           {  

            $newDate2 = date("d-m-Y", strtotime($row2["date"]));
            $totalAmount += $row2['spAmount'];
                $output .= '  
                     <tr>
                          <td class="text-nowrap">'.$newDate2.'</td>
                          <td>'.$row2['invoice_no'].'</td>
                          <td class="text-nowrap">Sup Pay/ '. $row2["spName"] .'</td>  
                          <td>'. $row2["reason"] .'</td> 
                          <td class="text-nowrap">'. number_format($row2["spAmount"],3) .'</td>
                     </tr> ';  
           }  
      }
      if(mysqli_num_rows($q) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q))  

           {  

            $newDate = date("d-m-Y", strtotime($row["date"]));
            $totalAmount += $row['amount'];
                $output .= '  
                     <tr>
                          <td class="text-nowrap">'.$newDate.'</td>
                          <td>'.$row['invoice_no'].'</td>
                          <td class="text-nowrap">'. $row["cost_details"] .'</td>  
                          <td class="text-nowrap">-</td>  
                          <td class="text-nowrap">'. number_format($row["amount"],3) .'</td>
                     </tr> ';  
           }  
      }
      else{
        
      }

        $output .= '  
               <tr>
                    <td colspan="4" style="color:red;font-weight:bold;">Total :</td>
                    <td class="total2" style="color:red;font-weight:bold;">'. number_format($totalAmount,3) .'</td>  
               </tr> ';


        $output .="</table>";
      echo $output;


?>