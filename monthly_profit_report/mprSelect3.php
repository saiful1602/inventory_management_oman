<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];

  $totalAmount=0;
  $totalProfit=0;
  $totalCost=0;
  $totalDueProfit=0;

  $sel="SELECT `date`, SUM(`profit`) AS total FROM `parts_sales` WHERE `sales_by`='Cash' AND
         `date` BETWEEN '$date1' AND '$date2' GROUP BY `date` ";
  $q=mysqli_query($con, $sel);

  /********** Query For old amount ************/

  $sel2="SELECT SUM(`cost_amount`) AS amount1 FROM `monthly_profit_cost` WHERE `date` < '$date1'";
  $q2=mysqli_query($con, $sel2);
  if(mysqli_num_rows($q2) > 0){
   $row2=mysqli_fetch_assoc($q2);
    $totalCost +=$row2['amount1'];
  }

  /********** Query For old amount ************/

  $sel3="SELECT SUM(`profit`) AS profit1 FROM `parts_sales` WHERE `sales_by`='Cash' AND `date` < '$date1'";
  $q3=mysqli_query($con, $sel3);
  if(mysqli_num_rows($q3) > 0){
    $row3=mysqli_fetch_assoc($q3);
    $totalDueProfit +=$row3['profit1'];
  }

  $sel4="SELECT `date`,`customer_address`,`customer_name`,`amount`,sum(`profit`) as cProfit FROM `customer_collection`
         WHERE `date` BETWEEN '$date1' AND '$date2' GROUP BY `date`";
  $q4=mysqli_query($con, $sel4);

  /********** Query For old amount ************/

  $sel5="SELECT SUM(`profit`) AS profitCollection FROM `customer_collection` WHERE `date` < '$date1'";
  $q5=mysqli_query($con, $sel5);
  if(mysqli_num_rows($q5) > 0){
    $row5=mysqli_fetch_assoc($q5);
    $totalProfit +=$row5['profitCollection'];
  }

  $sel6="SELECT sum(`cost_amount`) as mpcAmount FROM `monthly_profit_cost` 
         WHERE `date` BETWEEN '$date1' AND '$date2' GROUP BY `date` ";
  $q6=mysqli_query($con, $sel6);
  

  $prevAmount=$totalProfit+$totalDueProfit;
  $prevAmount=$prevAmount - $totalCost;
  $totalAmount += $prevAmount;


      if(mysqli_num_rows($q) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q))  

           {  

            $totalAmount += $row['total'];
                
           }  
      }else{
        
      }

     if(mysqli_num_rows($q4) > 0)  
      {  
           while($row4 = mysqli_fetch_assoc($q4))  

           {  
            
            $totalAmount += $row4['cProfit'];

           }  
      }else{
        
      }

      if(mysqli_num_rows($q6) > 0)  
      {  
           while($row6 = mysqli_fetch_assoc($q6))  

           {  
            
            $totalAmount -= $row6['mpcAmount'];

           }  
      }else{
        
      }

      $output .= '  
                  <tr style="width:100%;">
                     <td align="right" class="fs-4 col-lg-6 p-2" style="color:#268c16;font-weight:bold;width:55%;">Net Profit (OMR) : </td>
                     <td align="left" class="fs-4 col-lg-6" style="color:#268c16;font-weight:bold;width:45%;;">'.number_format($totalAmount,3).'</td>

                  </tr> ';  

      echo $output;


?>