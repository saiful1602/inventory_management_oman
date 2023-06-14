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
    <title>Supplier Payment</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
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
          <li><a href="../parts_sales/parts_sales.php">2. Parts Sale</a></li>
          <li><a href="../customer_collection/customer_collection.php">3. Customer Collection</a></li>
          <li><a href="#">4. Supplier Payment</a></li>
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
  <section class="home-section" style="background: #32aba9;">
    <div class="home-content ">
      <i class='bx bx-menu' ></i>
    </div>
    <div class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd; ">
      <div class=" col-lg-8 text-center mx-auto">
      <label class="text-center fs-2 mb-3 headline">Supplier Payment</label>
      <div class="row mx-auto text-center mb-3">
        
        <!-- Php code of get ID -->

          <?php
            $query="SELECT MAX(`id`) AS ID FROM `supplier_payment`";
            $q=mysqli_query($con, $query);
            if($q){
              $row=mysqli_fetch_assoc($q);
              $FID=$row['ID'];
              $FID=$FID+1;
            }
           ?>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="fID" value="<?php echo $FID; ?>" placeholder=" " maxlength="20">
        </div>

        <?php
          $date = date("Y-m-d");
          $query ="SELECT MAX(`invoice_no`+1) AS invoice FROM `supplier_payment`";
            $q=mysqli_query($con, $query);
            if($q){
              $data=mysqli_fetch_assoc($q);
              if($data['invoice'] == ""){
                $invoice=300;
              }else{
                $invoice=$data['invoice'];
              }
            }

          ?>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">Invoice</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="txtInvoice" value="<?php echo $invoice; ?>" placeholder=" " maxlength="20">
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Supplier Address :</label>
          <select class="form-select" id="supAddress">
            <option selected>Select</option>
            <?php
              $query ="SELECT `company_address` FROM `supplier_setup` GROUP BY `company_address`";
              $q=mysqli_query($con, $query);
                  while($row=mysqli_fetch_assoc($q)){
              ?>
              <option value="<?php echo $row["company_address"]; ?>"><?php echo $row["company_address"]; ?></option>
            
            <?php  }  ?>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Supplier Name :</label>
          <select class="form-select" id="supName">
            <option selected>Select</option>
          </select>
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label">Reason :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="txtReason" placeholder=" " maxlength="50" >
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Amount(OMR) :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control " id="txtAmnt" placeholder=" " maxlength="20"
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Payment By :</label>
          <select class="form-select" id="paymentBy">
            <option value="" selected>Select</option>
            <option value="my_cash">My Cash</option>
            <option value="saqar_cash">Saqar Cash</option>
          </select>
        </div>
        

        <div class="mb-3" id="insertBtn">
          <button class="btn btn-success" id="AddSP" type="button">Save</button>
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
            <th>Invoice</th>
            <th>Payment By</th>
            <th>Supplier Address</th>
            <th>Supplier Name</th>
            <th>Reason</th>
            <th>Amount(OMR)</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
           <?php
           $date = date("Y-m-d");
            $sel="SELECT `id`,`invoice_no`,`spName`,`spAddress`,TRUNCATE(`spAmount`,3) AS spAmount,`reason`,`payment_by`,`date`
                FROM`supplier_payment` WHERE `date`='$date'";
              $q=mysqli_query($con, $sel);
              $count=1;
              $totalAmount=0;
                while($row=mysqli_fetch_assoc($q))
                {
                  $a=$row['payment_by'];
                  $b=$row['invoice_no'];
                  $c=$row['spName'];
                  $d=$row['spAddress'];
                  $e=$row['spAmount'];
                  $f=$row['reason'];

                  $totalAmount += $e;
            ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $b; ?></td>
              <td><?php echo $a; ?></td>
              <td><?php echo $c; ?></td>
              <td><?php echo $d; ?></td>
              <td><?php echo $f; ?></td>
              <td><?php echo $e; ?></td>
              <td>
                <button class="delete btn-danger" data-id="<?php echo $b; ?>" >Delete</button>
              </td>
            </tr>
            <?php
              $count++;
            }

            ?>
               <tr>
                  <td colspan="4" style="font-weight:bold;color: red;font-size: 1.2rem;">Total :</td>
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

     // Redirect to login page

    $('#adminRef').click(function(){
      window.open("../Account/admin.php");
    })

    /************* Get Date by Moment js ************/

    const today = moment();
      var dt=(moment(new Date()).format("YYYY-MM-DD"));


    /************* Get supName in select box by address ************/

    $('#supAddress').change(function(){
      $('#supName').empty();
      $('#supName').append("<option value =''>Select</option>")

      let aa=this.value;
      $.ajax({
        url : "selectSupPayment.php",
        type : "GET",
        data : {'address' : aa},
        success : function(data){
          let vv = JSON.parse(data)
          $.each(vv , function(index, value){
            $('#supName').append("<option value=\""+value.sup_name+"\">"+value.sup_name+"</option>");
          });
        }
      });
    });


    /**************** Data Insert with Ajax ****************/

    $(document).on('click','#AddSP',function(){
      $('#AddSP').attr("disabled", "disabled");
      $('#AddSP').text("Please Wait !!!");
      
      var fID = $("#fID").val();
      var invo = $("#txtInvoice").val();
      var supName = $("#supName").val();
      var supAddress = $("#supAddress").val();
      var txtAmnt = $("#txtAmnt").val();
      var txtReason = $('#txtReason').val();
      var paymentBy = $('#paymentBy').val();

      let numAmnt = parseFloat(txtAmnt);

      if(fID !="" && invo !="" && supName !="" && supAddress !="" && txtAmnt !="" && txtReason !="" && paymentBy != ""){

        if(numAmnt > 0){

          $.ajax({
            url: 'supPaymentInsert.php',
            type: "POST",
            data:{
              fID : fID,
              invo : invo,
              supName : supName,
              supAddress : supAddress,
              txtAmnt : txtAmnt,
              txtReason : txtReason,
              paymentBy : paymentBy,
              "dt" : dt
            },
            success:function(response){
              swal({
                  title: "Message",
                  text: "Data Added",
                  type: "success"
                }).then(function(){
                  window.location ="supplier_payment.php";
                });         
            }
          });
        }else{
            swal("Enter valid Amount")
            $('#AddSP').removeAttr('disabled');
            $('#AddSP').text("Save");
          }
      }else{
        swal("Please fill the form")
        $('#AddSP').removeAttr('disabled');
        $('#AddSP').text("Save");
      }
    });


    /*************** Data delete with Ajax *****************/

    $(document).on('click','.delete',function(){
      var id=$(this).data('id');

      $.ajax({
        url: 'deleteSupPay.php',
        type: "POST",
        data: {"id" : id},
        success:function(response){
          swal({
              title: "Message",
              text: "Data Deleted",
              type: "success"
            }).then(function(){
                window.location ="supplier_payment.php";
            });
        }
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
