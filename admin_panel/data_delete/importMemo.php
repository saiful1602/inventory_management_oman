<?php

include("../../DBconfig.php");
$admin_id=$_SESSION['admin_id'];
$Query="SELECT *FROM `admin_panel` WHERE `admin_id`='$admin_id'";
$result=mysqli_query($con, $Query);
$row=mysqli_fetch_assoc($result);
$user=$row['admin_name'];
$txtName=$row['admin_name'];
if(!isset($_SESSION['admin_id'])){
  header('Location: Account/admin.php');
}
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exit Page</title>
	<style type="text/css">
		*{
			
			margin: 3px;
		}
		.title1{
			font-size: 28px;
			font-family: serif;
			font-weight: bold;
			color: red;
			margin-top: 5px;
		}
		.title2{
			font-size: 27px;
			font-family: serif;
			font-weight: bold;
			margin-top: 5px;
		}
		.title3{
			font-size: 28px;
			font-family: serif;
			font-weight: bold;
			margin-top: 5px;
			
		}
		.title4{
			font-size: 28px;
			font-family: serif;
			font-weight: bold;
			color: green;
			margin-top: 5px;
			
		}
		.title5{
			font-size: 1.05rem;
			font-family: serif;
			margin-top: 5px;
			font-weight: bold;
			
		}
		.dateTimeOpr{
			display: flex;
			grid-template-columns: repeat(3, 1fr);
			width: 100%;
			padding-left: 5%;
			column-gap: -1rem;
		}
		.data-table-total{
  	 	 border-collapse: collapse;
		}
		.data-table-total td{
  	 	 border: 1px solid black;
  	 	 text-align: center;
		}
		.inWordsStyle{
			color: red;
		}
		table td{
        border:1px solid black;
   		 }

   		 .printButton{
   		 	width: 100px;
   		 	height: 50px;
   		 }
   		

		
	</style>
	<script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="numtoword.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>
	<?php
		$invoice=$_GET['id'];

		$query = "SELECT * FROM `purchased_product` WHERE `invoice_no`='$invoice'";
		$q=mysqli_query($con, $query);
		if(mysqli_num_rows($q) > 0){
	 ?>
	<div>
	
	<div>
		
		<p style="text-align: center;" class="title4"><u>
		Product Purchase Memo
		</u></p>
		<p style="padding-left:30px;" class="title5">Invoice : <?php echo $invoice; ?></p>
	</div>

	
	<br>
	<div class="dateTimeOpr">
		<p class="title5" style="width: 50%;">Supplier name :
		 <?php 
		 	$query="SELECT `supplier_name` FROM `purchased_product` WHERE `invoice_no`='$invoice' GROUP BY `supplier_name`";
		 	$q=mysqli_query($con, $query);
		 	if($q){
		 		$data=mysqli_fetch_assoc($q);
		 		$Sname=$data['supplier_name'];
		 	}
		 	echo $Sname;
		  ?></p>
		<p class="title5" style="width: 25%;">Address :
			<?php 
		 	$query="SELECT `supplier_address` FROM `purchased_product` WHERE `invoice_no`='$invoice' GROUP BY `supplier_address`";
		 	$q=mysqli_query($con, $query);
		 	if($q){
		 		$data=mysqli_fetch_assoc($q);
		 		$Saddress=$data['supplier_address'];
		 	}
		 	echo $Saddress;
		  ?>
		</p>
		<p class="title5" style="width: 25%;">Mobile :
			<?php 
			$Mnum="";
		 	$query="SELECT `supplier_name` FROM `purchased_product` WHERE `invoice_no`='$invoice' GROUP BY `supplier_name` ";
		 	$q=mysqli_query($con, $query);
		 	if(mysqli_num_rows($q)>0){
		 		$data=mysqli_fetch_assoc($q);
		 		$Gname=$data['supplier_name'];
		 		$query2="SELECT `mobile_no` FROM `supplier_setup` WHERE `sup_name` = '$Gname' GROUP BY `sup_name`";
		 		$q2=mysqli_query($con, $query2);
		 		if(mysqli_num_rows($q2) > 0){

		 			$data2=mysqli_fetch_assoc($q2);
		 			$Mnum=$data2['mobile_no'];

		 		}
		 	}
		 	echo $Mnum;
		 	
		  ?>
		</p>
	</div>
	<div>
	<table border="1px solid" style="width: 90%;margin-left: 5%;" class="data-table-total">
		
		<tr>
			<td>SL</td>
			<td>PURCHASE BY</td>
			<td>PARTS NAME</td>
			<td>CATAGORY</td>
			<td>SIZE</td>
			<td>QTY</td>
			<td>AMOUNT</td>
		</tr>
	
	

		<!-- Select From database -->
				<?php
					

				$sel="SELECT `sl`,`purchase_by`,`parts_name`,`catagory`,`size`,`quantity`,`amount` FROM `purchased_product` WHERE `invoice_no`='$invoice'";
					$q=mysqli_query($con, $sel);
					$count=1;
						while($row=mysqli_fetch_array($q))
						{
							$a=$row['sl'];
							$b=$row['purchase_by'];
							$c=$row['parts_name'];
							$d=$row['catagory'];
							$e=$row['size'];
							$f=$row['quantity'];
							$g=$row['amount'];
				?>
				<tr>
					<td align="center"><?php echo $a; ?></td>
					<td align="center"><?php echo $b; ?></td>
					<td align="center"><?php echo $c; ?></td>
					<td align="center"><?php echo $d; ?></td>
					<td align="center"><?php echo $e; ?></td>
					<td align="center"><?php echo $f; ?></td>
					<td align="center"><?php echo number_format($g,3); ?></td>
				</tr>
				<?php
				$count++;
				}
				?>
				<tr>
					<td colspan="5" align="center" style="font-weight: bold;color: red;">TOTAL : </td>
					<td align="center" style="color: red;font-weight: bold;">
					<?php
						$query="SELECT SUM(`quantity`) FROM `purchased_product` WHERE `invoice_no`='$invoice'";
						$q=mysqli_query($con, $query);
						if($q){
							$data=mysqli_fetch_assoc($q);
							$Sqnt=$data['SUM(`quantity`)'];
						}
						echo $Sqnt;

					 ?>
					</td>
					<td align="center" style="color: red;font-weight: bold;">
						<?php
						$query="SELECT SUM(`amount`) FROM `purchased_product` WHERE `invoice_no`='$invoice'";
						$q=mysqli_query($con, $query);
						if($q){
							$data=mysqli_fetch_assoc($q);
							$Samnt=$data['SUM(`amount`)'];
						}
						echo number_format($Samnt,3);

					 ?>
					</td>
				</tr>
				
	</table>
	<input type="text" id="numWord" value="<?php echo number_format($Samnt,3); ?>" hidden>
	</div>
		<div style="width: 80%;margin-top: 1rem;margin-left: 3.5rem; ">
			<h3 class="result ">IN WORD :</h3>
		</div>

	</div>

	<?php
		}else{
			?>
			<script>
				swal("There is no available product in this invoice !!!!!")
				.then((value) => {
				  window.close();
				});
			</script>
			<?php
		}
	 ?>



	<script>
		$(document).ready(function(){
			let current_time = moment().format("h:mm a");
			$('#Ptime').append(current_time);
		});

		$(document).ready(function(){
			var num = $('#numWord').val();
			var text=inWords(num);
			$('.result').append(text+" ONLY");
			
		});





	function inWords (num) {
    
    		var a = ['','ONE ','TWO ','THREE ','FOUR ', 'FIVE ','SIX ','SEVEN '       ,'EIGHT ','NINE ','TEN ','ELEVEN ','TWELVE ','THIRTEEN '         ,'FOURTEEN ','FIFTEEN ','SIXTEEN ','SEVENTEEN ','EIGHTEEN '      ,'NINETEEN '];
    		var b = ['', '', 'TWENTY','THIRTY','FORTY','FIFTY', 'SIXTY','SEVENTY'      ,'EIGHTY','NINETY'];
    		var dec = '';
   	 
   			// this part of code is edited to support decimal point
    
   		 	var s_num = num.toString()
    
   		 	if (s_num.includes('.') && s_num.split('.')[0].length > 9){
        
        	return num;
        
    		}
    		else if (!s_num.includes('.') && s_num.length > 9){
        	return num;
    		}
    		else{

        	if (num.toString().includes('.')){
            
            // used recursion to get decimal point value in words
            let tmp = num.toString().split('.');
            dec = 'RIAL AND ' + inWords(Number(tmp[1])) + 'BAISA';
            
            num = Number(tmp[0]);
        }
        // end of decimal point code part.
    
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        
        if (!n) return; var str = '';
        
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'CRORE ' : '';
    
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'LAKH ' : '';
        
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'THOUSAND ' : '';
        
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'HUNDRED ' : '';
        
        str += (n[5] != 0) ? ((str != '') ? ' ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]])  : '';
        
       
        return str + dec ;
    	}
    
	}



    /************* Admin logger info **************/    

    function updateUserStatus(){
      jQuery.ajax({
        url:'update_admin_stats.php',
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


