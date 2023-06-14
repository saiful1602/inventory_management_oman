<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];
  $date2=$_GET['date2'];
  $query="SELECT `date`,`invoice_no`,`purchase_by`,`supplier_address`,`supplier_name`,TRUNCATE(SUM(`amount`),3) AS amount FROM `purchased_product` WHERE `date` BETWEEN '$date1' AND '$date2' GROUP BY `invoice_no`";
  $output .= "<table class='content-table' style='margin-left: 50px;'>
        <thead>
          <tr>
            <th>Date</th>
            <th>Invoice</th>
            <th>Purchase By</th>
            <th>Supplier address </th>
            <th>Supplier name</th>
            <th>Amount</th>
            
          </tr>
        </thead>";
      $q=mysqli_query($con, $query);
      if(mysqli_num_rows($q) > 0)  
      {  
        $totalAmount=0;
           while($row = mysqli_fetch_assoc($q))  
           {  
            $totalAmount += $row['amount'];
            $newDate = date("d-m-Y", strtotime($row["date"]));
                $output .= '  
                     <tr>  
                          <td class="text-nowrap">'. $newDate .'</td>  
                          <td class="showInvo" data-id='.$row["invoice_no"].'>
                            <a style="text-decoration:none;" href="#">'. $row["invoice_no"] .'</a>
                          </td>
                          <td>'. $row["purchase_by"] .'</td>    
                          <td>'. $row["supplier_address"] .'</td>  
                          <td class="text-nowrap">'. $row["supplier_name"] .'</td>  
                          <td>'. $row["amount"] .'</td>
                     </tr>  
                ';  
           }

           $output .=
                '<tr> 
                    <td colspan="5" style="text-align:center;font-weight: bold;color:red;"> Total : </td>
                    <td style="font-weight: bold;color:red;">'. number_format($totalAmount,3). ' </td>
                 </tr>';
           
      }else{
        $output .= '  
                     <tr>  
                          <td colspan="6" >No record found</td>  
                           
                     </tr>  
                '; 
      }  

     
      echo $output;


?>