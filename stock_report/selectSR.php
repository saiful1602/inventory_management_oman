<?php
include("../DBconfig.php");

  $output = "";
  $supName=$_GET['supName'];
  $partsName=$_GET['partsName'];
  $query="SELECT `sl`,`date`,`invoice_no`,`purchase_by`,`supplier_name`,`parts_name`,`catagory`,`size`,`quantity` FROM `stock_item`
          WHERE `supplier_name`='$supName' AND `parts_name`='$partsName'
          ORDER BY `parts_name`,`catagory`,`size`,`supplier_name`";
  $output .= "<table class='content-table' style='margin-left: 50px;'>
        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Invoice</th>
            <th>Purchase by</th>
            <th>Supplier name</th>
            <th>Parts name</th>
            <th>Catagory</th>
            <th>Size</th>
            <th>Qnt</th>
            <th>Amount</th>
          </tr>
        </thead>";
      $q=mysqli_query($con, $query);
      if(mysqli_num_rows($q) > 0)  
      {  
        $sl=0;
          $totalQnt = 0;
          $totalAmount=0;
           while($row = mysqli_fetch_assoc($q))  
           {  
               $sl=$sl+1;
                     $newDate = date("d-m-Y", strtotime($row["date"]));
                     $invoice = $row['invoice_no'];
                     $id = $row['sl'];
                      $subQuery="SELECT `amount`,`quantity` FROM `purchased_product` WHERE `invoice_no`='$invoice' AND `sl`='$id'";
                      $qry=mysqli_query($con, $subQuery);
                      $row2=mysqli_fetch_assoc($qry);
                     $amount = $row2['amount'];
                     $qnt= $row2['quantity'];
                     $subAmount= $amount / $qnt;
                     $fullAmount = $subAmount * $row['quantity'];
                     $totalAmount += $fullAmount;
                     $totalQnt += $row['quantity'];


                $output .=
                      '<tr>  
                          <td>'. $sl .'</td>  
                          <td class="text-nowrap">'. $row["date"] .'</td>
                          <td class="showInvo" data-id='.$row["invoice_no"].'>'. $row["invoice_no"] .'</td>    
                          <td align="center">'. $row["purchase_by"] .'</td>  
                          <td class="text-nowrap">'. $row["supplier_name"] .'</td>  
                          <td class="text-nowrap">'. $row["parts_name"] .'</td>
                          <td class="text-nowrap">'. $row["catagory"] .'</td>
                          <td class="text-nowrap">'. $row["size"] .'</td>
                          <td>'. $row["quantity"] .'</td>
                          <td>'. number_format($fullAmount,3) .'</td>
                       </tr> ';  
              
              

            }

            $output .= '  
                     <tr>  
                          <td colspan="8" style="font-weight: bolder;color:red;">Total :</td>
                          <td style="font-weight: bolder;color:red;">'.$totalQnt.'</td>
                          <td style="font-weight: bolder;color:red;">'.number_format($totalAmount,3).'</td>
                     </tr>  
                '; 
           
      }else{
        $output .= '  
                     <tr>  
                          <td colspan="10">No record found</td>  
                           
                     </tr>  
                '; 
      }  

     
      echo $output;


?>