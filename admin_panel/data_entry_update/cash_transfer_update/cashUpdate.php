<?php   

include("../../../DBconfig.php");

  $refDate=$_POST['datepicker'];
  $date1=$_POST['datepicker2'];

  /******* Default Values ********/
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
         WHERE `payment_by`='my_cash' AND `date`='$date1' ";
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

  $sel7="SELECT `amount` FROM `cash_transfer`
         WHERE `date`='$date1'";
  $q7=mysqli_query($con, $sel7);
  if(mysqli_num_rows($q7) > 0){
    $row7 = mysqli_fetch_assoc($q7);
    $oldAmount += $row7['amount'];
  }
         
       
    $netTotal = $totalAmount - $totalCost;
          
    $netTotal = $netTotal - $totalProfit;

    $netTotal = $netTotal - $saqarPay;
         
    $netTotal = $netTotal + $oldAmount;


           $query="SELECT `date` FROM `cash_transfer` WHERE `date`='$refDate'";
           $q=mysqli_query($con, $query);

           $query7="SELECT * FROM `cash_transfer` WHERE `refDate`='$date1'";
           $q7=mysqli_query($con, $query7);

           

           	  if(mysqli_num_rows($q) > 0){
                 $query3="UPDATE `cash_transfer` SET `amount`='$netTotal',`refDate`='$refDate' WHERE `date`='$date1'";
                 mysqli_query($con, $query3);
               
	           }else{
	               $query2="INSERT INTO `cash_transfer`(`amount`,`date`,`refDate`)VALUES('$netTotal','$refDate','$date1')"; 
	               mysqli_query($con, $query2);
	           }
               $arr = array('status' => 'success', 'message' => 'Done');
           


	
      echo json_encode($arr);

?>
