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
    <title>Saqar Cash Report</title>
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
        font-size: 70%;
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
          <h3 class="headline3">Saqar Cash Report (SAYED) </h3>
          <div style="width:100%;" class="d-flex col-lg-12 col-md-12 col-sm-12 mx-auto text-center">
            <div style="width:67%;" class="col-lg-8 col-md-8 col-sm-8"></div>
            <h6 style="width:33%;text-align: center;color: #130091;" id="slMonth" class="headline2 col-lg-4 col-md-4 col-sm-4">Month : </h6>
          </div>
          
          <div class="divScroll container col-lg-12 rounded-3 text-center d-flex overflow-scroll" >

            <div class=" col-lg-6">
              <table id="table" class="table table-striped table-bordered tborder">
                <thead>
                  <th>Date</th>
                  <th>Invoice</th>
                  <th>Via</th>
                  <th>Pay Amount</th>
                </thead>
                
              </table>
            </div>


            <!-- Second Table -->


            <div class=" col-lg-6">
              <table id="table2" class="table table-striped table-bordered tborder">
                <thead>
                  <th>Date</th>
                  <th>Invoice</th>
                  <th>Cost Details</th>
                  <th>Amount</th>
                </thead>
              </table>
            </div>
              
            
          </div>
          <div style="padding-bottom: 5px;" class="col-lg-12 col-md-12 text-center">
            <table id="table3" class="table table-striped table-bordered">
            
            </table>
          </div>
      </div>
  </body>

   <script>

    var d = new Date();
    var today = d.getDate() + "-" + (d.getMonth()+1) + "-" + d.getFullYear();
    $('#curDate').text("Print Date : "+today)

    var time = new Date();
    $('#curTime').text("Print Time : " + time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }));



    /*********** Get Data From ajax *************/

   $(document).ready(function(){
     var date1 = $('#getDate1').text();
     var date2 = $('#getDate2').text();

     const searchDate = new Date(date1);  // 2009-11-10
     const month = searchDate.toLocaleString('default', { month: 'long' }) + "/" + searchDate.getFullYear();
     $('#slMonth').append(month)
     

      $.ajax({
          url : "scrSelect.php",
          type : "GET",
          data: { 
            'date1' : date1,
            'date2'  : date2
          },
          success : function(data){
            $('#table').html(data);
            
          }
        });
        $.ajax({
          url : "scrSelect2.php",
          type : "GET",
          data: { 
            'date1' : date1,
            'date2'  : date2
          },
          success : function(data){
            $('#table2').html(data);
            
          }
        });
        $.ajax({
          url : "scrSelect3.php",
          type : "GET",
          data: { 
            'date1' : date1,
            'date2'  : date2
          },
          success : function(data){
            $('#table3').html(data);
            
          }
        });
   })
   
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

</html>
