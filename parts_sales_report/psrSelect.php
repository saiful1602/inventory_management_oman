<?php
include('../DBconfig.php');


  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $query="SELECT `date`,`invoice_no`,`sales_by`,`customer_name`,`customer_address`,TRUNCATE(SUM(`amount`),3) AS amount FROM `parts_sales`
          WHERE `date` BETWEEN '$date1' AND '$date2' GROUP BY `invoice_no`";
  $output .= "<table class='content-table' style='margin-left: 50px;'>
        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Invoice</th>
            <th class='text-nowrap'>Sales By</th>
            <th>Address </th>
            <th>Customer name</th>
            <th>Amount</th>
          </tr>
        </thead>";
      $q=mysqli_query($con, $query);
      if(mysqli_num_rows($q) > 0)  
      {  
        $totalAmount=0;
        $sl=0;
           while($row = mysqli_fetch_array($q))  
           {  
            $totalAmount += $row["amount"];
            $newDate = date("d-m-Y", strtotime($row["date"]));
            $sl=$sl+1;
                $output .= '  
                     <tr>
                          <td>'. $sl .'</td>    
                          <td class="text-nowrap">'. $newDate .'</td>  
                          <td class="showInvo" data-id='.$row["invoice_no"].'><a style="text-decoration:none;" href="#">'. $row["invoice_no"] .'</a></td>
                          <td>'. $row["sales_by"] .'</td>    
                          <td>'. $row["customer_address"] .'</td>  
                          <td class="text-nowrap">'. $row["customer_name"] .'</td>  
                          <td>'. $row["amount"] .'</td>
                     </tr>';  
           }

           $output .=
                '<tr> 
                    <td colspan="6" style="text-align:center;font-weight: bold;color:red;"> Total Sale : </td>
                    <td style="font-weight: bold;color:red;">'. number_format($totalAmount,3). ' </td>
                 </tr>';

      }else{
        $output .= '  
                     <tr>  
                          <td colspan="8">No Data found</td>  
                           
                     </tr>'; 
      }  

     
      echo $output;


?>