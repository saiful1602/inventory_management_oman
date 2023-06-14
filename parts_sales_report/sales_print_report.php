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

$newDate1 = date("d-m-Y", strtotime($_GET['date1']));
$newDate2 = date("d-m-Y", strtotime($_GET['date2']));



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Parts Sales Report</title>
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
      .table th, .table td{
        padding: 1.5px 7px 1.5px 7px; /* Apply cell padding */
        font-weight: 500;
      }
      .table th{
        font-size: 15px;
        font-weight: 600;
        color: green;
      }
      .searchDate{
		 width: 100%;
      	 text-align: center;
      }
      .searchMonth{
		 width: 33%;
      	 text-align: center;
      	 color: #130091;
      }
      

    </style>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
 <body>
  
    <div class="container col-lg-12 rounded-3 text-center" style="background: white;">
          <h5 style="color:#130091;margin: 0;" class="headline2">علي بن محمد بخيت بيت مبارك للتجارة</h5>
          <h3 style="color:#130091;margin: 0;" class="headline2">ALI BIN MOHAMMED BAKHAIT BAIT MOBARAK TRAD . EST</h3>
          <h3 style="color:#130091;margin: 0;" class="headline2 mb-3">Sahalnoot Saniya , Salalah, Sultanate of Oman</h3>

          <div class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h6 style="width:33%;text-align: center;" id="curDate" class="headline2 col-lg-4 col-md-4 col-sm-4 text-center">Print Date : </h6>
            <h6 style="width:33%;text-align: center;" id="curTime" class="headline2 col-lg-4 col-md-4 col-sm-4 text-center">Print time : </h6> 
            <h5 id="getDate1" class="headline2 col-lg-4" hidden><?php echo $_GET['date1']; ?></h5>
            <h5 id="getDate2" class="headline2 col-lg-4" hidden><?php echo $_GET['date2']; ?></h5>
            <h6 style="width:33%;text-align: center;" class="headline2 col-lg-12 col-md-12 col-sm-12 text-center">Operator : <?php echo $username; ?></h6>
          </div>
          <h3 class="headline3">Parts Sales Report (SAYED) </h3>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 mx-auto text-center">
          	<h6 id="slDate" class="headline2 searchDate col-lg-4 col-md-4 col-sm-4">
          		Search Date : <?php echo $newDate1; ?> To : <?php echo $newDate2; ?></h6>
            
          </div>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 mx-auto text-center">
          	<div style="width: 67%;"></div>
          	<h6 id="slMonth" class="headline2 searchMonth col-lg-4 col-md-4 col-sm-4">Month : </h6>
          </div>
          
          <div class="divScroll container col-lg-12 rounded-3 text-center overflow-scroll" >

            <div class=" col-lg-6">
              <table id="table" class="table table-striped table-bordered tborder">
                
              </table>
            </div>
      	</div>

   <script>


	    var d = new Date();
	    var currentDate = d.getDate() + "-" + (d.getMonth()+1) + "-" + d.getFullYear();
	    $('#curDate').text("Print Date : " + currentDate);

	    var time = new Date();
	    $('#curTime').text("Print Time : " + time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }));

	  $(document).ready(function(){
	  	var date1 = $('#getDate1').text();
     	var date2 = $('#getDate2').text();
        var left = (screen.width - 1200) / 2;
        var top = (screen.height - 700) / 4;
        const searchDate = new Date(date1);  // 2009-11-10
     	const month = searchDate.toLocaleString('default', { month: 'long' }) + "/" + searchDate.getFullYear();
     	$('#slMonth').append(month)

	      if(date1 != "" && date2 != ""){
		  		$.ajax({
					url : "psrSelect.php",
					type : "GET",
					data: { 
						'date1' : date1,
						'date2' : date2
					},
					success : function(data){
						$('table').html(data);
						$('.showInvo').on('click',function(){
						  var invo=$(this).data('id');
							var currentRow=$(this).closest("tr");

							var myWindow = window.open('salesMemo.php?invoiceID='+ invo, 'Sales Memo',
                          'resizable=yes, width=' + '1200' + ', height=' + '700' + ', top='
                          + top + ', left=' + left);
						  });
					}
				});

      }else{
        swal("Please Select Valid Date")
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
