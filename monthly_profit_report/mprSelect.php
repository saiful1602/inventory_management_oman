<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $start = new DateTime($date1);
  $end = new DateTime($date2);
  $end = $end->modify( '+1 day' );

  $interval = new DateInterval('P1D');
  $daterange = new DatePeriod($start, $interval ,$end);

  $totalAmount=0;
  $totalProfit=0;
  $totalCost=0;
  $totalDueProfit=0;

  

  /********** Query For old amount ************/

  $sel2="SELECT SUM(`cost_amount`) AS amount1 FROM `monthly_profit_cost` WHERE `date` < '$date1'";
  $q2=mysqli_query($con, $sel2);
  if(mysqli_num_rows($q2) > 0){
   $row2=mysqli_fetch_assoc($q2);
    $totalCost=$row2['amount1'];
  }

  /********** Query For old amount ************/

  $sel3="SELECT SUM(`profit`) AS profit1 FROM `parts_sales` WHERE `sales_by`='Cash' AND `date` < '$date1'";
  $q3=mysqli_query($con, $sel3);
  if(mysqli_num_rows($q3) > 0){
    $row3=mysqli_fetch_assoc($q3);
    $totalProfit +=$row3['profit1'];
  }

  /********** Query For old amount ************/

  $sel5="SELECT SUM(`profit`) AS profitCollection FROM `customer_collection` WHERE `date` < '$date1'";
  $q5=mysqli_query($con, $sel5);
  if(mysqli_num_rows($q5) > 0){
    $row5=mysqli_fetch_assoc($q5);
    $totalDueProfit +=$row5['profitCollection'];
  }
  
  $prevAmount=$totalProfit + $totalDueProfit;
  $prevAmount=$prevAmount - $totalCost;
  $totalAmount += $prevAmount;

  $output .= " <table id='table' class='table table-striped table-bordered'>
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Profit Details</th>
                    <th>Amount</th>
                  </tr>
                </thead>";

        $output .= '  
                 <tr>
                    <td colspan="2" style="color:red;font-weight:bold;">Previous :</td>  
                    <td style="color:red;font-weight:bold;">'. number_format($prevAmount,3) .'</td>
                 </tr> ';  

    foreach($daterange as $date){
        $dateloop=$date->format("Y-m-d");
        $newDate = date("d-m-Y", strtotime($dateloop));

        $sel="SELECT `date`, SUM(`profit`) AS total FROM `parts_sales` WHERE `sales_by`='Cash' AND
             `date` = '$dateloop' GROUP BY `date` ";
        $q=mysqli_query($con, $sel);

        $sel4="SELECT `date`,`amount`,sum(`profit`) as cProfit FROM `customer_collection`
               WHERE `date` ='$dateloop' GROUP BY `date`";
        $q4=mysqli_query($con, $sel4);

        $saleProfit=0;
        $colProfit=0;
        $total=0;

      if(mysqli_num_rows($q) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q))  
           {  
            $totalAmount += $row['total'];
            $saleProfit += $row['total'];
           }  
      }else{
        
      }

      if(mysqli_num_rows($q4) > 0)  
      {  
           while($row4 = mysqli_fetch_assoc($q4))  
           {  
            $totalAmount += $row4['cProfit'];
            $colProfit += $row4['cProfit'];
           }
      }else{
        
      }
      $total=$saleProfit+$colProfit;
      if($total > 0){
        $output .= '<tr>
                    <td class="text-nowrap">'.$newDate.'</td>
                    <td>Profit</td>  
                    <td class="text-nowrap">'. number_format($total,3) .'</td>
                 </tr> ';
      }
      
    }

      

       $output .= '<tr>
                      <td colspan="2" style="color:red;font-weight:bold;">Total :</td>
                      <td style="color:red;font-weight:bold;">'. number_format($totalAmount,3) .'</td>  
                   </tr> ';  

        $output .="</table>";
      echo $output;


?>