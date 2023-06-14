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


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Supplier Short Report</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
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
        font-size: 80%;
      }
 
      .table th, .table td{
        padding: 1.5px 7px 1.5px 7px; /* Apply cell padding */
        font-weight: bold;
      }
      .table th{
        font-size: 15px;
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

    <div class="container col-lg-10 col-md-10 col-sm-10 rounded-3 text-center" style="background: white;">
      
      <div id="PagePrintDiv" class="row divScroll overflow-scroll">
        <table id="table" class="table table-striped table-bordered">
        	<h4 style="color:#130091;" class="headline2">ALI BIN MOHAMMED BAKHAIT BAIT MOBARAK TRAD . EST</h4>
        	<h4 style="color:#130091;" class="headline2">Sahalnoot Saniya , Salalah, Sultanate of Oman</h4>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h6 style="width:33%;text-align: center;" id="curDate" class="headline2 col-lg-4 dtoSize">Print Date : </h6>
            <h6 style="width:33%;text-align: center;" id="curTime" class="headline2 col-lg-4 dtoSize">Print time : </h6>
            <h6 style="width:33%;text-align: center;" class="headline2 col-lg-4 text-center">Operator : <?php echo $username; ?></h6>
          </div>
        	<h3 class="headline2 text-center">Supplier Short Report</h3>
          <thead>
	          <tr>
	            <th>SL</th>
      				<th>Supplier Address</th>
      				<th>Supplier Name </th>
      				<th>Balance(OMR)</th>	
	          </tr>
          </thead>
          <tbody>
            <?php
            $count=1;
            $globalAmount=0;
            $subQuery="SELECT `sup_name`,`company_address`,`old_amount` FROM `supplier_setup`";
            $result=mysqli_query($con,$subQuery);
              while($subRow=mysqli_fetch_assoc($result)){
                $puAmount=0;
                $spAmount=0;
                $totalAmount=0;
                $oldSupAddress=$subRow['company_address'];
                $oldSupName=$subRow['sup_name'];
                $oldAmount =$subRow['old_amount'];
              $query="SELECT `supplier_address`,`supplier_name`,SUM(`amount`) AS amount FROM `purchased_product`
                    WHERE `purchase_by`='Due' AND `supplier_address`='$oldSupAddress' AND `supplier_name`='$oldSupName'";
              $q1=mysqli_query($con, $query);
              if(mysqli_num_rows($q1) > 0){
                while($row1=mysqli_fetch_assoc($q1)){
                  $puAmount=$row1['amount'];
                  $totalAmount += $puAmount;
                }
              }
              $query2="SELECT SUM(`spAmount`) AS amount2 FROM `supplier_payment`
                       WHERE `spAddress`='$oldSupAddress' AND `spName`='$oldSupName' ";
              $q2=mysqli_query($con, $query2);
              if(mysqli_num_rows($q2) > 0){
                while($row2=mysqli_fetch_assoc($q2)){
                  $spAmount=$row2['amount2'];
                  $totalAmount -= $spAmount;
                }
              }
              
              $totalAmount += $oldAmount;
              if($totalAmount > 0){
                  ?>
                    
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $oldSupAddress; ?></td>
                      <td><?php echo $oldSupName; ?></td>
                      <td><?php echo number_format($totalAmount,3); ?></td>
                    </tr>

                    <?php
                    $globalAmount += $totalAmount;
                    $count++;
                  }
                }
                ?>
                    <tr>
                      <td style="color: red;font-weight: bold;" colspan="3">Total :</td>
                      <td style="color: red;font-weight: bold;"><?php echo number_format($globalAmount,3); ?></td>
                    </tr>
          </tbody>
        </table>
      </div>
    </div>


  
  <script src="../script.js"></script>
  <script>

         // Redirect to login page

        $('#adminRef').click(function(){
          window.open("../Account/admin.php");
        })
    
          function printDiv(printDiv){
            var printContents = document.getElementById(printDiv).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

          }

          var today = new Date();
          var dd = String(today. getDate()). padStart(2, 0);
          var mm = String(today. getMonth() + 1). padStart(2, 0); //January is 0!
          var yyyy = today. getFullYear();

          today = dd + '-' + mm + '-' + yyyy;

          $(document).ready(function(){
            $('#curDate').text("Print Date : "+ today)
          })

          var time = new Date();
          $('#curTime').text("Print Time : " + time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }));

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
