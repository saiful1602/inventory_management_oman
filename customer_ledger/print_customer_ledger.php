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
$date1 = "";
$date2 = "";
$newDate1 = "";
$newDate2 = "";
if($_GET['date1'] != "" && $_GET['date2'] != ""){
  $date1 = $_GET['date1'];
  $date2 = $_GET['date2'];
  $newDate1 = date("d-m-Y", strtotime($_GET['date1']));
  $newDate2 = date("d-m-Y", strtotime($_GET['date2']));
}


$cusAddress = $_GET['cusAddress'];
$cusName = $_GET['cusName'];

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Customer Ledger</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
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

    <div class="container col-lg-10 rounded-3 text-center" style="background: white;">

      <div class="row overflow-scroll divScroll">
       <table id="table" class="table table-striped table-bordered">
          <h4 style="color:#130091;" class="headline2">ALI BIN MOHAMMED BAKHAIT BAIT MOBARAK TRAD . EST</h4>
          <h4 style="color:#130091;" class="headline2">Sahalnoot Saniya , Salalah, Sultanate of Oman</h4>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h6 style="width:33%;" id="curDate" class="headline2 col-lg-4">Print Date : <?php echo $newDate1; ?></h6>
            <h6 style="width:33%;" id="curTime" class="headline2 col-lg-4">Print time : <?php echo $newDate2; ?></h6>
            <h6 style="width:33%;" class="headline2 col-lg-4">Operator : <?php echo $username; ?></h6>
          </div>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h6 style="width:50%;text-align: center;" id="getCusAddress" class="headline2 col-lg-4 dtoSize" hidden><?php echo $cusAddress; ?></h6>
            <h6 style="width:50%;text-align: center;" id="getCusName" class="headline2 col-lg-4 dtoSize" hidden><?php echo $cusName; ?></h6>
          </div>
          <h3 class="headline3">Customer Ledger</h3>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h6 style="width:33%;text-align: center;" id="printCusAddress" class="headline2 col-lg-6">Address : <?php echo $cusAddress; ?></h6>
            <h6 style="width:33%;text-align: center;" id="printCusName" class="headline2 col-lg-6">Name : <?php echo $cusName; ?></h6>
            <h6 style="width:33%;text-align: center;" id="printCusMobile" class="headline2 col-lg-6">Tel :</h6>
          </div>
          <?php
            if($newDate1 != "" && $newDate2 != ""){
          ?>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 mx-auto text-center">
            <h6 style="text-align: center;width: 100%;" id="slDate" class="headline2 searchDate col-lg-12 col-md-12 col-sm-12">
              Search Date : <?php echo $newDate1; ?> To : <?php echo $newDate2; ?></h6>
          </div>
          <?php } ?>
          <thead>

          </thead>
          <tbody>
           
          </tbody>
        </table>
      </div>
    </div>

  <script>



    var d = new Date();
    var currentDate = d.getDate() + "-" + (d.getMonth()+1) + "-" + d.getFullYear();
    $('#curDate').text("Print Date : " + currentDate);

    var time = new Date();
    $('#curTime').text("Print Time : " + time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }));



	  /********* Search by Date ************/

	  $(document).ready(function(){
	  	var date1 = <?php echo json_encode($date1); ?>;
	  	var date2 = <?php echo json_encode($date2); ?>;
	  	var cusAddress = <?php echo json_encode($cusAddress); ?>;
	  	var cusName = <?php echo json_encode($cusName); ?>;
      var left = (screen.width - 1200) / 2;
      var top = (screen.height - 700) / 4;

	  	if(date1 == "" && date2 == "" && cusAddress != "" && cusName != ""){
	  		$.ajax({
				url : "cusLedSelect.php",
				type : "GET",
				data: { 
					'cusAddress' : cusAddress,
					'cusName' : cusName
				},
				success : function(data){
					 $('table').html(data);
           $('tr:nth-last-child(2) td:last-child').css({"color" : "blue" , "font-weight" : "bold", "font-size" : "1.2rem"})
           $('#cusLedgerDiv').show();
           $('.showInvo').on('click',function(){
            var invo=$(this).data('id');
            var currentRow=$(this).closest("tr");
            var myWindow = window.open('salesMemo.php?invoiceID='+ invo, 'Sales Memo',
                'resizable=yes, width=' + '1200' + ', height=' + '700' + ', top='
                + top + ', left=' + left);
            });

				}
				});

        /************ Get Mobile No **************/

        $.ajax({
        url : "getCusMobile.php",
        type : "GET",
        data: { 
          cusAddress : cusAddress,
          cusName : cusName
        },
        success : function(data){
           $('#printCusAddress').text("Address : "+cusAddress);
           $('#printCusName').text("Name : "+cusName);  
           $('#printCusMobile').text("Tel : "+data);
        }
        });

        

		}else if(date1 != "" && date2 != "" && cusAddress != "" && cusName != ""){
			$.ajax({
				url : "cusLedSelect2.php",
				type : "GET",
				data: { 
					'date1' : date1,
					'date2' : date2,
					'cusName' : cusName,
					'cusAddress' : cusAddress
				},
				success : function(data){
					$('table').html(data);
          $('tr:nth-last-child(2) td:last-child').css({"color" : "blue" , "font-weight" : "bold", "font-size" : "1.2rem"})
          $('.showInvo').on('click',function(){
            var invo=$(this).data('id');
            var currentRow=$(this).closest("tr");
            var myWindow = window.open('salesMemo.php?invoiceID='+ invo, 'Sales Memo',
                'resizable=yes, width=' + '1200' + ', height=' + '700' + ', top='
                + top + ', left=' + left);
            });

				}
			});

       /************ Get Mobile No **************/

        $.ajax({
        url : "getCusMobile.php",
        type : "GET",
        data: { 
          cusAddress : cusAddress,
          cusName : cusName
        },
        success : function(data){
           $('#printCusAddress').text("Address : "+cusAddress);
           $('#printCusName').text("Name : "+cusName);  
           $('#printCusMobile').text("Tel : "+data);
        }
        });
		}else{
			swal("Please select valid information")
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
