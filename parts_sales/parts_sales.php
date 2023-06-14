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
    <title>Parts Sales</title>
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
<body style="background: #32aba9;">
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
          <li><a href="../parts_import/parts_import.php">1. Parts Import</a></li>
          <li><a href="#">2. Parts Sale</a></li>
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
      </li>

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
      <label class="text-center fs-2 mb-3 headline" >Parts Sales</label>
      </div>

      <!-- Get Invoice -->

      <?php
        $query ="SELECT MAX(`invoice_no`+1) FROM `parts_sales`";
          $q=mysqli_query($con, $query);
          if($q){
            $data=mysqli_fetch_assoc($q);
            if($data['MAX(`invoice_no`+1)']==0){
              $invoice=5000;
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
            $query="SELECT MAX(`id`) FROM `parts_sales_temp`";
            $q=mysqli_query($con, $query);
              if($q){
                $row=mysqli_fetch_assoc($q);
                $FID=$row['MAX(`id`)'];
                $FID=$FID+1;
              }
           ?>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="fID" value="<?php echo $FID; ?>" placeholder=" " maxlength="20">
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Purchase By :</label>
          <select class="form-select" id="purchaseBy">
            <option value="" selected>Select</option>
            <option value="Cash">Cash Supplier</option>
            <option value="Due">Due Supplier</option>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Supplier Address :</label>
          <select class="form-select" id="supAddress">
            <option value="" selected>Select</option>

          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" >
          <label  class="form-label font-color1">Supplier Name :</label>
          <select class="form-select" id="supName">
            <option selected>Select</option>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Parts Name :</label>
          <select class="form-select" id="partsName">
            <option selected>Select</option>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Parts Catagory :</label>
          <select class="form-select" id="partsCatagory">
            <option selected>Select</option>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Parts Size :</label><br>
          <select class="form-select" id="partsSize">
            <option selected>Select</option>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" id="divImportInvoice">
          <label  class="form-label font-color1">Invoice No :</label><br>
          <select class="form-select" id="ImportInvoice">
            <option selected>Select</option>
          </select>
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12 rounded-3" id="stockBox" style="display: none;background: #fff;" >
          
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Quantity :</label><br>
          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtQnt" maxlength="20" 
                  onkeypress="return onlyNumberKey(event)" placeholder=" ">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Amount(OMR) :</label><br>
          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtAmount" placeholder=" " maxlength="20" 
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Profit(OMR) :</label><br>
          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtProfit" placeholder=" " maxlength="20" 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>
        <div class="mb-3 text-center">
          <button class="btn btn-success" type="button" id="psaleCart">Save</button>
        </div>
        <hr style="background: #fff; border: 3px solid #fff;">
        
        <div class="mb-3 col-lg-12 col-md-12 col-sm-12" id="salesByDiv">
          <div class=" col-lg-4 col-md-4 col-sm-4 text-center mx-auto">
            <label  class="form-label font-color1">Sales By :</label>
            <select class="form-select" id="salesBy">
              <option value="" selected>select</option>
              <option value="Cash" >Cash</option>
              <option value="Due" >Due</option>
            </select>
          </div>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" id="slCusAddress">
          <label  class="form-label font-color1">Customer Address :</label>
          <select class="form-select" id="cusAddress">
            <option selected>select</option>
            <?php
              $query ="SELECT `customer_address` FROM `customer_setup` GROUP BY `customer_address`";
                $q=mysqli_query($con, $query);
                  while($row=mysqli_fetch_assoc($q)){
              ?>
              <option value="<?php echo $row["customer_address"]; ?>"><?php echo $row["customer_address"]; ?></option>
            
            <?php  }  ?>
          </select>
        </div>

                  <!-- Text Customer Address -->

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" id="divCusAddress">
          <label  class="form-label font-color1">Customer Address :</label><br>
          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtCusAddress" placeholder=" " >
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" id="slCusName">
          <label  class="form-label font-color1">Customer Name :</label>
          <select class="form-select" id="cusName">
            <option selected>select</option>
          </select>
        </div>

                    <!-- Text Customer Name -->

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" id="divCusName">
          <label  class="form-label font-color1">Customer Name :</label><br>
          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtCusName" placeholder=" " >
        </div>

        <div class="mb-3 text-center" id="salesBtnDiv">
          <button class="btn btn-danger" type="button" id="finalSales">Sales Now</button>
        </div>

      </div>
      </div>
    </div>

    <div class="container col-lg-10 rounded-3 text-center" style="background: white;">
      <label class="text-center fs-2 mb-3 headline2">Add Cart</label>
      <div class="row overflow-scroll">
        <table id="table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>SL</th>
            <th>Supplier Address</th>
            <th>Supplier Name</th>
            <th>Parts Name</th>
            <th>Catagory</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Amount(OMR)</th>
            <th>Profit(OMR)</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $sel="SELECT `id`,`invoice_no`,`supplier_address`,`supplier_name`,`parts_name`,`catagory`,`size`,TRUNCATE(`amount`,3) as amount,`quantity`,TRUNCATE(`profit`,3) AS profit,`date`,`import_invoice` FROM `parts_sales_temp`";
                $q=mysqli_query($con, $sel);
                $count=1;
                $totalAmount=0;
                $totalQnt=0;
                $totalProfit=0;
                  while($row=mysqli_fetch_assoc($q))
                  {
                    $a=$row['id'];
                    $b=$row['invoice_no'];
                    $d=$row['supplier_address'];
                    $e=$row['supplier_name'];
                    $f=$row['parts_name'];
                    $g=$row['catagory'];
                    $h=$row['size'];
                    $i=$row['amount'];
                    $j=$row['quantity'];
                    $k=$row['profit'];
                    $l=$row['import_invoice'];

                    $totalAmount += $i;
                    $totalQnt += $j;
                    $totalProfit += $k;
              ?>
                    <tr id="<?php echo $a; ?>">
                      <td><?php echo $a; ?></td>
                      <td><?php echo $d; ?></td>
                      <td><?php echo $e; ?></td>
                      <td><?php echo $f; ?></td>
                      <td><?php echo $g; ?></td>
                      <td><?php echo $h; ?></td>
                      <td><?php echo $j; ?></td>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $k; ?></td>
                      <td hidden><?php echo $l; ?></td>
                      <td>
                        <button class="delete btn-danger" data-id="<?php echo $a; ?>" >Delete</button>
                      </td>
                    </tr>
                    <?php
                    $count++;
                      }
               ?>
                    <tr>
                      <td colspan="6" style="font-weight:bold;color: red;font-size: 1.2rem;">Total :</td>
                      <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo $totalQnt; ?></td>
                      <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo number_format($totalAmount,3); ?></td>
                      <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo number_format($totalProfit,3); ?></td>
                      <td></td>
                    </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  
  <script src="../script.js"></script>

  <script>

     // Redirect to login page

    $('#adminRef').click(function(){
      window.open("../Account/admin.php");
    })
   
   $(document).ready(function(){
      $('#divImportInvoice').hide();
      $('#divCusAddress').hide();
      $('#divCusName').hide();
   })


    /************* Get Date by Moment js ************/

    const today = moment();
    var dt=(moment(new Date()).format("YYYY-MM-DD"));

    /************** Only Number Input function ****************/

      function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
      }


    /******** Sales by option change **********/

    $('#salesBy').change(function(){

      if($('#salesBy').val() === 'Cash'){

        $("#divCusAddress").show();
        $("#divCusName").show();

        $("#slCusAddress").hide();
        $("#slCusName").hide();

      }
      else if($('#salesBy').val() === 'Due'){

        $("#slCusAddress").show();
        $("#slCusName").show();

        $("#divCusAddress").hide();
        $("#divCusName").hide();


      }
      
    });


      $('#salesBy').change(function(){

      $("#cusAddress").val('');
      $("#cusName").val('');
      $("#txtCusAddress").val('');
      $("#txtCusName").val('');
      
    });
    

    /*********** get supplier Address ajax *********/

    $('#purchaseBy').change(function(){
        $('#supAddress').empty();
        $("#supAddress").append("<option value=''>Select</option>");
        $('#supName').empty();
        $("#supName").append("<option value=''>Select</option>");
        $('#partsName').empty();
        $("#partsName").append("<option value=''>Select</option>");
        $('#partsCatagory').empty();
        $("#partsCatagory").append("<option value=''>Select</option>");
        $('#partsSize').empty();
        $("#partsSize").append("<option value=''>Select</option>");

        SizeClear2();
        StockHidden();
      
      let ab=this.value;
      $.ajax({
          url : "selectSupAddress.php",
          type : "GET",
          data: { 'purchaseBy' : ab},
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
               $("#supAddress").append("<option value=\""+value.supplier_address+"\">"+value.supplier_address+"</option>");

            });
            
          }
        });
      });



    /*********** get supplier name ajax *********/

    $('#supAddress').change(function(){
        $('#supName').empty();
        $("#supName").append("<option value=''>Select</option>");
        $('#partsName').empty();
        $("#partsName").append("<option value=''>Select</option>");
        $('#partsCatagory').empty();
        $("#partsCatagory").append("<option value=''>Select</option>");
        $('#partsSize').empty();
        $("#partsSize").append("<option value=''>Select</option>");

        SizeClear2();
        StockHidden();

      var purchaseBy=$('#purchaseBy').val();
      let ab=this.value;
      $.ajax({
          url : "selectSupName.php",
          type : "GET",
          data: { 
                'address' : ab,
                purchaseBy:purchaseBy
                },
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
               $("#supName").append("<option value=\""+value.supplier_name+"\">"+value.supplier_name+"</option>");

            });
            
          }
        });
      });


    /*********** get parts name ajax *********/

    $('#supName').change(function(){
        $('#partsName').empty();
        $("#partsName").append("<option value=''>Select</option>");
        $('#partsCatagory').empty();
        $("#partsCatagory").append("<option value=''>Select</option>");
        $('#partsSize').empty();
        $("#partsSize").append("<option value=''>Select</option>");

        var purchaseBy=$('#purchaseBy').val();
        var supAddress=$('#supAddress').val();

        SizeClear2();
        StockHidden();
      
      let ab=this.value;
      $.ajax({
          url : "selectPartsName.php",
          type : "GET",
          data: {
             'name' : ab,
             'supAddress': supAddress,
             purchaseBy:purchaseBy
            },
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
               $("#partsName").append("<option value=\""+value.parts_name+"\">"+value.parts_name+"</option>");

            });
            
          }
        });
      });

    /*********** get parts catagory ajax *********/

    $('#partsName').change(function(){
        $('#partsCatagory').empty();
        $("#partsCatagory").append("<option value=''>Select</option>");
        $('#partsSize').empty();
        $("#partsSize").append("<option value=''>Select</option>");

        SizeClear2();
        StockHidden();

        var purchaseBy=$('#purchaseBy').val();
        var supAddress=$('#supAddress').val();
        var supName=$('#supName').val();
      
      let ab=this.value;
      $.ajax({
          url : "selectPartsCat.php",
          type : "GET",
          data: { 
              'name' : ab,
              'supAddress': supAddress,
              'supName': supName,
              purchaseBy:purchaseBy
            },
          success : function(data){

            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
               $("#partsCatagory").append("<option value=\""+value.catagory+"\">"+value.catagory+"</option>");

            });
            
          }
        });
      });


    /*********** get parts size ajax *********/

    $('#partsCatagory').change(function(){
        $('#partsSize').empty();
        $("#partsSize").append("<option value=''>Select</option>");
        SizeClear2();
        StockHidden();

        var purchaseBy=$('#purchaseBy').val();
        var supAddress=$('#supAddress').val();
        var supName=$('#supName').val();
        var partsName=$('#partsName').val();

      
      let ab=this.value;
      $.ajax({
          url : "selectPartsSize.php",
          type : "GET",
          data: {
           'catagory' : ab,
           'supAddress': supAddress,
           'supName': supName,
           'partsName': partsName,
           purchaseBy:purchaseBy
          },
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
               $("#partsSize").append("<option value=\""+value.size+"\">"+value.size+"</option>");

            });
            
          }
        });
      });


    /*********** get invoice from purchased product ajax *********/

    $('#partsSize').change(function(){
        $('#ImportInvoice').empty();
        $("#ImportInvoice").append("<option value=''>Select</option>");

        var purchaseBy=$('#purchaseBy').val();
        var supAddress=$('#supAddress').val();
        var supName=$('#supName').val();
        var pcat=$('#partsCatagory').val();
        var pname=$('#partsName').val();
        
        SizeClear();
        StockHidden();
      
        let psize=this.value;
        $.ajax({
          url : "selectInvoice.php",
          type : "GET",
          data: {
            'supAddress':supAddress,
            'supName':supName,
            'pname' : pname,
            'pcat' : pcat,
            'psize' : psize,
            purchaseBy:purchaseBy
            },
          success : function(data){

            let dd=JSON.parse(data);

             $.each(dd, function(index, value) {
               $("#ImportInvoice").append("<option value=\""+value.invoice_no+"\">"+value.invoice_no+"</option>");

            });
            
            
          }
        });
      });

    /************ hide and show invoice select box when form change ********/

    function SizeClear(){
      if($('#partsSize').val() == ""){
        $('#ImportInvoice').empty();
        $("#ImportInvoice").append("<option value=''>Select</option>");
        $('#divImportInvoice').hide();
      }else{
        $('#divImportInvoice').show();
      }
    }
    function SizeClear2(){
      if($('#partsSize').val() == ""){
        $('#ImportInvoice').empty();
        $("#ImportInvoice").append("<option value=''>Select</option>");
        $('#divImportInvoice').hide();
      }
    }


    /*********** get Stock box from purchased product ajax *********/

    $('#ImportInvoice').change(function(){
        $('#txtQnt').val("");

        var purchaseBy=$('#purchaseBy').val();
        var supAddress=$('#supAddress').val();
        var supName=$('#supName').val();
        var pname=$('#partsName').val();
        var pcat=$('#partsCatagory').val();
        var psize=$('#partsSize').val();
      
      let invo=this.value;
      $.ajax({
          url : "selectStock.php",
          type : "GET",
          data: {
            'invo' : invo,
            'supAddress' : supAddress,
            'supName' : supName,
            'pname' : pname,
            'pcat' : pcat,
            'psize' : psize,
            purchaseBy:purchaseBy
            },
          success : function(data){
            $('#stockBox').html(data);
            $('#stockBox').css('display','block');


          }
        });
      });


    /********** hide and show stock box when invoice is hidden *******/


    function StockHidden(){
        if ($('#divImportInvoice').css("visibility") === "visible"){
        $('#stockBox').css('display','none');;
      }else{
        $('#stockBox').css('display','block');
      }
    }



    /*********** get customer name ajax *********/

    $('#cusAddress').change(function(){
        $('#cusName').empty();
        $("#cusName").append("<option value=''>Select</option>");
      
      let ab=this.value;
      $.ajax({
          url : "selectCusName.php",
          type : "GET",
          data: { 'address' : ab},
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
      $("#cusName").append("<option value=\""+value.customer_name+"\">"+value.customer_name+" "+ value.customer_mobile +"</option>");

            });
            
          }
        });
      });



    /********** Insert Data with Ajax ************/

      $('#psaleCart').click(function(){
          var fID = $("#fID").val();
          var txtInvoice = $("#txtInvoice").val()
          var purchaseBy = $("#purchaseBy").val();
          var supAddress = $("#supAddress").val();
          var supName = $("#supName").val();
          var partsName = $("#partsName").val();
          var partsCatagory = $("#partsCatagory").val();
          var partsSize = $("#partsSize").val();
          var ImportInvoice = $("#ImportInvoice").val()
          var txtQnt = $("#txtQnt").val();
          var txtAmount = $("#txtAmount").val();
          var txtProfit = $("#txtProfit").val();

          let numQnt = parseInt(txtQnt);
          let numAmount = parseFloat(txtAmount);
          let numProfit = parseFloat(txtProfit);

            if(purchaseBy != '' && fID != '' && txtInvoice != '' && supName != '' && supAddress != '' && partsName != ''
              && partsSize != '' && txtQnt != '' && txtAmount != '' && txtProfit != ''){

              if(numQnt <= 0){
                swal("Please enter a valid Quantity");
                $('#txtQnt').val("");
              }else if(numAmount <= 0){
                swal("Please enter a valid Amount");
                $('#txtAmount').val("");
              }else  if(numProfit <= 0){
                swal("Please enter a valid Profit");
                  $('#txtProfit').val("");
              }else{

                $('#psaleCart').attr("disabled", "disabled");
                $('#psaleCart').text("Please Wait !!!");

                $.ajax({
                  url : 'saleInsert.php',
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
                      ImportInvoice : ImportInvoice,
                      txtQnt : txtQnt,
                      txtAmount : txtAmount,
                      txtProfit : txtProfit,
                      "dt":dt
                  },
                  success: function(data){
                    swal({
                        title: "Message",
                        text: "Data Added",
                        type: "success"
                      }).then(function(){
                        window.location ="parts_sales.php";

                      });
                  }
                });

              }
        }else{
          swal("please fill the form")
        }
      
      });



      /************** Delete data with Ajax ***************/

      $(document).on('click','.delete',function(){
        var id=$(this).data('id');
        var currentRow=$(this).closest("tr");
        var saddr=currentRow.find("td:eq(1)").text();
        var sname=currentRow.find("td:eq(2)").text();
        var pname=currentRow.find("td:eq(3)").text();
        var pcat=currentRow.find("td:eq(4)").text();
        var psize=currentRow.find("td:eq(5)").text();
        var qnt=currentRow.find("td:eq(6)").text();
        var invo=currentRow.find("td:eq(9)").text();


        $.ajax({
          url : 'deletePartsSales.php',
          type : "POST",
          data :{
              "id":id,
              "qnt":qnt,
              "saddr":saddr,
              "sname":sname,
              "pname":pname,
              "pcat":pcat,
              "psize":psize,
              "invo":invo
            },
          success:function(response){
              /*swal({
                title: "Message",
                text: "Data Deleted",
                type: "success"
              }).then(function(){
                window.location ="parts_sales.php";
              });*/
            alert(response)
          }
        });
      });


      /*********** key up check valid quantity ************/


      $('#txtQnt').keyup(function(){
        var invo = $("#ImportInvoice").val()
              var supAddress = $("#supAddress").val();
              var supName = $("#supName").val();
              var pname = $("#partsName").val();
              var pcat = $("#partsCatagory").val();
              var psize = $("#partsSize").val();
              var txtQnt = $('#txtQnt').val();
              var QTY=parseInt(txtQnt);
              

              $.ajax({
                url : "selectBalance.php",
                type : "GET",
                data: {
                  'invo' : invo,
                  'supAddress' : supAddress,
                  'supName' : supName,
                  'pname' : pname,
                  'pcat' : pcat,
                  'psize' : psize
                  },
                 success : function(data){
            
                  var balance=parseInt(data);
                  if (QTY > balance) {
                    swal("Insufficient balance !!!");
                    $('#txtQnt').val("");
                  }else if(QTY < 1 ){
                    swal("Invalid Quantity !!!");
                    $('#txtQnt').val("");
                  }

                }

              });

        
      });


      /******** Final button Data insert ***********/

      $('#finalSales').on('click',function(){
        var rowCount = $('#table tr').length;
          if(rowCount > 2){
          var left = (screen.width - 1200) / 2;
          var top = (screen.height - 700) / 4;

          var invo = $('#txtInvoice').val();
          var salesBy = $('#salesBy').val();
          var cusAddress="";
          var cusName="";
            if($('#txtCusAddress').val() == ""){
               cusAddress = $("#cusAddress").val();
               cusName = $("#cusName").val();
             }else{
               cusName = $("#txtCusName").val();
               cusAddress = $("#txtCusAddress").val();
             }

            if(invo != "" && salesBy != "" && cusName != "" && cusAddress != ""){

              $('#finalSales').attr("disabled", "disabled");
              $('#finalSales').text("Please Wait !!!");

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
                        text: 'Data Sale successfull',
                        icon: 'success'
                      }).then(function() {
                        
                        $.ajax({
                          url: 'finalSaleInsert.php',
                          type: "POST",
                          data: {
                            "invo":invo,
                            "salesBy":salesBy,
                            "cusAddress":cusAddress,
                            "cusName":cusName
                          },
                          success:function(data){
                          window.location="parts_sales.php";
                          }
                        });
                         var myWindow = window.open('salesMemo.php?invoiceID='+ invo, 'Import Memo',
                          'resizable=yes, width=' + '1200' + ', height=' + '700' + ', top='
                          + top + ', left=' + left);
                        
                      });
                    } else {
                      swal("Cancelled", "Please check data :)", "error");
                      $('#finalSales').removeAttr('disabled');
                      $('#finalSales').text("Sales Now");
                    }
                  });

            }else{
                swal("Please Entry customer first !!!");
            }
          }else{
            swal("Add Product First !!!")
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


