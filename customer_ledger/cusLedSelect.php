<?php
include('../DBconfig.php');


  $output = "";
  $cusName=$_GET['cusName'];
  $cusAddress=$_GET['cusAddress'];
  $query="SELECT `date` FROM `parts_sales` WHERE `customer_address`='$cusAddress' AND `customer_name`='$cusName'
          ORDER BY `date` ASC LIMIT 1";
  $q=mysqli_query($con, $query);

  $query2="SELECT `date` FROM `parts_sales` WHERE `customer_address`='$cusAddress' AND `customer_name`='$cusName'
          ORDER BY `date` DESC LIMIT 1";
  $q2=mysqli_query($con, $query2);

  $query3="SELECT `date` FROM `customer_collection` WHERE `customer_address`='$cusAddress' AND `customer_name`='$cusName'
           ORDER BY `date` ASC LIMIT 1";
  $q3=mysqli_query($con, $query3);

  $query4="SELECT `date` FROM `customer_collection` WHERE `customer_address`='$cusAddress' AND `customer_name`='$cusName'
           ORDER BY `date` DESC LIMIT 1";
  $q4=mysqli_query($con, $query4);

  $date1='';
  $date2='';
  $date3='';
  $date4='';

  if(mysqli_num_rows($q)){
    $row=mysqli_fetch_assoc($q);
  $date1=$row["date"];
  }
  
  if(mysqli_num_rows($q2)){
    $row2=mysqli_fetch_assoc($q2);
  $date2=$row2["date"];
  }

  if(mysqli_num_rows($q3)){
    $row3=mysqli_fetch_assoc($q3);
  $date3=$row3["date"];
  }

  if(mysqli_num_rows($q4)){
    $row4=mysqli_fetch_assoc($q4);
  $date4=$row4["date"];
  }


  $dt1 = new DateTime($date1);
  $dt2 = new DateTime($date2);
  $dt3 = new DateTime($date3);
  $dt4 = new DateTime($date4);

  if($dt1 < $dt3){
    $start = $dt1;
  }else{
    $start = $dt3;
  }

  if($dt2 > $dt4){
    $end = $dt2;
  }else{
    $end = $dt4;
  }

  $end = $end->modify( '+1 day' );

  $interval = new DateInterval('P1D');
  $daterange = new DatePeriod($start, $interval ,$end);


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

  $query5="SELECT `old_amount` FROM `customer_setup` WHERE `customer_name`='$cusName' AND `customer_address`='$cusAddress'";
  $q5=mysqli_query($con, $query5);
  $row5=mysqli_fetch_assoc($q5);
  $balance += $row5["old_amount"];

  $output .= '  
             <tr>  
                  <td colspan="4" align="right" style="font-weight: bold;color:red;">Previous :</td>  
                  <td align="center" style="font-weight: bold;color:red;">'. number_format($balance,3).'</td>
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
            $balance -= $row3["payAmount"];
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
                    <td align="center" style="text-align:center;font-weight: bold;color:red;">'. number_format($purAmnt,3). ' </td>
                    <td align="center" style="text-align:center;font-weight: bold;color:red;">'. number_format($payAmnt,3). ' </td>
                    <td></td>
                 </tr>';

          

     
      echo $output;
  


?>