<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $sel="SELECT `invoice_no`,`carry_via`,TRUNCATE(`amount`,3) AS amount,`date` FROM `saqar_payment`
        WHERE `date` BETWEEN '$date1' AND '$date2'";
  $q=mysqli_query($con, $sel);

  $sel2="SELECT SUM(`amount`) AS amount1 FROM `saqar_payment` WHERE `date` < '$date1'";
  $q2=mysqli_query($con, $sel2);
  $row2=mysqli_fetch_assoc($q2);
  $totalPayment=$row2['amount1'];

  $sel3="SELECT SUM(`amount`) AS amount2 FROM `saqar_cost_entry` WHERE `date` < '$date1'";
  $q3=mysqli_query($con, $sel3);
  $row3=mysqli_fetch_assoc($q3);
  $totalCost=$row3['amount2'];

  $sel4="SELECT SUM(`spAmount`) AS Amount FROM `supplier_payment` WHERE `payment_by`='saqar_cash' AND  `date` < '$date1'";
  $q4=mysqli_query($con, $sel4);
  $row4=mysqli_fetch_assoc($q4);
  $totalSupPay=$row4['Amount'];

  $count=0;
  $totalAmount=0;
  $totalCost += $totalSupPay;
  $prevAmount=$totalPayment-$totalCost;

  $output .= " <table id='table' class='table table-striped table-bordered'>

        <thead>
          <tr>
            <th>Date</th>
            <th>Invoice</th>
            <th>Via</th>
            <th>Amount</th>
          </tr>
        </thead>";

        $output .= '  
                     <tr>
                          <td colspan="3" style="color:red;font-weight:bold;">Previous :</td>
                          <td style="color:red;font-weight:bold;">'.number_format($prevAmount,3).'</td>
                     </tr> ';  

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
                          <td>'. $row["carry_via"] .'</td>  
                          <td class="text-nowrap">'. number_format($row["amount"],3) .'</td>
                     </tr> ';  
           }  
      }else{
        
      }

      $totalAmount +=$prevAmount;
       $output .= '  
               <tr>
                    <td colspan="3" style="color:red;font-weight:bold;">Total :</td>
                    <td style="color:red;font-weight:bold;">'. number_format($totalAmount,3) .'</td>  
               </tr> ';  


        $output .="</table>";
      echo $output;


?>