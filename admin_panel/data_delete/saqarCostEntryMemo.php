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
	<title>Saqar Cost Entry</title>
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
			font-size: 20px;
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
	<div>
	
		<?php
		$invoice=$_GET['id'];

		$query = "SELECT * FROM `saqar_cost_entry` WHERE `invoice_no`='$invoice'";
		$q=mysqli_query($con, $query);
		if(mysqli_num_rows($q) > 0){
	 ?>


	<div>	
		<p style="text-align: center;" class="title4"><u>
		Saqar Cost Entry 
		</u></p>
		<p style="padding-left:30px;" class="title5">Invoice : <?php echo $invoice; ?></p>
	</div>
	<br>
	
	<div>
	<table border="1px solid" style="width: 90%;margin-left: 5%;" class="data-table-total">
		
		<tr>
			<td>SL</td>
			<td>Cost Details</td>
			<td>Amount(OMR)</td>
			<td>Date</td>
		</tr>
	
	

		<!-- Select From database -->
				<?php
				$c="";
					

				$sel="SELECT `cost_details`,`amount`,`date` FROM `saqar_cost_entry` WHERE `invoice_no`='$invoice'";
					$q=mysqli_query($con, $sel);
					$count=1;
						while($row=mysqli_fetch_assoc($q))
						{
							$b=$row['cost_details'];
							$c=$row['amount'];
							$d=$row['date'];
				?>
				<tr>
					<td align="center"><?php echo $count; ?></td>
					<td align="center"><?php echo $b; ?></td>
					<td align="center"><?php echo number_format($c,3); ?></td>
					<td align="center"><?php echo $d; ?></td>
				</tr>
				<?php
				$count++;
				}
				?>
				
				</tr>
				
	</table>
	<input type="text" id="numWord" value="<?php echo $c; ?>" hidden>
	</div>
		<div style="width: 80%;margin-top: 1rem;margin-left: 3.5rem; ">
			<h3 class="result">IN WORD :</h3>
		</div>
	</div>

	<?php
	}else
	{
		?>
		<script>
			swal("There is no available Data in this invoice !!!!!")
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
			$('.result').append(text+" OMR ONLY");
			
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
            dec = 'point ' + inWords(Number(tmp[1])) + 'cents';
            
            num = Number(tmp[0]);
        }
        // end of decimal point code part.
    
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        
        if (!n) return; var str = '';
        
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'CRORE ' : '';
    
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'LAKH ' : '';
        
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'THOUSAND ' : '';
        
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'HUNDRED ' : '';
        
        str += (n[5] != 0) ? ((str != '') ? 'AND ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]])  : '';
        
       
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

