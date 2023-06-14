
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
    <title>Data Setup</title>
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
        <a href="#">
          <i style="font-size: 32px;" class='bx bx-wrench' ></i>
          <span class="link_name">2. Data Setup Update</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">2. Data Setup</a></li>
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
        <a href="../data_delete/data_delete.php">
          <i style="font-size: 32px;" class='bx bx-eraser' ></i>
          <span class="link_name">4. Data Entry Delete</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../data_delete/data_delete.php">4. Data Delete</a></li>
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
      <label class="text-center fs-2 mb-3 headline">Data Setup Update</label>
      <div class="row col col-lg-10 mx-auto text-center mb-3">
        
      	 <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Setup Form :</label>
          <select class="form-select" id="formSelect">
            <option value="">Select</option>
            <option value="supplier_setup">Supplier Setup</option>
            <option value="parts_setup">Parts Name Setup</option>
            <option value="customer_setup">Customer Setup</option>
            <option value="monthly_cost_setup">Monthly Cost Setup</option>
          </select>
        </div>

        <div id="invoiceDiv" class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label id="invoiceLabel" class="form-label">ID / Invoice :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="InvoiceID" placeholder=" " maxlength="40">
        </div>

      
        <div id="NameBox" class="mb-3 mx-auto col-lg-4 col-md-4 col-sm-12">
          <label  class="form-label font-color1">Parts Name :</label>
          <select class="form-select" id="selectName">
            <option value="">Select</option>
            <?php
              $query="SELECT `parts_name` FROM `parts_setup` GROUP BY `parts_name`";
              $q=mysqli_query($con, $query);
              if(mysqli_num_rows($q)>0){
                while($row=mysqli_fetch_assoc($q)){
             ?>
              <option value="<?php echo $row["parts_name"]; ?>"><?php echo $row["parts_name"]; ?></option>
            <?php
               }
              }
              
             ?>
          </select>
        </div>

        <div id="CatagoryBox" class="mb-3 mx-auto col-lg-4 col-md-4 col-sm-12">
          <label  class="form-label font-color1">Parts Catagory :</label>
          <select class="form-select" id="selectCatagory">
            <option value="">Select</option>
            <?php
              $query="SELECT `parts_catagory` FROM `parts_setup` GROUP BY `parts_catagory`";
              $q=mysqli_query($con, $query);
              if(mysqli_num_rows($q)>0){
                while($row=mysqli_fetch_assoc($q)){
             ?>
              <option value="<?php echo $row["parts_catagory"]; ?>"><?php echo $row["parts_catagory"]; ?></option>
            <?php
               }
              }
              
             ?>
          </select>
        </div>

        <div id="SizeBox" class="mb-3 mx-auto col-lg-4 col-md-4 col-sm-12">
          <label  class="form-label font-color1">Parts Size :</label>
          <select class="form-select" id="selectSize">
            <option value="">Select</option>
            <?php
              $query="SELECT `parts_size` FROM `parts_setup` GROUP BY `parts_size`";
              $q=mysqli_query($con, $query);
              if(mysqli_num_rows($q)>0){
                while($row=mysqli_fetch_assoc($q)){
             ?>
              <option value="<?php echo $row["parts_size"]; ?>"><?php echo $row["parts_size"]; ?></option>
            <?php
               }
              }
              
             ?>
          </select>
        </div>

        <div id="CostNameBox" class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Cost Name :</label>
          <select class="form-select" id="selectCostName">
            <option value="">Select</option>
            <?php
              $query="SELECT `cost_name` FROM `monthly_cost_setup` GROUP BY `cost_name`";
              $q=mysqli_query($con, $query);
              if(mysqli_num_rows($q)>0){
                while($row=mysqli_fetch_assoc($q)){
             ?>
              <option value="<?php echo $row["cost_name"]; ?>"><?php echo $row["cost_name"]; ?></option>
            <?php
               }
              }
              
             ?>
          </select>
        </div>

        <div id="noteBox" class="mb-3 mx-auto col-lg-12 col-md-12 col-sm-12">
          <label class="form-label font-color1">Please Change Select box data for update !!</label>
        </div>



        <div class="mb-3" id="searchDiv">
          <button class="btn btn-success" id="searchBtn" type="button">Search</button>
        </div>

        </div>
      </div>
    </div>

    <!-- Supplier Setup Form -->

    <div id="supSetup" class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd;">
      <label class="text-center fs-2 mb-3 headline">Supplier Setup</label>
      <div class="row col col-lg-10 mx-auto text-center mb-3">
        
         <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="supID" value="" placeholder=" " maxlength="20">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Supplier Name</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="supName" placeholder=" " maxlength="40">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Mobile No</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="mobileNumber" placeholder=" " maxlength="20" 
          oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Company Name</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="companyName" placeholder=" " maxlength="40">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Company Address</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="companyAddress" placeholder=" " maxlength="50">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label">Old Amount</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="supOldAmount" placeholder=" " maxlength="20" 
          oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>
        <div class="mb-3">
          <button class="btn btn-primary" id="supUpdateBtn" type="button">Update</button>
        </div>
      </div>
    </div>

    <!-- End -->


    <!-- Parts Setup Form -->


    <div id="partsSetup" class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd; ">
      <label class="text-center fs-2 mb-3 headline">Parts Name Setup</label>
      <div class="col-lg-4 col-md-6 col-sm-10 text-center mx-auto">
      <div class=" mx-auto text-center mb-3">
        

        <div id="pNameDiv" class="mb-3 col-lg-12 col-md-12 col-sm-12">
          <label class="form-label">Parts Name</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="partsName" placeholder=" " maxlength="40">
        </div>
        <div id="pCatDiv" class="mb-3 col-lg-12 col-md-12 col-sm-12">
          <label class="form-label">Parts Catagory</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="partsCatagory" placeholder=" " maxlength="40" >
        </div>
        <div id="pSizeDiv" class="mb-3 col-lg-12 col-md-12 col-sm-12">
          <label class="form-label">Parts Size</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="partsSize" placeholder=" " maxlength="40">
        </div>
        <div class="mb-3">
          <button class="btn btn-primary" id="partsUpdateBtn" type="button">Update</button>
        </div>
      </div>
      </div>
    </div>

    <!-- End -->

    <!-- Customer Setup Form -->

    <div id="cusSetup" class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd; ">
      <label class="text-center fs-2 mb-3 headline">Customer Setup</label>
      <div class="row mx-auto text-center mb-3">

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="cusID" value="" placeholder=" " maxlength="20">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Customer Name</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="cusName" placeholder=" " maxlength="40">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Customer Mobile</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="cusMobile" placeholder=" " maxlength="20"
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Customer Address</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="cusAddress" placeholder=" " maxlength="40">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label">Old Amount</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="cusOldAmount" placeholder=" " maxlength="20" 
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>

        <div class="mb-3">
          <button class="btn btn-primary" id="cusUpdateBtn" type="button">Update</button>
        </div>
      </div>
    </div>

    <!-- End -->

    <!-- Monthly Cost Setup Form -->

    <div id="mcsSetup" class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd; ">
      <label class="text-center fs-2 mb-3 headline">Monthly Cost Setup</label>
      <div class="row mx-auto text-center mb-3">

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12 text-center mx-auto">
          <label class="form-label">Cost Name :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="costName" placeholder=" " maxlength="40">
        </div>

        <div class="mb-3">
          <button class="btn btn-primary" id="mcsUpdateBtn" type="button">Update</button>
        </div>

      </div>
    </div>

    <!-- End -->

  </section>

  
  <script src="../../script.js"></script>

  <script>

    $(document).ready(function(){
      $('#supSetup').hide();
      $('#partsSetup').hide();
      $('#cusSetup').hide();
      $('#mcsSetup').hide();
      $('#NameBox').hide();
      $('#CatagoryBox').hide();
      $('#SizeBox').hide();
      $('#CostNameBox').hide();
      $('#invoiceDiv').hide();
      $('#searchDiv').hide();
      $('#noteBox').hide();

      
    })

    /**************** Change form Action *******************/

    $('#formSelect').change(function(){
      
      $('#supSetup').hide();
      $('#partsSetup').hide();
      $('#cusSetup').hide();
      $('#mcsSetup').hide();
      let currentSetup = this.value;
      if(currentSetup == 'parts_setup'){
        $('#NameBox').show();
        $('#CatagoryBox').show();
        $('#SizeBox').show();
        $('#invoiceDiv').show();
        $('#InvoiceID').hide();
        $('#invoiceLabel').hide();
        $('#CostNameBox').hide();
        $('#searchDiv').hide();
        $('#noteBox').show();
      }else if(currentSetup == 'monthly_cost_setup'){
        $('#supSetup').hide();
        $('#partsSetup').hide();
        $('#cusSetup').hide();
        $('#CostNameBox').show();
        $('#invoiceDiv').hide();
        $('#searchDiv').hide();
        $('#noteBox').show();
      }else{
        $('#NameBox').hide();
        $('#CatagoryBox').hide();
        $('#SizeBox').hide();
        $('#CostNameBox').hide();
        $('#invoiceDiv').show();
        $('#InvoiceID').show();
        $('#invoiceLabel').show();
        $('#searchDiv').show();
        $('#noteBox').hide();
      }
       
    }) 


    function ShowParts(){
      var formName = $('#formSelect').val();
         if(formName == 'parts_setup'){
          $('#partsSetup').show();
          $('#supSetup').hide();
          $('#cusSetup').hide();
          $('#mcsSetup').hide();
          var partsName = $('#selectName').val();
          var partsCatagory = $('#selectCatagory').val();
          var partsSize = $('#selectSize').val();

          if(partsName != ""){
            $('#pNameDiv').show();
            $('#pCatDiv').hide();
            $('#pSizeDiv').hide();
          }else if(partsCatagory != ""){
            $('#pNameDiv').hide();
            $('#pCatDiv').show();
            $('#pSizeDiv').hide();
          }else if(partsSize != ""){
            $('#pNameDiv').hide();
            $('#pCatDiv').hide();
            $('#pSizeDiv').show();
          }else if(partsName == "" && partsCatagory == "" && partsSize == ""){
            /*$('#pNameDiv').hide();
            $('#pCatDiv').hide();
            $('#pSizeDiv').hide();*/
            $('#partsSetup').hide();
          }

         }

    }


    /**************** On change Parts Name *******************/

    $('#selectName').change(function(){

      $('#partsName').val("");
      $('#partsCatagory').val("");
      $('#partsSize').val("");
      if(this.value != ""){
        $('#selectCatagory').prop('disabled', true);
        $('#selectSize').prop('disabled', true);
        }else{
          $('#selectCatagory').prop('disabled', false);
          $('#selectSize').prop('disabled', false);
        }
        ShowParts();

            })

    /**************** On change Parts Catagory *******************/

    $('#selectCatagory').change(function(){
      $('#partsName').val("");
      $('#partsCatagory').val("");
      $('#partsSize').val("");
      if(this.value != ""){
        $('#selectName').prop('disabled', true);
        $('#selectSize').prop('disabled', true);
        }else{
          $('#selectName').prop('disabled', false);
          $('#selectSize').prop('disabled', false);
        }
        ShowParts();
    })

    /**************** On change Parts Size *******************/

    $('#selectSize').change(function(){
      $('#partsName').val("");
      $('#partsCatagory').val("");
      $('#partsSize').val("");
      if(this.value != ""){
        $('#selectCatagory').prop('disabled', true);
        $('#selectName').prop('disabled', true);
        }else{
          $('#selectCatagory').prop('disabled', false);
          $('#selectName').prop('disabled', false);
        }
        ShowParts();
    })

    /**************** On change Cost Name *******************/

    $('#selectCostName').change(function(){

      if(this.value != ""){
        $('#mcsSetup').show();
      }else{
        $('#mcsSetup').hide();
      }
    })

    /*************** Clear funtions ***************/

    function clearSupSetup(){
      $('#supID').val("");
      $('#supName').val("");
      $('#mobileNumber').val("");
      $('#companyName').val("");
      $('#companyAddress').val("");
      $('#supOldAmount').val("");
    }

    function clearPartsSetup(){
      $('#partsID').val("");
      $('#partsName').val("");
      $('#partsCatagory').val("");
      $('#partsSize').val("");
    }

    function clearCusSetup(){
      $('#cusID').val("");
      $('#cusName').val("");
      $('#cusMobile').val("");
      $('#cusAddress').val("");
      $('#cusOldAmount').val("");
    }

    function clearMcsSetup(){
      $('#mcsID').val("");
      $('#costName').val("");
    }


      
      /******************* On Search Action ***************/

      $('#searchBtn').click(function () {  
         var formName = $('#formSelect').val();
         var InvoiceID = $('#InvoiceID').val();

      if(formName != ""){

         if(formName == 'supplier_setup' && InvoiceID != ""){
          
          $('#partsSetup').hide();
          $('#cusSetup').hide();
          $('#mcsSetup').hide(); 

          $.ajax({
          url: 'formAjax.php',
          type: "GET",
          data:{
            formName : formName,
            InvoiceID : InvoiceID
          },
          success:function(response){
          let vv = JSON.parse(response)
          if(vv != ""){
            $('#supSetup').show();
          $.each(vv , function(index, value){
            $('#supID').val(value.id);
            $('#supName').val(value.sup_name);
            $('#mobileNumber').val(value.mobile_no);
            $('#companyName').val(value.company_name);
            $('#companyAddress').val(value.company_address);
            $('#supOldAmount').val(value.old_amount);

            });
              clearPartsSetup();
              clearCusSetup();
              clearMcsSetup();
            }else{
              swal("Please enter valid ID");
              clearSupSetup();
            }
            }
          });

         }else if(formName == 'customer_setup' && InvoiceID != ""){
          $('#supSetup').hide();
          $('#partsSetup').hide();
          $('#mcsSetup').hide();

          $.ajax({
          url: 'formAjax.php',
          type: "GET",
          data:{
            formName : formName,
            InvoiceID : InvoiceID
          },
          success:function(response){
          let nn = JSON.parse(response)
          if(nn != ""){
            $('#cusSetup').show();
          $.each(nn , function(index, value){
            $('#cusID').val(value.id);
            $('#cusName').val(value.customer_name);
            $('#cusMobile').val(value.customer_mobile);
            $('#cusAddress').val(value.customer_address);
            $('#cusOldAmount').val(value.old_amount);

            });
              clearSupSetup();
              clearPartsSetup();
              clearMcsSetup();
            }else{
              swal("Please enter valid ID");
              clearCusSetup();
            }
            
            }
          });

         }else if(formName == 'monthly_cost_setup'){
          $('#supSetup').hide();
          $('#partsSetup').hide();
          $('#cusSetup').hide();

          $.ajax({
          url: 'formAjax.php',
          type: "GET",
          data:{
            formName : formName,
            InvoiceID : InvoiceID
          },
          success:function(response){
          let pp = JSON.parse(response)
          if(pp != ""){
            $('#mcsSetup').show();
          $.each(pp , function(index, value){
            $('#mcsID').val(value.id);
            $('#costName').val(value.cost_name);
            });
              clearSupSetup();
              clearPartsSetup();
              clearCusSetup();
            }else{
              swal("Please enter valid ID");
              clearMcsSetup();

            }
            
            }
          });

         }
         else{
          $('#supSetup').hide();
          $('#cusSetup').hide();
          $('#mcsSetup').hide();
         }

        }else{
          swal("Please fill the form");
        }
       })


        /******** Supplier update function **************/

        $('#supUpdateBtn').click(function(){
          $('#supUpdateBtn').attr("disabled", "disabled");
          $('#supUpdateBtn').text("Please Wait !!!");

         var supID = $('#supID').val();
         var supName = $('#supName').val();
         var mobileNumber = $('#mobileNumber').val();
         var companyName = $('#companyName').val();
         var companyAddress = $('#companyAddress').val();
         var supOldAmount = $('#supOldAmount').val();

         if(supID != "" && supName != "" && mobileNumber != "" && companyAddress != "" && companyName != "" && supOldAmount != "")
         {


          swal({
          title: "Are you sure?",
          text: "Make sure your data is valid!!!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Message!',
                  text: 'Data Updated successfull',
                  icon: 'success'
                }).then(function() {
                  $.ajax({
                    url: 'supplier_update.php',
                    type: "POST",
                    data: {
                      supID:supID,
                      supName:supName,
                      mobileNumber:mobileNumber,
                      companyName:companyName,
                      companyAddress:companyAddress,
                      supOldAmount:supOldAmount
                    },
                    success:function(response){
                      window.location="data_setup.php";
                    }
                  })
                });
              } else {
                swal("Cancelled", "Please check data :)", "error");
              }
            });

         }
         else
         {
          swal("Data is not valid!!!")
         }
        })


        /******** Parts name update function **************/

        $('#partsUpdateBtn').click(function(){
          $('#partsUpdateBtn').attr("disabled", "disabled");
          $('#partsUpdateBtn').text("Please Wait !!!");

           var partsName = $('#partsName').val();
           var partsCatagory = $('#partsCatagory').val();
           var partsSize = $('#partsSize').val();

           var selectName = $('#selectName').val();
           var selectCatagory = $('#selectCatagory').val();
           var selectSize = $('#selectSize').val();

         if(partsName != "" && partsCatagory == "" && partsSize == "")
         {


          swal({
          title: "Are you sure?",
          text: "Make sure your data is valid!!!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Message!',
                  text: 'Parts Name Updated successfull',
                  icon: 'success'
                }).then(function() {
                  $.ajax({
                    url: 'pNameUpdate.php',
                    type: "POST",
                    data: {
                      partsName:partsName,
                      selectName:selectName

                    },
                    success:function(response){
                      window.location="data_setup.php";
                                            
                    }
                  })
                });
              } else {
                swal("Cancelled", "Please check data :)", "error");
              }
            });

         }else if(partsName == "" && partsCatagory != "" && partsSize == "")
         {


          swal({
          title: "Are you sure?",
          text: "Make sure your data is valid!!!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Message!',
                  text: 'Parts Name Updated successfull',
                  icon: 'success'
                }).then(function() {
                  $.ajax({
                    url: 'pCatagoryUpdate.php',
                    type: "POST",
                    data: {
                      partsCatagory:partsCatagory,
                      selectCatagory:selectCatagory
                    },
                    success:function(response){
                      window.location="data_setup.php";

                    }
                  })
                });
              } else {
                swal("Cancelled", "Please check data :)", "error");
              }
            });

         }else if(partsName == "" && partsCatagory == "" && partsSize != "")
         {


          swal({
          title: "Are you sure?",
          text: "Make sure your data is valid!!!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Message!',
                  text: 'Parts Name Updated successfull',
                  icon: 'success'
                }).then(function() {
                  $.ajax({
                    url: 'pSizeUpdate.php',
                    type: "POST",
                    data: {
                      partsSize:partsSize,
                      selectSize:selectSize
                    },
                    success:function(response){
                      window.location="data_setup.php";
                      
                    }
                  })
                });
              } else {
                swal("Cancelled", "Please check data :)", "error");
              }
            });

         }
         else
         {
          swal("Data is not valid!!!")
         }
        })


         /******** Customer update function **************/

        $('#cusUpdateBtn').click(function(){
          $('#cusUpdateBtn').attr("disabled", "disabled");
          $('#cusUpdateBtn').text("Please Wait !!!");

           var cusID = $('#cusID').val();
           var cusName = $('#cusName').val();
           var cusMobile = $('#cusMobile').val();
           var cusAddress = $('#cusAddress').val();
           var cusOldAmount = $('#cusOldAmount').val();

         if(cusID != "" && cusName != "" && cusMobile != "" && cusAddress != "" && cusOldAmount != "")
         {

          swal({
          title: "Are you sure?",
          text: "Make sure your data is valid!!!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Message!',
                  text: 'Data Updated successfull',
                  icon: 'success'
                }).then(function() {
                  $.ajax({
                    url: 'customer_update.php',
                    type: "POST",
                    data: {
                      cusID:cusID,
                      cusName:cusName,
                      cusMobile:cusMobile,
                      cusAddress:cusAddress,
                      cusOldAmount:cusOldAmount
                    },
                    success:function(response){
                      window.location="data_setup.php";
                    }
                  })
                });
              } else {
                swal("Cancelled", "Please check data :)", "error");
              }
            });

         }
         else
         {
          swal("Data is not valid!!!")
         }
        })


        /******** Monthly cost setup update function **************/

        $('#mcsUpdateBtn').click(function(){
          $('#mcsUpdateBtn').attr("disabled", "disabled");
          $('#mcsUpdateBtn').text("Please Wait !!!");
          
           var selectCostName = $('#selectCostName').val();
           var costName = $('#costName').val();

         if(selectCostName != "" && costName != "")
         {

          swal({
          title: "Are you sure?",
          text: "Make sure your data is valid!!!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                swal({
                  title: 'Message!',
                  text: 'Data Updated successfull',
                  icon: 'success'
                }).then(function() {
                  $.ajax({
                    url: 'mcs_update.php',
                    type: "POST",
                    data: {
                      selectCostName:selectCostName,
                      costName:costName
                    },
                    success:function(response){
                      window.location="data_setup.php";
                    }
                  })
                });
              } else {
                swal("Cancelled", "Please check data :)", "error");
              }
            });

         }
         else
         {
          swal("Data is not valid!!!")
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
