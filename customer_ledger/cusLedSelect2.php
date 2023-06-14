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

  $cusName=$_GET['cusName'];
  $cusAddress=$_GET['cusAddress'];
  
  $output .= "<table id='table' class='table table-striped table-bordered'>
        <thead>
          <tr>
            <th>Date</th>
            <th>Invoice</th>
            <th>Sales amount</th>
            <th>Pay amount</th>
            <th>Balance</th>
          </tr>
        </thead>";

        $balance=0;
        $purAmnt=0;
        $payAmnt=0;
        $oldSales=0;
        $oldCollection=0;
        $prevAmount=0;

        $query="SELECT `old_amount` FROM `customer_setup` WHERE `customer_name`='$cusName' AND `customer_address`='$cusAddress'";
        $q=mysqli_query($con, $query);
        if($row=mysqli_fetch_assoc($q)){
          $balance += $row["old_amount"];
        }

        $query4="SELECT SUM(`amount`) AS amount1 FROM `parts_sales` WHERE  `customer_name`='$cusName' AND
                `customer_address`='$cusAddress' AND `sales_by`='Due' AND `date` < '$date1'";
        $q4=mysqli_query($con, $query4);
        if($row4=mysqli_fetch_assoc($q4)){
          $oldSales += $row4["amount1"];
        }

        $query5="SELECT SUM(`amount`) AS amount2 FROM `customer_collection` WHERE  `customer_name`='$cusName' AND
                `customer_address`='$cusAddress' AND `date` < '$date1'";
        $q5=mysqli_query($con, $query5);
        if($row5=mysqli_fetch_assoc($q5)){
          $oldCollection += $row5["amount2"];
        }
        $prevAmount = $oldSales - $oldCollection;
        $balance += $prevAmount;
        
        

        $output .= '  
                   <tr>  
                        <td colspan="4" align="right" style="font-weight: bold;color:red;">Previous :</td>  
                        <td align="center" style="font-weight: bold;color:red;">'.number_format($balance,3).'</td>
                   </tr>'; 

        foreach($daterange as $date){
             $dateloop=$date->format("Y-m-d") . "<br>";

           $query2="SELECT `date` AS purDate ,`invoice_no` AS purInvoice ,TRUNCATE(SUM(`amount`),3) AS purAmount
          			FROM `parts_sales` WHERE `customer_address`='$cusAddress' AND `customer_name`='$cusName' AND `date`='$dateloop'
          			GROUP BY `invoice_no`";
          $q2=mysqli_query($con, $query2);
          $query3="SELECT `date` AS payDate ,`invoice_no` AS payInvoice ,TRUNCATE(SUM(`amount`),3) AS payAmount
                   FROM `customer_collection` WHERE `customer_address`='$cusAddress' AND `customer_name`='$cusName' AND
                   `date`='$dateloop' GROUP BY `invoice_no`";
          $q3=mysqli_query($con, $query3);

          if(mysqli_num_rows($q2) > 0)
          {  
            while($row2=mysqli_fetch_assoc($q2)){

            $newDate = date("d-m-Y", strtotime($row2["purDate"]));
            $balance +=$row2["purAmount"];
            $purAmnt += $row2["purAmount"];

              $output .= '  
                   <tr>  
                        <td>'. $newDate .'</td>  
                        <td class="showInvo" data-id='.$row2["purInvoice"].'>
                          <a style="text-decoration:none;" href="#">'. $row2["purInvoice"] .'</a>
                        </td>
                        <td>'. $row2["purAmount"] .'</td>   
                        <td>-</td>
                        <td>'.number_format($balance,3).'</td>
                   </tr>';  
              }
          }
          if(mysqli_num_rows($q3) > 0)
          {  
            while($row3=mysqli_fetch_assoc($q3)){
            
            $newDate = date("d-m-Y", strtotime($row3["payDate"]));
            $balance -=$row3["payAmount"];
            $payAmnt += $row3["payAmount"];
              $output .= '  
                   <tr>  
                        <td>'. $newDate .'</td>  
                        <td>'. $row3["payInvoice"] .'</td> 
                        <td>-</td>   
                        <td>'. $row3["payAmount"] .'</td>
                        <td>'.number_format($balance,3).'</td>
                   </tr>';  
              }
          }

      }

      $output .=
                '<tr> 
                    <td colspan="2" style="text-align:center;font-weight: bold;color:red;"> Total </td>
                    <td style="font-weight: bold;color:red;">'. number_format($purAmnt,3). ' </td>
                    <td style="font-weight: bold;color:red;">'. number_format($payAmnt,3). ' </td>
                    <td></td>
                 </tr>';

          

     
      echo $output;


?>