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
    <title>Parts Import Report</title>
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
      @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
    margin: 0;
    padding: 0;
    width: 1000px;
    height: 1500px;
  }
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
          <li><a href="..monthly_cost_setup/monthly_cost_set.php">Monthly Cost Setup</a></li>
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
          <li><a href="#">2. Parts Import Report</a></li>
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
      <label class="text-center fs-2 mb-3 headline">Parts Import Report</label>
      <div class="col-lg-8 text-center mx-auto">
      <div class="row mx-auto text-center mb-3">
        
      	 <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Supplier Address :</label>
          <select class="form-select" id="supAddress">
            <option value="">Select</option>
            <?php
              $query ="SELECT `supplier_address` FROM `purchased_product` GROUP BY `supplier_address`";
              $q=mysqli_query($con, $query);
                  while($row=mysqli_fetch_assoc($q)){
              ?>
              <option value="<?php echo $row["supplier_address"]; ?>"><?php echo $row["supplier_address"]; ?></option>
            
            <?php  }  ?>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Supplier Name :</label>
          <select class="form-select" id="supName">
            <option value="">Select</option>
          </select>
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Date From :</label><br>
          <input type="text" class="form-control" id="datepicker" placeholder="Select Date " maxlength="40" readonly>
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Date To :</label><br>
          <input type="text" class="form-control" id="datepicker2" placeholder="Select Date " maxlength="40" readonly>
        </div>
        <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
          <label class="form-label fs-5 headline">Note : For all import details please select date to date only</label><br>
        </div>

        <div class="mb-3" id="insertBtn">
          <button class="btn btn-success" id="searchBtn" type="button">Search</button>
        </div>
      </div>
      </div>
    </div>

    <div id="importReportDiv" class="container col-lg-10 rounded-3 text-center" style="background: white;">

      <div class="row overflow-scroll">
        <table id="table" class="table table-striped table-bordered">
        	<h3 style="color:#130091;" class="headline2">ALI BIN MOHAMMED BAKHAIT BAIT MOBARAK TRAD . EST</h3>
        	<h3 style="color:#130091;" class="headline2">Sahalnoot Saniya , Salalah, Sultanate of Oman</h3>
          <div class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h5 id="curDate" class="headline2 col-lg-4">Print Date :</h5>
            <h5 id="curTime" class="headline2 col-lg-4">Print time : </h5>
            <h5 class="headline2 col-lg-4">Operator : <?php echo $username; ?></h5>
          </div>
        	<h2 class="headline3">Parts Import Report</h2>
          <div class="d-flex col-lg-12 col-md-12 col-sm-12 text-center">
            <h5 id="printSupAddress" class="headline2 col-lg-6">Address :</h5>
            <h5 id="printSupName" class="headline2 col-lg-6">Name : </h5>
          </div>
          <thead>
	          <tr>
	            <th>Date</th>
	            <th>Invoice</th>
	            <th>Purchase By</th>
	            <th>Supplier address </th>
	            <th>Supplier name</th>
	            <th>Amount</th>
	            <th>action</th>
	          </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
        <div align="right" style="padding: 0 20px 40px 0;" class="col-lg-12 ShowDiv">
          <button type="button" id="printBtn" class="btn btn-danger">Print</button>
        </div>
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
      $('#importReportDiv').hide();
    });

    var d = new Date();
    var currentDate = d.getDate() + "-" + (d.getMonth()+1) + "-" + d.getFullYear();
    $('#curDate').text("Print Date : " + currentDate);

    var time = new Date();
    $('#curTime').text("Print Time : " + time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }));

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
        maxDate: new Date,
        onSelect: function() {
          if($("#datepicker").val() > $("#datepicker2").val()){
            swal("Wrong Selected Date");
            $("#datepicker2").val("");
          }
        }
	    	});
	 	 });

	  $('#searchBtn').on('click',function(){
	  	var date1 = $('#datepicker').val();
	  	var date2 = $('#datepicker2').val();
	  	var supAddress = $('#supAddress').val();
	  	var supName = $('#supName').val();
      var left = (screen.width - 1200) / 2;
      var top = (screen.height - 700) / 4;

	  	if(supAddress == "" && supName == "" && date1 != "" && date2 != ""){
        
	  		$.ajax({
					url : "pirSelect.php",
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
                var myWindow = window.open('purchase_memo.php?invoiceID='+ invo, 'Import Memo',
                    'resizable=yes, width=' + '1200' + ', height=' + '700' + ', top='
                    + top + ', left=' + left);
                
  						  });
					}
				});

        $('#importReportDiv').show();

        /********* Set Information ************/

        $('#printSupAddress').hide();
        $('#printSupName').hide();

			}else if(supAddress != "" && supName != "" && date1 != "" && date2 != ""){
        
				$.ajax({
					url : "pirSelect2.php",
					type : "GET",
					data: { 
						'date1' : date1,
						'date2' : date2,
						'supName' : supName,
						'supAddress' : supAddress
					},
					success : function(data){
						$('table').html(data);
						$('.showInvo').on('click',function(){
						  var invo=$(this).data('id');
							var currentRow=$(this).closest("tr");
							var myWindow = window.open('purchase_memo.php?invoiceID='+ invo, 'Import Memo',
                    'resizable=yes, width=' + '1200' + ', height=' + '700' + ', top='
                    + top + ', left=' + left);
						  });
					}
				});

        $('#importReportDiv').show();

        /********* Set Information ************/

        $('#printSupAddress').show();
        $('#printSupName').show();  

        $('#printSupAddress').text("Address : "+supAddress);
        $('#printSupName').text("Name : "+supName);

			}else{
        swal("Please select valid information")
      }
	  });

	  
 /***************** Get supplier name by ajax ************/

	  	$('#supAddress').change(function(){
				$('#supName').empty();
				$("#supName").append("<option value=''>Select</option>");
			
			let ab=this.value;
			$.ajax({
					url : "selectSupName.php",
					type : "GET",
					data: { 'address' : ab},
					success : function(data){
						let dd=JSON.parse(data)
						 $.each(dd, function(index, value) {
						 	 $("#supName").append("<option value=\""+value.supplier_name+"\">"+value.supplier_name+"</option>");

						});
						
					}
				});
			});

      /************* Print Function ****************/

      $('#printBtn').on('click',function(){
      var date1 = $('#datepicker').val();
      var date2 = $('#datepicker2').val();
      var supAddress = $('#supAddress').val();
      var supName = $('#supName').val();

      if(supAddress == "" && supName == "" && date1 != "" && date2 != ""){
        var left = (screen.width - 800) / 2;
        var top = (screen.height - 700) / 4;
         
        var myWindow = window.open('parts_print_report.php?date1='+ date1 +"&date2="+ date2, 'Parts Sales Report',
            'resizable=yes, width=' + '800'
            + ', height=' + '700' + ', top='
            + top + ', left=' + left);

      }else if(supAddress != "" && supName != "" && date1 != "" && date2 != ""){
        var left = (screen.width - 800) / 2;
        var top = (screen.height - 700) / 4;
         
        var myWindow = window.open('parts_print_report.php?date1='+ date1 +"&date2="+ date2 +"&supAddress="+ supAddress +"&supName="+ supName,
            'Parts Sales Report',
            'resizable=yes, width=' + '800'
            + ', height=' + '700' + ', top='
            + top + ', left=' + left);

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
