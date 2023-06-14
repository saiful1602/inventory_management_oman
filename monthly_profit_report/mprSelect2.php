<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $sel="SELECT `date`,`invoice_no`,`cost_name`,`reason`,`cost_amount` FROM `monthly_profit_cost` WHERE `date` BETWEEN '$date1' AND '$date2'  ";
  $q=mysqli_query($con, $sel);

  $totalAmount=0;

  $output .= " <table id='table' class='table table-striped table-bordered'>

        <thead>
          <tr>
            <th>Date</th>
            <th>Inv</th>
            <th>Cost Details</th>
            <th>Amount</th>
          </tr>
        </thead>";
      if(mysqli_num_rows($q) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q))  

           {  

            $newDate = date("d-m-Y", strtotime($row["date"]));
            $totalAmount += $row['cost_amount'];
                $output .= '  
                     <tr>
                          <td class="text-nowrap">'. $newDate .'</td>
                          <td>'. $row["invoice_no"] .'</td> 
                          <td class="text-nowrap">'. $row["cost_name"] .' /'.$row["reason"].'</td>  
                          <td class="text-nowrap">'. number_format($row["cost_amount"],3) .'</td>
                     </tr> ';  
           }  
      }else{
        
      }

       $output .= '  
               <tr>
                    <td colspan="3" style="color:red;font-weight:bold;">Total :</td>
                    <td style="color:red;font-weight:bold;">'. number_format($totalAmount,3) .'</td>  

               </tr> ';  

        $output .="</table>";
      echo $output;


?>