<?php
include("../DBconfig.php");
$id=$_SESSION['id'];
$Query="SELECT *FROM `accounts` WHERE `id`='$id'";
$result=mysqli_query($con, $Query);
$row=mysqli_fetch_assoc($result);
$user=$row['id'];
$username=$row['first_name'];
if(!isset($_SESSION['id'])){
  header('Location: ../Account/Login.php');
}
$supName="";
$partsName="";
if($_GET['supName'] && $_GET['partsName']){
$supName=$_GET['supName'];
$partsName=$_GET['partsName'];
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Stock Report</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style type="text/css">
      
    	label{
        color: white;
      }
      .headline{
        text-shadow: .5px .5px #000000;
        color: #fff;
      }
      .headline2{
        text-shadow: .5px .5px #000000;
        color: red;
      }
      .divScroll::-webkit-scrollbar {
        display: none;
      }

      body{
        font-size: 60%;
      }
 
      .table th, .table td{
        padding: 1.5px 7px 1.5px 7px; /* Apply cell padding */
        font-weight: bold;
      }
      .table th{
        font-size: 13px;
      }
      #table th{
        color: green;
      }
      #table2 th{
        color: red;
      }
      .tborder{
        border: 1px solid black;
      }

    </style>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
	<body>
  
    <div class="container col-lg-10 rounded-3 text-center" style="background: white;">
      <div class="row overflow-scroll divScroll">
        <table id="table" class="table table-striped table-bordered">
        	<h4 style="color:#130091;" class="headline2">ALI BIN MOHAMMED BAKHAIT BAIT MOBARAK TRAD . EST</h4>
          <h4 style="color:#130091;" class="headline2">Sahalnoot Saniya , Salalah, Sultanate of Oman</h4>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h6 style="width:33%;" id="curDate" class="headline2 col-lg-4">Print Date : </h6>
            <h6 style="width:33%;" id="curTime" class="headline2 col-lg-4">Print time : </h6>
            <h6 style="width:33%;" class="headline2 col-lg-4">Operator : <?php echo $username; ?></h6>
          </div>
          <h3 class="headline3">Stock Report</h3>
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
							<th>QTY</th>
							<th>Amount</th>
	          </tr>
          </thead>
          <tbody>
        <?php

				$query="SELECT `sl`,`date`,`invoice_no`,`purchase_by`,`supplier_name`,`parts_name`,`catagory`,`size`,`quantity`,`amount`
				 				FROM `stock_item` ORDER BY `parts_name`,`catagory`,`size`,`supplier_name`";
				$q=mysqli_query($con, $query);

				if(mysqli_num_rows($q) > 0)  
			      {  
			        $sl=0;
			        $tmp = '';
			        $output ='';
			        $total = 0;
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

				           if ($row['parts_name'].$row['catagory'].$row['size'] === $tmp){
					           	$output .=
			           				'<tr>  
			                          <td>'. $sl .'</td>  
			                          <td class="text-nowrap">'. $newDate .'</td>
			                          <td class="showInvo" data-id='.$row["invoice_no"].'>'. $row["invoice_no"] .'</td>    
			                          <td>'. $row["purchase_by"] .'</td>  
			                          <td class="text-nowrap">'. $row["supplier_name"] .'</td>  
			                          <td class="text-nowrap">'. $row["parts_name"] .'</td>
			                          <td class="text-nowrap">'. $row["catagory"] .'</td>
			                          <td class="text-nowrap">'. $row["size"] .'</td>
			                          <td>'. $row["quantity"] .'</td>
			                          <td>'. number_format($fullAmount,3) .'</td>
				                     </tr> ';  
					           	$total = $total + $row['quantity'];
				            }
				            else if($tmp !== ''){
					           	$output .='  
				                     <tr> 
				                     	<td colspan="8" style="font-weight: bold;color:red;"> Total </td>
				                     	<td style="font-weight: bolder;color:red;">'. $total. ' </td>
				                     </tr>';
				                $tmp =   $row['parts_name'].$row['catagory'].$row['size'];
				                $total = $row['quantity'];

			                	$output .=' <tr>  
					                          <td>'. $sl .'</td>  
						                          <td class="text-nowrap">'. $newDate .'</td>
						                          <td class="showInvo" data-id='.$row["invoice_no"].'>'. $row["invoice_no"] .'</td>    
						                          <td>'. $row["purchase_by"] .'</td>  
						                          <td class="text-nowrap">'. $row["supplier_name"] .'</td>  
						                          <td class="text-nowrap">'. $row["parts_name"] .'</td>
						                          <td class="text-nowrap">'. $row["catagory"] .'</td>
						                          <td class="text-nowrap">'. $row["size"] .'</td>
						                          <td>'. $row["quantity"] .'</td>
						                          <td>'. number_format($fullAmount,3) .'</td>
					                     </tr> ';  
				           	
				            }
				            else{
					           	$tmp = $row['parts_name'].$row['catagory'].$row['size'];
					           	$total = $total + $row['quantity'];
					           	$output .=' <tr>  
					                          <td>'. $sl .'</td>  
						                          <td class="text-nowrap">'. $newDate .'</td>
						                          <td class="showInvo" data-id='.$row["invoice_no"].'>'. $row["invoice_no"] .'</td>    
						                          <td>'. $row["purchase_by"] .'</td>  
						                          <td class="text-nowrap">'. $row["supplier_name"] .'</td>  
						                          <td class="text-nowrap">'. $row["parts_name"] .'</td>
						                          <td class="text-nowrap">'. $row["catagory"] .'</td>
						                          <td class="text-nowrap">'. $row["size"] .'</td>
						                          <td>'. $row["quantity"] .'</td>
						                          <td>'. number_format($fullAmount,3) .'</td>
					                     </tr> ';  
				            }

			            }
			            $output .='  
			                     <tr> 
			                     	<td colspan="8" style="font-weight: bold;color:red;"> Total </td>
			                     	<td align="center" style="font-weight: bolder;color:red;">'. $total. ' </td>
			                     </tr>'; // end of while loop

					      }else{
					        $output .= '<tr>  
					                      	<td colspan="10" >No record found</td>
					                     </tr>'; 
					      }
					      echo $output;  
				 ?>
          </tbody>
         		 <tr>
					 	<td colspan="8"  style="font-weight: bolder;color:red;">Grand Total :</td>
					 	<td style="color: red;font-weight: bold;">
					 		<?php
					 		$query="SELECT SUM(`quantity`) AS quantity FROM `stock_item`";
					 		$q=mysqli_query($con, $query);
					 		if($qnt=mysqli_fetch_assoc($q)){
					 			$quantity=$qnt['quantity'];
					 		}
					 		echo $quantity;
					 	 ?>
					 	 </td>
					 	 <td style="color: red;font-weight: bold;"><?php echo number_format($totalAmount,3); ?></td>
					 </tr>
        </table>
      </div>
    </div>

  <script>

  	 // Redirect to login page

    $('#adminRef').click(function(){
      window.open("../Account/admin.php");
    })

  	$(document).ready(function(){
  		var cuDateFormat=moment().format('DD-MM-YYYY');
  		$('#curDate').text("Print Date : "+cuDateFormat)
  		var time = new Date();
    	$('#curTime').text("Print Time : " + time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }));
  	})

	  	$(document).ready(function(){

	  	var supName = <?php echo json_encode($supName); ?>;
	  	var partsName = <?php echo json_encode($partsName); ?>;

	  	if(supName != "" && partsName != ""){
	  		$.ajax({
					url : "selectSR.php",
					type : "GET",
					data: { 
						'supName' : supName,
						'partsName' : partsName
					},
					success : function(data){
						$('table').html(data);
						$('.showInvo').on('click',function(){
						  	var invo=$(this).data('id');
							var currentRow=$(this).closest("tr");

							var id=invo;
							window.open("newMemo.php?id=" + id);
						  });
					}
				});
			}
	  });
	  
      /************ Update logger info **************/

      function updateUserStatus(){
        jQuery.ajax({
          url:'update_user_stats.php',
          success:function(){
            
          }
        });
      }


      setInterval(function(){
        updateUserStatus();
      },3000);
	  

	</script>
  

</body>
</html>
