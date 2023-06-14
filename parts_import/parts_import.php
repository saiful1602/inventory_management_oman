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
    <title>Parts Import</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.js"></script>

    <style type="text/css">
      .font-color1{
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
<body>
  <div class="sidebar close">
    
    <div style="padding: 0 2rem 0 2rem;height: 30px;" class="logo-details">
      <span style="font-size: 1rem;" class="logo_name">ؤسسة علي بن محمد بخيت بيت مبارك للتجارة</span>
    </div>
    <div style="padding-left: 2rem;" class="logo-details">
      <span class="logo_name">Ali Bin Mohammed (SAYED)</span>
    </div>
    <div style="padding: 2rem;" class="logo-details">
      <span class="logo_name">: : Manager Panel : :</span>
    </div>

    <ul class="nav-links">
      <li>
        <a href="../index.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-wrench' ></i>
            <span class="link_name">Setup</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Setup</a></li>
          <li><a href="../sup_setup/sup_setup.php">Supplier Setup</a></li>
          <li><a href="../parts_name_setup/product_setup.php">Product Setup</a></li>
          <li><a href="../customer_setup/customer_setup.php">Customer Setup</a></li>
          <li><a href="../monthly_cost_setup/monthly_cost_set.php">Monthly Cost Setup</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Data Entry</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Data Entry</a></li>
          <li><a href="#">1. Parts Import</a></li>
          <li><a href="../parts_sales/parts_sales.php">2. Parts Sale</a></li>
          <li><a href="../customer_collection/customer_collection.php">3. Customer Collection</a></li>
          <li><a href="../supplier_payment/supplier_payment.php">4. Supplier Payment</a></li>
          <li><a href="../daily_other_cost/daily_other_cost.php">5. Daily Others Cost</a></li>
          <li><a href="../monthly_profit_cost/monthly_profit_cost.php">6. Monthly Profit Cost</a></li>
          <li><a href="../saqar_payment/saqar_payment.php">7. Saqar Payment</a></li>
          <li><a href="../saqar_cost_entry/saqar_cost_entry.php">8. Saqar Cost Entry</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-calendar' ></i>
            <span class="link_name">Report</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Report</a></li>
          <li><a href="../cash_report/cash_report.php">1. Cash Report</a></li>
          <li><a href="../parts_import_report/parts_import_report.php">2. Parts Import Report</a></li>
          <li><a href="../parts_sales_report/parts_sales_report.php">3. Parts Sales Report</a></li>
          <li><a href="../customer_ledger/customer_ledger.php">4. Customer Ledger</a></li>
          <li><a href="../supplier_ledger/supplier_ledger.php">5. Supplier Ledger</a></li>
          <li><a href="../profit_cost_report/profit_cost_report.php">6. Profit Cost Report</a></li>
          <li><a href="../monthly_profit_report/monthly_profit_report.php">7. Monthly Profit Report</a></li>
          <li><a href="../saqar_cash_report/saqar_cash_report.php">8. Saqar Cash Report</a></li>
          <li><a href="../stock_report/stock_report.php">9. Stock Report</a></li>
          <li><a href="../customer_short_report/customer_short_report.php">10. Customer Short Report</a></li>
          <li><a href="../supplier_short_report/supplier_short_report.php">11. Supplier Short Report</a></li>

      </ul>

      <li style="margin-top: 2rem;">
        <a>
          <i class="bx bx-user"></i>
          <span class="link_name">Logger : <?php echo $username; ?></span>
        </a>

      </li>

      <li style="margin-top: 2rem;">
        <a href="#">
          <i></i>
          <span class="link_name text-center">
            <button id="adminRef" style="margin-left:2rem;" class="btn btn-primary">Admin</button>
          </span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Admin</a></li>
        </ul>
      </li>

      <li>
    <div class="profile-details">
      <div class="profile-content">
       <a href="../logout.php"><i class='bx bx-log-out' ></i></a>
      </div>
      <div class="name-job">
        <div align="center" class="profile_name">
          <a href="../logout.php"><button class="logout btn btn-danger">Logout</button></a>
      </div>
      </div>
      <i ></i>
    </div>
  </li>

</ul>
  </div>
  <section class="home-section" style="background: #32aba9;height: 220vh;">
    <div class="home-content ">
      <i class='bx bx-menu' ></i>
    </div>
    <div class="container col-lg-10 rounded-3 " style="background: #4a91bd; ">
      <div class=" col-lg-8 text-center mx-auto">
        <div class="mb-3 text-center">
          <label class="text-center fs-2 mb-3 headline" >Parts Import</label>
        </div>

      <!-- Get Invoice -->

      <?php
        $query ="SELECT MAX(`invoice_no`+1) FROM `purchased_product`";
          $q=mysqli_query($con, $query);
          if($q){
            $data=mysqli_fetch_assoc($q);
            if($data['MAX(`invoice_no`+1)']==0){
              $invoice=1000;
            }else{
              $invoice=$data['MAX(`invoice_no`+1)'];
            }
          }

        ?>
      <div class="mb-3 col-lg-4 col-md-4 col-sm-4 mx-auto text-center">
          <label  class="form-label font-color1">Invoice :</label><br>
          <input type="text" class="col-lg-4 col-md-4 col-sm-4 text-center form-control" id="txtInvoice" value="<?php echo $invoice; ?>" readonly>
        </div>
      <div class="row mx-auto  mb-3">
        
         <!-- Php code of get ID -->

          <?php
            $query="SELECT MAX(`sl`) FROM `purchase_import`";
            $q=mysqli_query($con, $query);
              if($q){
                $row=mysqli_fetch_assoc($q);
                $FID=$row['MAX(`sl`)'];
                $FID=$FID+1;
              }
           ?>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="fID" value="<?php echo $FID; ?>" placeholder=" " maxlength="20">
        </div>
        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Purchase By :</label>
          <select class="form-select" id="purchaseBy" aria-label="Default select example">
            <option value="" selected>select</option>
            <option value="Cash" >Cash</option>
            <option value="Due" >Due</option>
          </select>
        </div>
        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" id="slSupAddress">
          <label  class="form-label font-color1">Supplier Address :</label>
          <select class="form-select" id="supAddress">
            <option value="" selected>select</option>

            <?php
              $query ="SELECT `company_address` FROM `supplier_setup` GROUP BY `company_address`";
              $q=mysqli_query($con, $query);
              $query2= "SELECT `supplier_address` FROM `purchase_import`";
              $q2=mysqli_query($con, $query2);
              $COUNT=mysqli_num_rows($q2);
                if($COUNT > 0){
                  $row="";
                }else{
                  while($row=mysqli_fetch_assoc($q)){
              ?>
              <option value="<?php echo $row["company_address"]; ?>"><?php echo $row["company_address"]; ?></option>

            <?php } } ?>

          </select>
        </div>
                    <!-- text input Address -->
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" id="txtSupAddress" >
          <label  class="form-label font-color1">Supplier Address :</label><br>
          <input type="text" class="col-lg-12 col-md-12 col-sm-12 form-control" id="supAdIn" placeholder=" ">
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" id="slSupName">
          <label  class="form-label font-color1">Supplier Name :</label>
          <select class="form-select" id="supName">
            <option selected>select</option>
          </select>
        </div>
                     <!-- text input Name -->
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" id="txtSupName" >
          <label  class="form-label font-color1">Supplier Name :</label><br>
          <input type="text" class="col-lg-12 col-md-12 col-sm-12 form-control" id="supNm" placeholder=" ">
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Parts Name :</label>
          <input class="form-check-input" type="checkbox" id="partsNameCheck" checked>
          <!-- Select Parts Name -->

          <select class="form-select" id="partsName">
            <option value="" selected>Select</option>
            <?php
              $query ="SELECT `parts_name` FROM `parts_setup` GROUP BY `parts_name`";
              $q=mysqli_query($con, $query);
                if($q){
                while($row=mysqli_fetch_assoc($q)){
             ?>
             <option value="<?php echo $row["parts_name"]; ?>"><?php echo $row["parts_name"]; ?></option>
            <?php } } ?>
          </select>
          <!-- Text Box Parts Name -->

          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtPartsName" maxlength="50">
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Parts Catagory :</label>
          <input class="form-check-input" type="checkbox" id="partsCatagoryCheck" checked>
          <!-- Select Box Catagory -->
          <select class="form-select" id="partsCatagory">
            <option value="" selected>Select</option>
             <?php
              $query ="SELECT `parts_catagory` FROM `parts_setup` GROUP BY `parts_catagory`";
              $q=mysqli_query($con, $query);
                if($q){
                while($row=mysqli_fetch_assoc($q)){
             ?>
             <option value="<?php echo $row["parts_catagory"]; ?>"><?php echo $row["parts_catagory"]; ?></option>
            <?php } } ?>
          </select>
          <!-- Text Box Parts Catagory -->

          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtPartsCatagory" maxlength="50">
        </div>
        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Parts Size :</label>
          <input class="form-check-input" type="checkbox" id="partsSizeCheck" checked>
          <!-- Select Box Size -->

          <select class="form-select" id="partsSize">
            <option value="" selected>Select</option>
            <?php
              $query ="SELECT `parts_size` FROM `parts_setup` GROUP BY `parts_size`";
              $q=mysqli_query($con, $query);
                if($q){
                while($row=mysqli_fetch_assoc($q)){
             ?>
             <option value="<?php echo $row["parts_size"]; ?>"><?php echo $row["parts_size"]; ?></option>
            <?php } } ?>
          </select>
          <!-- Text Box Parts Catagory -->

          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtPartsSize" maxlength="50">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Quantity :</label><br>
          <input type="email" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtQnt" maxlength="20" 
                onkeypress="return onlyNumberKey(event)"  placeholder=" ">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Amount(OMR) :</label><br>
          <input type="email" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtAmount" placeholder=" " maxlength="20" 
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">OMR (Per piece) :</label><br>
          <input type="email" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtOMR" placeholder=" " readonly>
        </div>
        <div class="mb-3 text-center">
          <button class="btn btn-success" type="button" id="cart-add-data">Save</button>
          <button class="btn btn-primary" type="button" id="AddFinal">Final</button>
        </div>
        <div>
          <h5 style="color: white;font-weight: bold;padding-bottom: 20px;">Note : All parts you must have to buy from same supplier only</h5>
        </div>
      </div>
      </div>
    </div>

    <div class="container col-lg-11 rounded-3 text-center" style="background: white;">
      <label class="text-center fs-2 mb-3 headline2">Add Cart</label>
      <div class="row overflow-scroll">
        <table id="table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>SL</th>
            <th>Purchase by</th>
            <th>Supplier Address</th>
            <th>Supplier Name</th>
            <th>Parts Name</th>
            <th>Catagory</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Amount(OMR)</th>
            <th>OMR(PP)</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $sel="SELECT `sl`,`invoice_no`,`purchase_by`,`supplier_address`,`supplier_name`,`parts_name`,`catagory`,`size`,`quantity`,
              TRUNCATE(`amount`,3) AS amount,TRUNCATE(`omr_pp`,3) AS omr_pp,`date` FROM `purchase_import`";
                $q=mysqli_query($con, $sel);
                $count=1;
                $totalAmount=0;
                $totalQnt=0;
                  while($row=mysqli_fetch_assoc($q))
                  {
                    $a=$row['sl'];
                    $b=$row['invoice_no'];
                    $c=$row['purchase_by'];
                    $d=$row['supplier_address'];
                    $e=$row['supplier_name'];
                    $f=$row['parts_name'];
                    $g=$row['catagory'];
                    $h=$row['size'];
                    $i=$row['quantity'];
                    $j=$row['amount'];
                    $k=$row['omr_pp'];

                    $totalAmount += $j;
                    $totalQnt += $i;
              ?>
                    <tr id="<?php echo $a; ?>">
                      <td align="center"><?php echo $a; ?></td>
                      <td align="center"><?php echo $c; ?></td>
                      <td align="center"><?php echo $d; ?></td>
                      <td align="center"><?php echo $e; ?></td>
                      <td align="center"><?php echo $f; ?></td>
                      <td align="center"><?php echo $g; ?></td>
                      <td align="center"><?php echo $h; ?></td>
                      <td align="center"><?php echo $i; ?></td>
                      <td align="center"><?php echo $j; ?></td>
                      <td align="center"><?php echo $k; ?></td>
                      <td align="center">
                        <button class="delete btn-danger" data-id="<?php echo $a; ?>" >Delete</button>
                      </td>
                    </tr>

                    <?php
                    $count++;
                      }
               ?>
               <tr>
                 <td colspan="7" style="font-weight:bold;color: red;font-size: 1.2rem;">Total :</td>
                 <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo $totalQnt; ?></td>
                 <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo number_format($totalAmount,3); ?></td>
                 <td colspan="2"></td>
               </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  
  <script src="../script.js"></script>
  <script>

     // Redirect 

    $('#adminRef').click(function(){
      window.open("../Account/admin.php");
    })

      /************* Get Date by Moment js ************/

      const today = moment();
      var dt=(moment(new Date()).format("YYYY-MM-DD"));


      /************* Get Time by moment js ***************/

      let current_time = moment().format("h:mm:ss a");

      /************** Only Number Input function ****************/

      function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
      }

      $(document).ready(function(){
        $('#txtSupAddress').hide();
        $('#txtSupName').hide();
        $('#txtPartsName').hide();
        $('#txtPartsCatagory').hide();
        $('#txtPartsSize').hide();
      })

      /***************** Parts Name Checked ******************/

      $('#partsNameCheck').click(function(){
        $('#partsName').val('');
        $('#txtPartsName').val('');
        if(this.checked){
          $('#txtPartsName').hide();
          $('#partsName').show();
        }else{
          $('#txtPartsName').show();
          $('#partsName').hide();
        }
      })

      /***************** Parts Catagory Checked ******************/

      $('#partsCatagoryCheck').click(function(){
        $('#txtPartsCatagory').val('');
        $('#partsCatagory').val('');
        if(this.checked){
          $('#txtPartsCatagory').hide();
          $('#partsCatagory').show();
        }else{
          $('#txtPartsCatagory').show();
          $('#partsCatagory').hide();
        }
      })

      /***************** Parts Size Checked ******************/

      $('#partsSizeCheck').click(function(){
        $('#txtPartsSize').val('');
        $('#partsSize').val('');
        if(this.checked){
          $('#txtPartsSize').hide();
          $('#partsSize').show();
        }else{
          $('#txtPartsSize').show();
          $('#partsSize').hide();
        }
      })

    // cash and due switch

    $('#purchaseBy').change(function(){

      if($('#purchaseBy').val() == 'Cash'){

        $("#txtSupAddress").show();

        $("#txtSupName").show();

        $("#slSupAddress").hide();

        $("#slSupName").hide();

      }
      else if($('#purchaseBy').val() == 'Due'){

        $("#txtSupAddress").hide();

        $("#txtSupName").hide();

        $("#slSupAddress").show();

        $("#slSupName").show();
      }

      $("#supName").val('');
      $("#supAddress").val('');
      $("#supAdIn").val('');
      $("#supNm").val('');
      
    });




    



    // To clear From Values

    function clearData(){
      $('#purchaseBy').val('');
      $('#supName').val('');

      $('#supAddress').val('');
      
      $('#partsName').val('');
      
      $('#partsCatagory').val('');
      
      $('#partsSize').val('');
      

      document.getElementById('supAdIn').value="";
      document.getElementById('supNm').value="";
      document.getElementById('txtQnt').value="";
      document.getElementById('txtAmount').value="";
      document.getElementById('txtOMR').value="";


      if($('#purchaseBy').val() === ''){

        $("#txtSupAddress").hide();

        $("#txtSupName").hide();

        $("#slSupAddress").show();

        $("#slSupName").show();
      }

    };




    // Get Supplier name From Database

    $(document).ready(function(){
      var rowCount = $('#table tr').length;
      if(rowCount < 3){

    $('#supAddress').change(function(){
        $('#supName').empty();
        $("#supName").append("<option selected value=''>Select</option>");
      
      let ab=this.value;
      $.ajax({
          url : "selectSupName.php",
          type : "GET",
          data: { 'address' : ab},
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
      $("#supName").append("<option value=\""+value.sup_name+"\">"+value.sup_name+" "+ value.mobile_no +"</option>");

            });
            
          }
        });
      });
     }else{

     }
    });  // end of ready function


    

    /********** Insert Data with Ajax ************/

      $('#cart-add-data').click(function(){
        var fID = $("#fID").val();
        var txtInvoice = $("#txtInvoice").val()
        var purchaseBy = $("#purchaseBy").val();
            var supAddress;
            var supName;
            if($('#supAddress').val()!=""){
               supAddress = $("#supAddress").val();
               supName = $("#supName").val();
            }else{
               supAddress = $("#supAdIn").val().trim();
               supName = $("#supNm").val().trim();
            }
            var partsName;

            if($('#partsName').val() != ""){
               partsName = $("#partsName").val().trim();
            }else{
               partsName = $("#txtPartsName").val().trim();
            }

            var partsCatagory;

            if($('#partsCatagory').val() != ""){
               partsCatagory = $("#partsCatagory").val().trim();
            }else{
               partsCatagory = $("#txtPartsCatagory").val().trim();
            }

            var partsSize;

            if($('#partsSize').val() != ""){
               partsSize = $("#partsSize").val().trim();
            }else{
               partsSize = $("#txtPartsSize").val().trim();
            }

            var txtQnt = $("#txtQnt").val();
            var txtAmount = $("#txtAmount").val();
            var txtOMR = $("#txtOMR").val();

            let numQnt = parseInt(txtQnt);
            let numAmount = parseFloat(txtAmount);

            if(fID != '' && txtInvoice != '' && purchaseBy != '' && supName != '' && supAddress != '' && partsName != ''
              && partsSize != '' && txtQnt != '' && txtAmount != '' && txtOMR != ''){

              if(txtQnt > 0 && numAmount > 0){
                $('#cart-add-data').attr("disabled", "disabled");
                $('#cart-add-data').text("Please Wait !!!");
                  $.ajax({
                    url : 'savePartsImport.php',
                    type : "POST",
                    data : {
                      fID : fID,
                      txtInvoice : txtInvoice,
                      purchaseBy : purchaseBy,
                      supAddress : supAddress,
                      supName : supName,
                      partsName : partsName,
                      partsCatagory : partsCatagory,
                      partsSize : partsSize,
                      txtQnt : txtQnt,
                      txtAmount : txtAmount,
                      txtOMR : txtOMR,
                      "dt":dt
                  },
                  success: function(response){
                    var data = $.parseJSON(response);
                    if(data.status ==  'success'){
                      swal({
                        title: "Message",
                        text: "Data Added",
                        type: "success"
                    }).then(function(){
                        window.location ="parts_import.php";
                      })
                    }else{
                      swal(data.message)
                      $('#cart-add-data').removeAttr('disabled');
                      $('#cart-add-data').text("Save");
                    }

                  }
              });
          }else{
            swal("Please Enter valid Amount/Qnt")
          }

        }else{
          alert("please fill the form")
        }
      });

      /************** Delete data with Ajax ***************/

      $(document).on('click','.delete',function(){
        var id=$(this).data('id');

        $.ajax({
          url : 'deletePartsImport.php',
          type : "POST",
          data :{"id":id},
          success:function(response){

              swal({
                title: "Message",
                text: "Data Deleted",
                type: "success"
              }).then(function(){
                window.location ="parts_import.php";
              });
          }
        });
      });

      /******** Final button Data insert ***********/

      $('#AddFinal').on('click',function(){
        var rowCount = $('#table tr').length;
        if(rowCount > 2){

        $('#AddFinal').attr("disabled", "disabled");
        $('#AddFinal').text("Please Wait !!!");
        
        var left = (screen.width - 1200) / 2;
        var top = (screen.height - 700) / 4;

        swal({
          title: "Are you sure?",
          text: "You will not be able to change again!",
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
              text: 'Data imported successfull',
              icon: 'success'
            }).then(function() {
              var invo = $('#txtInvoice').val();
              $.ajax({
                url: 'finalInsert.php',
                type: "POST",
                data: {"invo":invo},
                success:function(data){
                   window.location="parts_import.php";
                }
              });
              var myWindow = window.open('purchase_memo.php?invoiceID='+ invo, 'Import Memo',
                  'resizable=yes, width=' + '1200' + ', height=' + '700' + ', top='
                  + top + ', left=' + left);
                  });

          } else {
            swal("Cancelled", "Please check data :)", "error");
            $('#AddFinal').removeAttr('disabled');
            $('#AddFinal').text("Final");
          }

        });
      }else{
        swal("Add Product First !!!")
      }
      });


      /***** Get data from first table row and set to form ****/

      $(document).ready(function(){
        var rowCount = $('#table tr').length;
        if(rowCount>2){
          var purchaseBy=document.getElementById("table").rows[1].cells[1].innerHTML;
           var address=document.getElementById("table").rows[1].cells[2].innerHTML;
           var name=document.getElementById("table").rows[1].cells[3].innerHTML;


          $('#purchaseBy option[value="'+purchaseBy+'"]').attr('selected',true);
          $('#purchaseBy').prop('disabled', true);

          $('#supAddress').append("<option value='"+address+"'>"+address+"</option>");
          $('#supAddress option[value="'+address+'"]').attr('selected',true);
          $('#supAddress').prop('disabled', true);

          $('#supName').append("<option value='"+name+"'>"+name+"</option>");
          $('#supName option[value="'+name+'"]').attr('selected',true);
          $('#supName').prop('disabled', true);


        }else{}
      });


       // Division math of textfield

     $(function(){
            $('#txtQnt, #txtAmount').keyup(function(){

               var value1 = parseFloat($('#txtQnt').val()) || 0;
               var value2 = parseFloat($('#txtAmount').val()) || 0;
               var value3 = value2 / value1;
                  $('#txtOMR').val(value3.toFixed(3));
               
            });
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
