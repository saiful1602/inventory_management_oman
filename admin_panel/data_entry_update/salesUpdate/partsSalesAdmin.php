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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Parts Sales Update</title>
	<!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
</head>
<body>

	<?php
		$invoice=$_GET['invoice'];

    $query="SELECT * FROM `parts_sales` WHERE `invoice_no`='$invoice'";
    $q=mysqli_query($con, $query);
    if(mysqli_num_rows($q) > 0){


	 ?>


	<div class="container col-lg-10 rounded-3 text-center" style="background: white;">
      <label class="text-center fs-2 mb-3 headline2">Parts Sales Update</label>

      <div class="row overflow-scroll">
      	<label style="font-weight:bold;" class="text-center fs-5 mb-3 ">Invoice : <?php echo $invoice; ?></label>
        <table id="table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>ID</th>
            <th class="text-nowrap">Date</th>
            <th hidden>Purchase By</th>
            <th>Supplier Address</th>
            <th>Supplier Name</th>
            <th>Sales By</th>
            <th>Customer Address</th>
            <th>Customer Name</th>
            <th>Parts Name</th>
            <th>Catagory</th>
            <th>Size</th>
            <th>QTY</th>
            <th>Amount</th>
            <th>Profit</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $sel="SELECT `id`,`invoice_no`,`purchase_by`,`supplier_address`,`supplier_name`,`sales_by`,
              `customer_address`,`customer_name`,`parts_name`,`catagory`,`size`,`quantity`,
              `amount`,`profit`,`date`,`import_invoice` FROM `parts_sales` WHERE `invoice_no`='$invoice'";
			        $q=mysqli_query($con, $sel);

                $count=1;
                $totalAmount=0;
                $totalQnt=0;
                $totalProfit=0;

                  while($row=mysqli_fetch_assoc($q))
                  {
                    $a=$row['id'];
                    $date=$row['date'];
                    $newDate = date("d-m-Y", strtotime($date));
                    $b=$row['invoice_no'];
                    $c=$row['purchase_by'];
                    $d=$row['supplier_address'];
                    $e=$row['supplier_name'];
                    $f=$row['sales_by'];
                    $g=$row['customer_address'];
                    $h=$row['customer_name'];
                    $i=$row['parts_name'];
                    $j=$row['catagory'];
                    $k=$row['size'];
                    $l=$row['quantity'];
                    $m=$row['amount'];
                    $n=$row['profit'];
                    $o=$row['import_invoice'];

                    $totalAmount += $m;
                    $totalQnt += $l;
                    $totalProfit += $n;
              	?>
                    <tr id="<?php echo $a; ?>">
                      <td align="center"><?php echo $a; ?></td>
                      <td class="text-nowrap" align="center"><?php echo $newDate; ?></td>
                      <td hidden align="center"><?php echo $b; ?></td>
                      <td hidden align="center"><?php echo $c; ?></td>
                      <td align="center"><?php echo $d; ?></td>
                      <td align="center"><?php echo $e; ?></td>
                      <td align="center"><?php echo $f; ?></td>
                      <td align="center"><?php echo $g; ?></td>
                      <td align="center"><?php echo $h; ?></td>
                      <td align="center"><?php echo $i; ?></td>
                      <td align="center"><?php echo $j; ?></td>
                      <td align="center"><?php echo $k; ?></td>
                      <td align="center"><?php echo $l; ?></td>
                      <td align="center"><?php echo number_format($m,3); ?></td>
                      <td align="center"><?php echo number_format($n,3); ?></td>
                      <td hidden align="center"><?php echo $o; ?></td>
                      <td align="center">
                        <button class="edit btn-primary" data-id="<?php echo $a; ?>" >Edit</button>
                      </td>
                    </tr>

                    <?php
                    $count++;
                      }
               		?>
               		 <tr>
                      <td colspan="10" style="font-weight:bold;color: red;font-size: 1.2rem;">Total :</td>
                      <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo $totalQnt; ?></td>
                      <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo number_format($totalAmount,3); ?></td>
                      <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo number_format($totalProfit,3); ?></td>
                      <td></td>
                    </tr>
          </tbody>
        </table>
      </div>
    </div>


    <div id="updateForm" class="container col-lg-10 rounded-3 " style="background: #4a91bd; ">
      <div class=" col-lg-8 text-center mx-auto">
      <div class="mb-3 text-center">
      <label id="editID" class="form-label font-color1 fs-4">Edit ID NO :</label>
      </div>


      <div id="invDiv" class="mb-3 col-lg-12 col-md-12 col-sm-12 text-center" hidden>
          <label  class="form-label font-color1">Invoice</label><br>
          <input type="text" class="col-lg-4 col-md-4 col-sm-4 text-center" id="txtInvoice" value="" readonly>
        </div>
      <div class="row mx-auto  mb-3">


        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="fID" value="" placeholder=" " maxlength="20">
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
          <label  class="form-label font-color1">Import Invoice No :</label><br>
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
  
        <hr style="background: #fff; border: 3px solid #fff;">
        <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
          <div class=" col-lg-4 col-md-4 col-sm-4 text-center mx-auto">
            <label  class="form-label font-color1">Sales By</label>
            <select class="form-select" id="salesBy">
              <option value="" selected>select</option>
              <option value="Cash" >Cash</option>
              <option value="Due" >Due</option>
            </select>
          </div>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" id="slCusAddress">
          <label  class="form-label font-color1">Customer Address</label>
          <select class="form-select" id="cusAddress">
            <option selected>Select</option>
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
          <label  class="form-label font-color1">Customer Address</label><br>
          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtCusAddress" placeholder=" " >
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12" id="slCusName">
          <label  class="form-label font-color1">Customer Name</label>
          <select class="form-select" id="cusName">
            <option selected>select</option>
          </select>
        </div>

                    <!-- Text Customer Name -->

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" id="divCusName">
          <label  class="form-label font-color1">Customer Name</label><br>
          <input type="text" class="col-lg-8 col-md-8 col-sm-12 form-control" id="txtCusName" placeholder=" " >
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12 text-center">
          <label class="form-label font-color1">Sales Date :</label><br>
          <input type="text" class="form-control text-center" id="datepicker" placeholder="Select Date " maxlength="40" readonly>
        </div>

        <div class="mb-3 text-center">
          <button class="btn btn-danger" type="button" id="updateBtn">Update</button>
        </div>

      </div>
      </div>
    </div>

    <?php
    }else{
      ?>
      <script>
        swal("No Invoice Found !!!!!")
        .then((value) => {
          window.close();
        });
      </script>
      <?php
    }
   ?>

    <script>
    	let data; 
      allData=[]; // All select Data Array Initialize

    	$(document).ready(function(){
    		$('#updateForm').hide();
        $('#divImportInvoice').hide();
        $("#divCusAddress").hide();
        $("#divCusName").hide();
    	})

    	$(function(){
	    $( "#datepicker" ).datepicker({
	      dateFormat: "yy-mm-dd",
	      changeMonth: true,
	      changeYear: true,
        maxDate: new Date
	    	});
	 	 });

      function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
      }

	     function clearData(){    
        
        $('#purchaseBy').val('');
        $('#supAddress').val('');
        $('#supName').val('');
        $('#partsName').val('');
        $('#partsCatagory').val('');
        $('#partsSize').val('');
        

	      document.getElementById('txtCusAddress').value="";
	      document.getElementById('txtCusName').value="";
	      document.getElementById('txtQnt').value="";
	      document.getElementById('txtAmount').value="";
	      document.getElementById('txtProfit').value="";

	      if($('#salesBy').val() === ''){
	        $("#divCusName").hide();
	        $("#divCusName").hide();
          $("#slCusAddress").hide();
          $("#slCusName").hide();
	      }

	    }


	/***************** cash and due switch *****************/

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
      }else{
      	$("#txtSupAddress").hide();
        $("#txtSupName").hide();
        $("#slSupAddress").hide();
        $("#slSupName").hide();
      }

      $("#supName").val('');
      $("#supAddress").val('');
      $("#supAdIn").val('');
      $("#supNm").val('');
      
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

    /******************* On change Sales By *************************/

    $('#salesBy').change(function(){
      $('#cusAddress option[value=""]').attr('selected',true);
      $("#cusAddress").val('');
      $("#cusName").val('');

      $("#txtCusAddress").val('');
      $("#txtCusName").val('');

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

    /*********** get customer name ajax *********/

    $('#cusAddress').change(function(){
        $('#cusName').empty();
        $("#cusName").append("<option value=''>Select</option>");
      
      let cusAddress=this.value;
      $.ajax({
          url : "getCustomerName.php",
          type : "GET",
          data: { 'address' : cusAddress},
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
      $("#cusName").append("<option value=\""+value.customer_name+"\">"+value.customer_name+" "+ value.customer_mobile +"</option>");

            });
            
          }
        });
      });

      /******************** Global variable Old data  ******************/ 
      var oldImportID="";
      var oldpurchaseBy = "";
      var oldsupAddress = "";
      var oldsupName = "";
      var oldpartsName = "";
      var oldpartsCatagory = "";
      var oldpartsSize = "";
      var oldtxtQnt = "";
      var oldImportInvoice="";

       	/*************** Get data into Form ******************/
         var oldID="";

         function formClear(){
          $('#purchaseBy').val('');
          $('#supAddress').empty('');
          $('#supName').empty('');
          $('#partsName').empty('');
          $('#partsCatagory').empty('');
          $('#partsSize').empty('');
          $('#ImportInvoice').empty('');
          $('#CusName').empty('');
         }

      $("#table").on('click','.edit',function(){
      
        $('#updateForm').show();

        var id=$(this).data('id');
        var currentRow=$(this).closest("tr"); 
        
        $('#editID').text("Edit ID NO : "+id);

        if(id != oldID){
          oldID=id;
          formClear();
          var fID=currentRow.find("td:eq(0)").text(); // get current row 1st TD 
         	var date=currentRow.find("td:eq(1)").text(); 
         	var salesInvoice=currentRow.find("td:eq(2)").text(); 
         	var purchaseBy=currentRow.find("td:eq(3)").text(); 
         	var supAddress=currentRow.find("td:eq(4)").text(); 
         	var supName=currentRow.find("td:eq(5)").text();
          var salesBy=currentRow.find("td:eq(6)").text();
          var cusAddress=currentRow.find("td:eq(7)").text();
          var cusName=currentRow.find("td:eq(8)").text();
         	var partsName=currentRow.find("td:eq(9)").text(); 
         	var partsCatagory=currentRow.find("td:eq(10)").text(); 
         	var partsSize=currentRow.find("td:eq(11)").text(); 
         	var txtQnt=currentRow.find("td:eq(12)").text(); 
         	var txtAmount=currentRow.find("td:eq(13)").text();
         	var txtProfit=currentRow.find("td:eq(14)").text();
          var ImportInvoice=currentRow.find("td:eq(15)").text();
         	
         	clearData(); // to clear the form

          var oldDate = new Date(date);
          var mm = String(oldDate. getDate()). padStart(2, 0);
          var dd = String(oldDate. getMonth() + 1). padStart(2, 0); //January is 0!
          var yyyy = oldDate. getFullYear();

          oldDate = yyyy + '-' + mm + '-' + dd;

          
          if(purchaseBy == 'Due'){
            $('#purchaseBy option[value="Due"]').attr('selected',true);
          }else if(purchaseBy == 'Cash'){
            $('#purchaseBy option[value="Cash"]').attr('selected',true);
          }
          
          

          $('#supAddress').append("<option value='"+supAddress+"'>"+supAddress+"</option>");
          $('#supAddress option[value="'+supAddress+'"]').attr('selected',true);

          $('#supName').append("<option value='"+supName+"'>"+supName+"</option>");
          $('#supName option[value="'+supName+'"]').attr('selected',true);

          $('#partsName').append("<option value='"+partsName+"'>"+partsName+"</option>");
          $('#partsName option[value="'+partsName+'"]').attr('selected',true);

          $('#partsCatagory').append("<option value='"+partsCatagory+"'>"+partsCatagory+"</option>");
          $('#partsCatagory option[value="'+partsCatagory+'"]').attr('selected',true);

          $('#partsSize').append("<option value='"+partsSize+"'>"+partsSize+"</option>");
          $('#partsSize option[value="'+partsSize+'"]').attr('selected',true);
          
          $('#divImportInvoice').show();
          $('#ImportInvoice').append("<option value='"+ImportInvoice+"'>"+ImportInvoice+"</option>");
          $('#ImportInvoice option[value="'+ImportInvoice+'"]').attr('selected',true);
          
         	$('#fID').val(fID);
    			$('#datepicker').val(oldDate);
    			$('#txtQnt').val(txtQnt);
    			$('#txtAmount').val(txtAmount);
    			$('#txtProfit').val(txtProfit);
          $('#txtInvoice').val(salesInvoice);
          
          $('#salesBy option[value="'+salesBy+'"]').attr('selected',true);
          if($('#salesBy').val() == 'Due'){
            $('#cusAddress').val('');
            $('#cusName').val('');
            $('#cusAddress option[value="'+cusAddress+'"]').attr('selected',true);
            $('#cusName').append("<option value='"+cusName+"'>"+cusName+"</option>");
            $('#cusName option[value="'+cusName+'"]').attr('selected',true);

            $('#txtCusAddress').val('');
            $('#txtCusName').val('');

            $("#divCusAddress").hide();
            $("#divCusName").hide();
            $("#slCusAddress").show();
            $("#slCusName").show();

          }else if($('#salesBy').val() == 'Cash'){
            $('#cusAddress').val('');
            $('#cusName').val('');
            $('#txtCusAddress').val('');
            $('#txtCusName').val('');
            $('#txtCusAddress').val(cusAddress);
            $('#txtCusName').val(cusName);

            $("#divCusAddress").show();
            $("#divCusName").show();
            $("#slCusAddress").hide();
            $("#slCusName").hide();

          }

          $.ajax({
          url : "selectStock.php",
          type : "GET",
          data: {
            'invo' : ImportInvoice,
            'supAddress' : supAddress,
            'supName' : supName,
            'pname' : partsName,
            'pcat' : partsCatagory,
            'psize' : partsSize,
            purchaseBy:purchaseBy
            },
          success : function(data){
            $('#stockBox').html(data);
            $('#stockBox').css('display','block');
             oldImportID=$('.oldImportID').text();
             oldImportID=parseInt(oldImportID);
          }
        });

          /***************** Set old Data ******************/
          
           oldpurchaseBy = purchaseBy;
           oldsupAddress = supAddress;
           oldsupName = supName;
           oldpartsName = partsName;
           oldpartsCatagory = partsCatagory;
           oldpartsSize = partsSize;
           oldtxtQnt = txtQnt;
           oldImportInvoice = ImportInvoice;
           oldImportID=parseInt(oldImportID);
          
           

          /************ End Old Data ************/
      }
      

		});


      /*********** key up check valid quantity ************/


      $('#txtQnt').keyup(function(){
        var txtQnt = $('#txtQnt').val();
        var QTY=parseInt(txtQnt);
        var txtBalance = $('.txtBalance').text();
        var balance = txtBalance.replace('Balance Qty :','');
        var intBalance=parseInt(balance);
        
        if (QTY > intBalance) {
          swal("Insufficient balance qty !!!");
          $('#txtQnt').val("");
        }else if(QTY < 1 ){
          swal("Invalid Quantity !!!");
          $('#txtQnt').val("");
        }
      });


       /***************** Update On click function **********************/

		$('#updateBtn').click(function(){
      $('#updateBtn').attr("disabled", "disabled");
      $('#updateBtn').text("Please Wait !!!");
      
			var fID = $("#fID").val();
      var txtInvoice = $("#txtInvoice").val();
      var purchaseBy = $("#purchaseBy").val();
      var supAddress = $("#supAddress").val();
      var supName = $("#supName").val();
      var partsName = $("#partsName").val();
      var partsCatagory = $("#partsCatagory").val();
      var partsSize = $("#partsSize").val();
      var txtQnt = $("#txtQnt").val();
      var txtAmount = $("#txtAmount").val();
      var txtProfit = $("#txtProfit").val();
      var salesBy = $("#salesBy").val();
      var cusAddress="";
      var cusName="";
      if($('#txtCusAddress').val() == "" && $('#txtCusAddress').val() == ""){
        cusAddress = $("#cusAddress").val();
        cusName = $("#cusName").val();
      }else{
        cusAddress = $("#txtCusAddress").val();
        cusName = $("#txtCusName").val();
      }
      var datepicker = $("#datepicker").val();
      var ImportInvoice=$("#ImportInvoice").val();



      if(fID != '' && txtInvoice != '' && purchaseBy != '' && supName != '' && supAddress != '' 
      && partsName != '' && partsSize != '' && txtQnt != '' && txtAmount != '' && txtProfit != ''
      && salesBy != '' && cusAddress != '' && cusName != '' && ImportInvoice != '' && datepicker != ''){

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
			          url : 'partsSalesUpdate.php',
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
			              txtProfit : txtProfit,
                    salesBy : salesBy,
			              cusAddress : cusAddress,
			              cusName : cusName,
			              ImportInvoice : ImportInvoice,
			              datepicker:datepicker,
                    // old data after edit
                    oldImportID:oldImportID,
                    oldpurchaseBy:oldpurchaseBy,
                    oldsupAddress:oldsupAddress,
                    oldsupName:oldsupName,
                    oldpartsName:oldpartsName,
                    oldpartsCatagory:oldpartsCatagory,
                    oldpartsSize:oldpartsSize,
                    oldtxtQnt:oldtxtQnt,
                    oldImportInvoice:oldImportInvoice
                    
			          },
			          success: function(data){
			          	window.location="partsSalesAdmin.php?invoice=" + txtInvoice;
			          }

			        });
                });
              } else {
                swal("Cancelled", "Please check data :)", "error");
              }
            });

        }else{
          swal("please fill the form")
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