<?php
include('../DBconfig.php');

  $output = "";
  $date1=$_GET['date1'];

  /******* Default Values ********/
  $refDate="";
  $totalAmount=0;
  $totalProfit=0;
  $totalCost=0;
  $profitCost=0;
  $netTotal=0;
  $saqarPay=0;
  $oldAmount=0;
  /*********** END **************/

  $sel="SELECT `date`,SUM(`amount`) AS total,SUM(`profit`) AS totalProfit
        FROM `parts_sales`
        WHERE `sales_by`='Cash' AND `date`='$date1' ";
  $q=mysqli_query($con, $sel);
  if(mysqli_num_rows($q) > 0){
    $row = mysqli_fetch_assoc($q);
    $totalAmount += $row['total'];
    $totalProfit += $row['totalProfit'];
  }

  $sel2="SELECT SUM(`cost_amount`) AS totalCost
         FROM `daily_other_cost` 
        WHERE `date`='$date1'";
  $q2=mysqli_query($con, $sel2);
  if(mysqli_num_rows($q2) > 0){
    $row2 = mysqli_fetch_assoc($q2);
    $totalCost += $row2['totalCost'];
  }

  $sel3="SELECT SUM(`amount`) AS Amount3,SUM(`profit`) AS Tprofit FROM `customer_collection`
        WHERE `date`='$date1'";
  $q3=mysqli_query($con, $sel3);
  if(mysqli_num_rows($q3) > 0){
    $row3 = mysqli_fetch_assoc($q3);
    $totalAmount += $row3['Amount3'];
    $totalProfit += $row3['Tprofit'];
  }

  $sel4="SELECT SUM(`amount`) AS Amount4 FROM `purchased_product`
         WHERE `date`='$date1' AND `purchase_by`='Cash'";
  $q4=mysqli_query($con, $sel4);
  if(mysqli_num_rows($q4) > 0){
    $row4 = mysqli_fetch_assoc($q4);
    $totalCost += $row4['Amount4'];
  }

  $sel5="SELECT SUM(`spAmount`) AS Amount5 FROM `supplier_payment`
         WHERE `payment_by`='my_cash' AND `date`='$date1'";
  $q5=mysqli_query($con, $sel5);
  if(mysqli_num_rows($q5) > 0){
    $row5 = mysqli_fetch_assoc($q5);
    $totalCost += $row5['Amount5'];
  }

  $sel6="SELECT SUM(`amount`) AS Amount6 FROM `saqar_payment`
         WHERE `date`='$date1'";
  $q6=mysqli_query($con, $sel6);
  if(mysqli_num_rows($q6) > 0){
    $row6 = mysqli_fetch_assoc($q6);
    $saqarPay= $row6['Amount6'];
  }

  $sel7="SELECT `refDate`,SUM(`amount`) AS Amount7 FROM `cash_transfer` WHERE `date`='$date1'";
  $q7=mysqli_query($con, $sel7);
  if(mysqli_num_rows($q7) > 0){
    $row7 = mysqli_fetch_assoc($q7);
    $oldAmount += $row7['Amount7'];
    $refDate = $row7['refDate'];
  }


  $output .= " <table id='table' class='table table-striped table-bordered'>

        <thead>
          <tr>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>";

            if($refDate != ""){
                $newDate = date("d-m-Y", strtotime($refDate));
            }else{
                $newDate="";
            }
                 $output .='
                    <tr>
                        <td style="color:red;font-weight:bold;">Previous Cash : ('.$newDate.')</td>
                        <td style="color:red;font-weight:bold;">'.number_format($oldAmount,3).'</td>
                     </tr> ';
                $output .= '
                     <tr>
                          <td>(+)Total Sale : </td>  
                          <td>'. number_format($totalAmount,3) .'</td>
                     </tr>';
            $totalAmount = $totalAmount + $oldAmount;
                $output .= '
                     <tr>
                        <td>Sub Total : </td>
                        <td>'.number_format($totalAmount,3).'</td>
                     </tr>
                     <tr>
                        <td>(-)Less Cost : </td>
                        <td>'.number_format($totalCost,3).'</td>
                     </tr> ';
            $netTotal = $totalAmount - $totalCost;
                $output .='
                    <tr>
                        <td>Total : </td>
                        <td>'.number_format($netTotal,3).'</td>
                     </tr> ';
                $output .='
                    <tr>
                        <td>(-)Less P-cost : </td>
                        <td>'.number_format($totalProfit,3).'</td>
                     </tr> ';
            $netTotal = $netTotal - $totalProfit;
                $output .='
                    <tr>
                        <td>Total : </td>
                        <td>'.number_format($netTotal,3).'</td>
                     </tr> ';
                $output .='
                    <tr>
                        <td>(-)Saqar sahalnoot pay : </td>
                        <td>'.number_format($saqarPay,3).'</td>
                     </tr> ';
            $netTotal = $netTotal - $saqarPay;
                $output .='
                    <tr>
                        <td style="font-weight:bold;color:green;">Net Cash : </td>
                        <td style="font-weight:bold;color:green;">'.number_format($netTotal,3).'</td>
                     </tr> ';

           



        $output .="</table>";
      echo $output;


?>