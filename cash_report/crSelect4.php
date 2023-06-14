<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $sel="SELECT SUM(`amount`) AS Amount,SUM(`profit`) AS Profit FROM `parts_sales` WHERE `sales_by`='Cash' and `date` = '$date1' GROUP BY `date`";
  $q=mysqli_query($con, $sel);

  $sel2="SELECT SUM(`amount`) AS Amount2,SUM(`profit`) AS Profit2 FROM `customer_collection` WHERE `date`='$date1' ";
  $q2=mysqli_query($con, $sel2);


  $count=0;
  $totalAmount=0;
  $totalProfit=0;


      if(mysqli_num_rows($q) > 0)  
      {  
           if($row = mysqli_fetch_assoc($q))  

           {  
            $count++;
            $totalAmount += $row['Amount'];
            $totalProfit += $row['Profit'];
                
           }  
      }else{
        
      }

      if(mysqli_num_rows($q2) > 0)  
      {  
           while($row = mysqli_fetch_assoc($q2))  

           {  
            $count++;
            $totalAmount += $row['Amount2'];
            $totalProfit += $row['Profit2'];
                
           }  
      }else{
       
      }

      if($totalAmount != 0 || $totalProfit != 0){

      $totalAmount = $totalProfit / $totalAmount * 100; 

        $output .= '  <table id="table4" class="table table-striped table-bordered">
                     <thead
                      <th>
                         <td style="color:red;font-weight:bold;">Avarage Profit</td>  
                      </th>
                      <tbody>
                         <tr>
                          <td style="color:green;font-weight:bold;font-size:.7rem;">'.number_format($totalAmount,2).'%</td>  
                         </tr>
                      </tbody> ';

      }
       



      echo $output;


?>