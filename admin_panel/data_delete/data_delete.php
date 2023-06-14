
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
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Data Entry Delete</title>
    <link rel="stylesheet" href="../../style.css">
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
    </style>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body style="background: #32aba9">
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Admin Panel</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../logger_setup/logger_setup.php">
          <i style="font-size: 32px;" class='bx bx-user-circle' ></i>
          <span class="link_name">1. Logger Setup</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../logger_setup/logger_setup.php">1. Logger Setup</a></li>
        </ul>
      </li>

      <li>
        <a href="../data_setup/data_setup.php">
          <i style="font-size: 32px;" class='bx bx-wrench' ></i>
          <span class="link_name">2. Data Setup Update</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../data_setup/data_setup.php">2. Data Setup</a></li>
        </ul>
      </li>

      <li>
        <a href="../data_entry_update/data_entry_update.php">
          <i style="font-size: 32px;" class='bx bx-calendar' ></i>
          <span class="link_name">3. Data Entry Update/Backdate</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../data_entry_update/data_entry_update.php">3. Data Entry Update/Backdate</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i style="font-size: 32px;" class='bx bx-eraser' ></i>
          <span class="link_name">4. Data Entry Delete</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">4. Data Delete</a></li>
        </ul>
      </li>
      
      <li style="margin-top: 6rem;">
        <a>
          <i class="bx bx-user"></i>
          <span class="link_name">Logger : <?php echo $txtName; ?></span>
        </a>
      </li>
      
      <li>
    <div class="profile-details">
      <div class="profile-content">
       <a href="../admin_logout.php"><i class='bx bx-log-out'></i></a>
      </div>
      <div class="name-job">
        <div align="center" class="profile_name">
          <a href="../admin_logout.php"><button class="logout btn btn-danger">Logout</button></a>
      </div>
      </div>
      <i ></i>
    </div>
  </li>

</ul>
  </div>
  <section class="home-section" style="background: #32aba9;">
    <div class="home-content ">
      <i class='bx bx-menu' ></i>
    </div>
    <div class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd; ">
      <div class="col-lg-10 text-center mx-auto">
      <label class="text-center fs-2 mb-3 headline">Data Entry Delete</label>
      <div class="row col col-lg-10 mx-auto text-center mb-3">
        
      	 <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Entry Form :</label>
          <select class="form-select" id="formSelect">
            <option value="">Select</option>
            <option value="purchased_product">Parts Import</option>
            <option value="parts_sales">Parts Sale</option>
            <option value="customer_collection">Customer Collection</option>
            <option value="supplier_payment">Supplier Payment</option>
            <option value="daily_other_cost">Daily Other Cost</option>
            <option value="monthly_profit_cost">Monthly profit Cost</option>
            <option value="saqar_payment">Saqar Payment</option>
            <option value="saqar_cost_entry">Saqar Cost Entry</option>
          </select>
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Invoice :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="InvoiceID" placeholder=" " >
        </div>

        <div class="mb-3 col-lg-12 d-flex" id="insertBtn">
          <div class="col-lg-5" align="right">
            <button class="btn btn-success" id="searchBtn" type="button">Search</button>
          </div>
          <div class="col-lg-2"></div>
          <div class="col-lg-5" align="left" id="deleteHide">
            <button class="btn btn-danger" type="button" id="invoiceDelete">Delete</button>
          </div>
        </div>


        </div>
      </div>
    </div>

    



   

  </section>

  
  <script src="../../script.js"></script>
  <script>
     $(document).ready(function(){
       $('#deleteHide').hide();
     })

     $('#searchBtn').click(function(){
      var formSelect = $('#formSelect').val();
      var InvoiceID = $('#InvoiceID').val();

      if(formSelect == 'purchased_product'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('importMemo.php?id='+ InvoiceID, 'Import Memo',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();
      }else if(formSelect == 'parts_sales'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('salesMemo.php?id='+ InvoiceID, 'Sales Memo',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();

      }else if(formSelect == 'customer_collection'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('cusColMemo.php?id='+ InvoiceID, 'Collection Memo',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();

      }else if(formSelect == 'supplier_payment'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('supPayMemo.php?id='+ InvoiceID, 'Payment Memo',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();

      }else if(formSelect == 'daily_other_cost'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('docMemo.php?id='+ InvoiceID, 'Daily Other Cost',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();

      }else if(formSelect == 'monthly_profit_cost'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('mpcMemo.php?id='+ InvoiceID, 'Monthly Profit Cost',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();

      }else if(formSelect == 'saqar_payment'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('saqarPayMemo.php?id='+ InvoiceID, 'Saqar Payment',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();

      }else if(formSelect == 'saqar_cost_entry'){

        var left = (screen.width - 800) / 2;
        var top = (screen.height - 400) / 4;
         
        var myWindow = window.open('saqarCostEntryMemo.php?id='+ InvoiceID, 'Saqar Cost Entry',
            'resizable=yes, width=' + '800'
            + ', height=' + '400' + ', top='
            + top + ', left=' + left);

        $('#deleteHide').show();

      }
     })

     /**************** Delete Function **************/

     $('#invoiceDelete').click(function(){
      /*$('#invoiceDelete').attr("disabled", "disabled");
      $('#invoiceDelete').text("Please Wait !!!");*/
      
      var formSelect = $('#formSelect').val();
      var InvoiceID = $('#InvoiceID').val();

      if(formSelect == 'purchased_product'){

         $.ajax({
          url: 'importDelete.php',
          type: "POST",
          data: { 
                  formSelect : formSelect,
                  InvoiceID : InvoiceID
                },
          success:function(response){
            swal({
                  title: "Message",
                  text: "Data Deleted",
                  type: "success"
                }).then(function(){
                  window.location ="data_delete.php";
                });
              
        }
      });

      }else if(formSelect == 'parts_sales'){

         $.ajax({
          url: 'salesDelete.php',
          type: "POST",
          data: { 
                  formSelect : formSelect,
                  InvoiceID : InvoiceID
                },
          success:function(response){
            alert(response)
            /*swal({
                  title: "Message",
                  text: "Data Deleted",
                  type: "success"
                }).then(function(){
                  window.location ="data_delete.php";
                });*/
              
        }
      });

      }else{
      
       $.ajax({
        url: 'deleteAjax.php',
        type: "POST",
        data: { 
                formSelect : formSelect,
                InvoiceID : InvoiceID
              },
        success:function(response){
          swal({
                title: "Message",
                text: "Data Deleted",
                type: "success"
              }).then(function(){
                window.location ="data_delete.php";
              });
        }
      });

       }

     })


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
