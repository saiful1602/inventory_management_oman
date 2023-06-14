<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $sel="SELECT SUM(`amount`) AS Amount FROM `saqar_payment` WHERE `date` BETWEEN '$date1' AND '$date2' ";
  $q=mysqli_query($con, $sel);

  $sel2="SELECT SUM(`amount`) AS Amount2 FROM `saqar_cost_entry` WHERE `date` BETWEEN '$date1' AND '$date2' ";
  $q2=mysqli_query($con, $sel2);
  $row2=mysqli_fetch_assoc($q2);

  $sel3="SELECT SUM(`amount`) AS amount1 FROM `saqar_payment` WHERE `date` < '$date1'";
  $q3=mysqli_query($con, $sel3);
  $row3=mysqli_fetch_assoc($q3);
  $totalPayment=$row3['amount1'];

  $sel4="SELECT SUM(`amount`) AS amount2 FROM `saqar_cost_entry` WHERE `date` < '$date1'";
  $q4=mysqli_query($con, $sel4);
  $row4=mysqli_fetch_assoc($q4);
  $totalCost=$row4['amount2'];

  $sel5="SELECT SUM(`spAMount`) AS amount4 FROM `supplier_payment`
         WHERE `payment_by`='saqar_cash' AND `date` BETWEEN '$date1' AND '$date2'";
  $q5=mysqli_query($con, $sel5);
  $row5=mysqli_fetch_assoc($q5);
  $totalSupPay=$row5['amount4'];

  $sel6="SELECT SUM(`spAmount`) AS Amount FROM `supplier_payment` WHERE `payment_by`='saqar_cash' AND  `date` < '$date1'";
  $q6=mysqli_query($con, $sel6);
  $row6=mysqli_fetch_assoc($q6);
  $totalSupSaqarPay=$row6['Amount'];


  $totalAmount=0;
  $totalAmount2=$row2['Amount2'];
  $totalCost += $totalSupSaqarPay;
  $prevAmount=$totalPayment-$totalCost;


      if(mysqli_num_rows($q) > 0)  
      {  
           if($row = mysqli_fetch_assoc($q))  

           {  

            $totalAmount += $row['Amount'];
            $totalAmount += $prevAmount;
            $totalAmount -= $totalAmount2;
            $totalAmount -= $totalSupPay;

                $output .= '  
                     <tr style="width:100%;">
                          <td align="right" class="fs-4 col-lg-6 col-md-7" style="color:#268c16;font-weight:bold;width:55%;">Net Cash (OMR) : </td>
                          <td align="left" class="fs-4 col-lg-6 col-md-5" style="color:#268c16;font-weight:bold;width:45%;">'.number_format($totalAmount,3).'</td>

                     </tr> ';  
           }  
      }else{
        
      }

       



      echo $output;


?>