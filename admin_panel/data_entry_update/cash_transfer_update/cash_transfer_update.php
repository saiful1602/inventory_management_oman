<?php   

include("../../../DBconfig.php");
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
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Cash Transfer Update</title>
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
        text-decoration: underline;
        text-underline-offset: 8px;
      }
      .headline2{
        text-shadow: .5px .5px #000000;
        color: red;
      }
      .headline3{
        
      }
    </style>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body style="background: #4a91bd;">
    <div id="tableDiv" class="container col-lg-12 rounded-3 text-center" style="background: #4a91bd;padding-top:2rem;padding-bottom: 5rem;">
      <label style="" class="form-label text-center fs-2 headline">Cash Transfer Update</label>
      <div class=" col-lg-8 mx-auto">
        <div class="row mx-auto  mb-3">
          <div class="mb-3 col-lg-6 col-md-6 col-sm-6 text-center">
            <label class="form-label font-color1">Select Date :</label><br>
            <input type="text" class="form-control text-center" id="datepicker" placeholder="Select Date " maxlength="40" readonly>
          </div>
          <div style="padding-top:2rem;" align="left" class="mb-3 col-lg-6 col-md-6 col-sm-6">
            <button class="btn btn-success" id="searchBtn" type="button">Search</button>
          </div>
        </div>
      </div>

      <div class="mb-3 col-lg-10 col-md-10 col-sm-12 text-center d-flex">

        <div class="col-lg-4">
          <label id="CashDate" class="form-label font-color1 fs-5 fw-bold">Cash Date : </label>
        </div>
        <div class="col-lg-4">
          <label id="PrevDate" class="form-label font-color1 fs-5 fw-bold">Prev Date : </label>
        </div>
        <div class="col-lg-4">
          <label id="txtAmount" class="form-label font-color1 fs-5 fw-bold">Previous Amount : </label>
        </div>
        
      </div>
      <div class="container col-lg-8 rounded-3 ">
        <div id="PrevDateDiv" class="mb-3 col-lg-6 text-center">
          <label class="form-label font-color1">Previous Date :</label><br>
          <input type="text" class="form-control text-center" id="datepicker2" placeholder="Select Date " readonly>
        </div>
        <div id="updateDiv" style="padding-top:2rem;" class="mb-3 col-lg-6 col-md-6 col-sm-6 text-center">
            <button class="btn btn-primary" id="updateBtn" type="button">Update</button>
          </div>
      </div>
    </div>
            

  <script>

    $(document).ready(function(){
      $('#PrevDateDiv').hide();
      $('#updateDiv').hide();
    })

  	$(function(){
	    $( "#datepicker" ).datepicker({
	      dateFormat: "yy-mm-dd",
	      changeMonth: true,
	      changeYear: true,
          maxDate: new Date
	    	});
	 	 });

  	$(function(){
	    $( "#datepicker2" ).datepicker({
	      dateFormat: "yy-mm-dd",
	      changeMonth: true,
	      changeYear: true,
          maxDate: new Date
	    	});
	 	 });

  	 /**************** Data Update with Ajax ****************/

    var getDate="";
    var getRefDate="";
    var getAmount="";

    $(document).on('click','#searchBtn',function(){
      var datepicker = $("#datepicker").val();

      if(datepicker !=""){

        $.ajax({
          url: 'selectDateAjax.php',
          type: "GET",
          data:{
            datepicker : datepicker
          },
          success:function(response){

          var data = $.parseJSON(response);
              getAmount = data.amount;
              getDate = data.date;
              getRefDate = data.refDate;
              $('#CashDate').text('Cash Date : '+getDate)
              $('#PrevDate').text('Prev Date : '+getRefDate)
              $('#txtAmount').text('Amount : '+getAmount)
              $('#PrevDateDiv').show();
              $('#updateDiv').show();
      			 
          }
        });

      }else{
        swal("Please fill the form")
      }
    });


     /**************** Data Update with Ajax ****************/

    $(document).on('click','#updateBtn',function(){
      $('#updateBtn').attr("disabled", "disabled");
      $('#updateBtn').text("Please Wait !!!");
      
      var datepicker = $("#datepicker").val();
      var datepicker2 = $("#datepicker2").val();

      if(datepicker !="" && datepicker2 !=""){

        $.ajax({
          url: 'cashUpdate.php',
          type: "POST",
          data:{
            datepicker:datepicker,
            datepicker2 : datepicker2
          },
          success:function(response){
            var data = $.parseJSON(response);
            if(data.status ==  'success'){
              swal({
                title: "Message",
                text: "Data Updated",
                type: "success"
              }).then(function(){
                window.location ="cash_transfer_update.php";
               
              });
            }else{
              swal("Data Update Failed !!")
            }
          }
        });

      }else{
        swal("Please fill the form")
      }
    });


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
