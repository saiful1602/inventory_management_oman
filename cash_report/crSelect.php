<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $sel="SELECT `parts_name`,`catagory`,`size`,`quantity`,`amount`,`profit` FROM `parts_sales` WHERE `sales_by`='Cash' and `date` = '$date1' ";
  $q=mysqli_query($con, $sel);

  $sel2="SELECT `customer_address`,`customer_name`,`amount`,`profit` FROM `customer_collection` WHERE `date`='$date1' ";
  $q2=mysqli_query($con, $sel2);


  $count=0;
  $totalAmount=0;
  $totalProfit=0;

  $output .= " <table id='table' class='table table-striped table-bordered'>

        <thead>
          <tr>
            <th>SL</th>
            <th>Parts Name</th>
            <th>Catagory</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Amount(OMR)</th>
            <th>Profit(OMR)</th>
          </tr>
        </thead>";
      if(mysqli_num_rows($q) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q))  

           {  
            $count++;
            $totalAmount += $row['amount'];
            $totalProfit += $row['profit'];
                $output .= '  
                     <tr>
                          <td>'.$count.'</td>
                          <td>'. $row["parts_name"] .'</td>  
                          <td>'. $row["catagory"] .'</td>
                          <td>'. $row["size"] .'</td>
                          <td>'. $row["quantity"] .'</td>    
                          <td>'. number_format($row["amount"],3) .'</td>  
                          <td>'. number_format($row["profit"],3) .'</td>
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
            $totalProfit += $row['profit'];
                $output .= '  
                     <tr>
                          <td>'.$count.'</td>
                          <td colspan="4">Due/ '. $row["customer_name"].' ,'. $row["customer_address"] .'</td>  
                          <td>'. number_format($row["amount"],3) .'</td>
                          <td>'.number_format($row["profit"],3).'</td>
                     </tr> ';  
           }  
      }else{
       
      }

      
       $output .= '  
                     <tr>
                          <td colspan="5" style="color:red;font-weight:bold;">Total</td>
                          <td style="color:red;font-weight:bold;">'.number_format($totalAmount,3)  .'</td>  
                          <td style="color:red;font-weight:bold;">'. number_format($totalProfit,3) .'</td>
                     </tr> ';  

        $output .="</table>";
      echo $output;


?>