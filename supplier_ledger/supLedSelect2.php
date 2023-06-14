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

  $supName=$_GET['supName'];
  $supAddress=$_GET['supAddress'];
  
  $output .= "<table id='table' class='table table-striped table-bordered'>
        <thead>
          <tr>
            <th>Date</th>
            <th>Invoice</th>
            <th>Purchase amount</th>
            <th>Pay amount</th>
            <th>Reason</th>
            <th>Balance</th>
          </tr>
        </thead>";

        $balance=0;
        $purAmnt=0;
        $payAmnt=0;
        $oldPurchase=0;
        $oldPayment=0;
        $prevAmount=0;

        $query="SELECT `old_amount` FROM `supplier_setup` WHERE `sup_name`='$supName' AND `company_address`='$supAddress'";
        $q=mysqli_query($con, $query);
        $row=mysqli_fetch_assoc($q);
        $balance += $row["old_amount"];

        $query4="SELECT SUM(`amount`) AS amount1 FROM `purchased_product` WHERE  `supplier_name`='$supName' AND
                `supplier_address`='$supAddress' AND `purchase_by`='Due' AND `date` < '$date1'";
        $q4=mysqli_query($con, $query4);
        if($row4=mysqli_fetch_assoc($q4)){
          $oldPurchase += $row4["amount1"];
        }

        $query5="SELECT SUM(`spAmount`) AS amount2 FROM `supplier_payment` WHERE  `spName`='$supName' AND
                `spAddress`='$supAddress' AND `date` < '$date1'";
        $q5=mysqli_query($con, $query5);
        if($row5=mysqli_fetch_assoc($q5)){
          $oldPayment += $row5["amount2"];
        }

        $prevAmount = $oldPurchase - $oldPayment;
        $balance += $prevAmount;

        $output .= '  
                   <tr>  
                        <td colspan="5" align="right" style="font-weight: bold;color:red;">Previous</td>  
                        <td style="font-weight: bold;color:red;">'.number_format($balance,3).'</td>
                   </tr>'; 

        foreach($daterange as $date){
             $dateloop=$date->format("Y-m-d");

          $query2="SELECT `date` AS purDate ,`invoice_no` AS purInvoice ,TRUNCATE(SUM(`purchased_product`.`amount`),3) AS purAmount
          FROM `purchased_product` WHERE `supplier_address`='$supAddress' AND `supplier_name`='$supName' AND `date`='$dateloop'
          GROUP BY `invoice_no`";
          $q2=mysqli_query($con, $query2);

          $query3="SELECT `date` AS payDate ,`invoice_no` AS payInvoice ,TRUNCATE(SUM(`spAmount`),3) AS payAmount,`payment_by`,`reason`
                   FROM `supplier_payment` WHERE `spAddress`='$supAddress' AND `spName`='$supName' AND `date`='$dateloop'
                   GROUP BY `invoice_no`";
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
                        <td>'. number_format($row2["purAmount"],3) .'</td>   
                        <td>-</td>
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
                        <td>'. $row3["payInvoice"] .' /'.$row3["payment_by"].'</td> 
                        <td>-</td>   
                        <td>'. number_format($row3["payAmount"],3) .'</td>
                        <td>'.$row3["reason"].'</td>
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
                    <td colspan="2"></td>
                 </tr>';

          

     
      echo $output;


?>