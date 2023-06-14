<?php
include('../DBconfig.php');

  $output = "";
  $costName=$_GET['costName'];
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $sel="SELECT `invoice_no`,`cost_name`,`cost_amount`,`date` FROM `monthly_profit_cost`
        WHERE `cost_name`='$costName' AND `date` BETWEEN '$date1' AND '$date2' ";
  $q=mysqli_query($con, $sel);

  $totalAmount=0;
  $count=0;

  $output .= " <table id='table' class='table table-striped table-bordered'>

        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Invoice</th>
            <th>Cost Amount </th>
          </tr>
        </thead>";
      if(mysqli_num_rows($q) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q))  
            
           {  $count++;

            $totalAmount += $row['cost_amount'];
            $newDate = date("d-m-Y", strtotime($row["date"]));
                $output .= '  
                     <tr>
                        <td>'.$count.'</td>
                        <td>'.$newDate.'</td>
                        <td>'.$row["invoice_no"].'</td>
                        <td>'. number_format(($row["cost_amount"]),3) .'</td> 
                     </tr> ';  
           }  
      }else{
        
      }

       $output .= '  
               <tr>
                    <td colspan="3" style="color:red;font-weight:bold;">Total :</td>
                    <td style="color:red;font-weight:bold;">'. number_format(($totalAmount),3) .'</td>  
               </tr> ';  

        $output .="</table>";
      echo $output;


?>