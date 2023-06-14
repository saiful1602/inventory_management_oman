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
	<title>Parts Import</title>
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

    $query="SELECT * FROM `purchased_product` WHERE `invoice_no`='$invoice'";
    $q=mysqli_query($con, $query);
    if(mysqli_num_rows($q) > 0){


	 ?>


	<div class="container col-lg-10 rounded-3 text-center" style="background: white;">
      <label class="text-center fs-2 mb-3 headline2">Parts Import Update</label>

      <div class="row overflow-scroll">
      	<label style="font-weight:bold;" class="text-center fs-5 mb-3 ">Invoice : <?php echo $invoice; ?></label>
        <table id="table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>ID</th>
            <th>Imp Date</th>
            <th>Purchase by</th>
            <th>Sup Address</th>
            <th>Sup Name</th>
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
              $sel="SELECT `sl`,`date`,`invoice_no`,`purchase_by`,`supplier_address`,`supplier_name`,`parts_name`,`catagory`,`size`,`quantity`,
              TRUNCATE(`amount`,3) AS amount,TRUNCATE(`omr_pp`,3) AS omr_pp,`date` FROM `purchased_product` WHERE `invoice_no`='$invoice'";
                $q=mysqli_query($con, $sel);
                $count=1;
                $totalAmount=0;
                $totalQnt=0;
                  while($row=mysqli_fetch_assoc($q))
                  {
                    $a=$row['sl'];
                    $date=$row['date'];
                    $newDate = date("d-m-Y", strtotime($date));
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
                      <td align="center"><?php echo $newDate; ?></td>
                      <td align="center" hidden><?php echo $b; ?></td>
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
                        <button class="edit btn-primary" data-id="<?php echo $a; ?>" >Edit</button>
                      </td>
                    </tr>

                    <?php
                    $count++;
                      }
               ?>
          </tbody>
        </table>
      </div>
    </div>


    <div id="updateForm" class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd;padding-top: 30px; ">
    	<label id="editID" class="form-label font-color1 fs-4">Edit ID NO :</label>
      <div class=" col-lg-8 text-center mx-auto">



      <div id="invDiv" class="mb-3 col-lg-12 col-md-12 col-sm-12 text-center">
          <label  class="form-label font-color1">Invoice :</label><br>
          <input type="text" class="col-lg-4 col-md-4 col-sm-4 text-center" id="txtInvoice" value="" readonly>
        </div>
      <div class="row mx-auto  mb-3">


        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="fID" value="" placeholder=" " maxlength="20">
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
            <option value="" selected>Select</option>
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
                 onkeypress="return onlyNumberKey(event)" placeholder=" ">
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

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12 text-center">
          <label class="form-label font-color1">Import Date :</label><br>
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
    	$(document).ready(function(){
    		$('#updateForm').hide();
    		$('#invDiv').hide();
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

      /************** Only Number Input function ****************/

      function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
      }

    	$(function(){
	    $( "#datepicker" ).datepicker({
	      dateFormat: "yy-mm-dd",
	      changeMonth: true,
	      changeYear: true,
        maxDate: new Date
	    	});
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

    /************** Clear Form **************/

    function clearData(){    

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

    }

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

    /**************** On Change Supplier Address ***********************/

    $('#supAddress').change(function(){

      $('#supName').empty();
      $("#supName").append("<option selected value=''>Select</option>");
      var supAddress=$('#supAddress').val();
            $.ajax({
                url : "getSupName.php",
                type : "GET",
                data: { Address : supAddress},
                success : function(data){
                  let dd=JSON.parse(data)
                   $.each(dd, function(index, value) {
            $("#supName").append("<option value=\""+value.sup_name+"\">"+value.sup_name+" "+value.mobile_no+"</option>");
                  });
                  
                }
              });

    })

    	/*************** Get data into Form ******************/

		$("table").on('click','.edit',function(){
			$('#updateForm').show();

			var id=$(this).data('id');
			var currentRow=$(this).closest("tr"); 

			$('#editID').text("Edit ID NO : "+id);

			var fID=currentRow.find("td:eq(0)").text(); // get current row 1st TD 
         	var date=currentRow.find("td:eq(1)").text(); 
         	var Invoice=currentRow.find("td:eq(2)").text(); 
         	var purchaseBy=currentRow.find("td:eq(3)").text(); 
         	var supAddress=currentRow.find("td:eq(4)").text(); 
         	var supName=currentRow.find("td:eq(5)").text(); 
         	var partsName=currentRow.find("td:eq(6)").text(); 
         	var partsCatagory=currentRow.find("td:eq(7)").text(); 
         	var partsSize=currentRow.find("td:eq(8)").text(); 
         	var txtQnt=currentRow.find("td:eq(9)").text(); 
         	var txtAmount=currentRow.find("td:eq(10)").text();
         	var txtOMR=currentRow.find("td:eq(11)").text();  



         	
         	clearData(); // to clear the form

         	if(purchaseBy == 'Due'){
         		$("#txtSupAddress").hide();
		        $("#txtSupName").hide();
		        $("#slSupAddress").show();
		        $("#slSupName").show();

		        $('#supAddress option[value="'+supAddress+'"]').attr('selected',true);

		        /********** Get Supllier Name ************/

		        $('#supName').empty();
		        $("#supName").append("<option selected value=''>Select</option>");
		      
			      var supAddress=$('#supAddress').val();

            $('#supName').append("<option value='"+supName+"'>"+supName+"</option>");
			      $('#supName option[value="'+supName+'"]').attr('selected',true);


         	}else if(purchaseBy == 'Cash'){
         		$("#txtSupAddress").show();
		        $("#txtSupName").show();
		        $("#slSupAddress").hide();
		        $("#slSupName").hide();
            $('#supAdIn').val(supAddress);
            $('#supNm').val(supName);
         	}else{
         		$("#txtSupAddress").hide();
		        $("#txtSupName").hide();
		        $("#slSupAddress").hide();
		        $("#slSupName").hide();
         	}

          var oldDate = new Date(date);
          var mm = String(oldDate. getDate()). padStart(2, 0);
          var dd = String(oldDate. getMonth() + 1). padStart(2, 0); //January is 0!
          var yyyy = oldDate. getFullYear();

          oldDate = yyyy + '-' + mm + '-' + dd;

          
         	$('#fID').val(fID);
          $('#txtInvoice').val(Invoice);
    			$('#datepicker').val(oldDate);
    			$('#txtQnt').val(txtQnt);
    			$('#txtAmount').val(txtAmount);
    			$('#txtOMR').val(txtOMR);

		      $('#purchaseBy option[value="'+purchaseBy+'"]').attr('selected',true);
          $('#partsName option[value="'+partsName+'"]').attr('selected',true);

          $('#partsCatagory option[value="'+partsCatagory+'"]').attr('selected',true);


          $('#partsSize option[value="'+partsSize+'"]').attr('selected',true);

		});

    /***************** Update On click function **********************/

		$('#updateBtn').click(function(){
			var fID = $("#fID").val();
      var txtInvoice = $("#txtInvoice").val();
      var purchaseBy = $("#purchaseBy").val();
            var supAddress;
            var supName;
            if($('#supAddress').val()!=""){
               supAddress = $("#supAddress").val();
               supName = $("#supName").val();
            }else{
               supAddress = $("#supAdIn").val();
               supName = $("#supNm").val();
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
            var datepicker = $("#datepicker").val();


            if(fID != '' && txtInvoice != '' && purchaseBy != '' && supName != '' && supAddress != '' && partsName != ''
    && partsSize != '' && txtQnt != '' && txtAmount != '' && txtOMR != '' && datepicker != ""){

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
			          url : 'partsEntryUpdate.php',
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
			              datepicker:datepicker
			          },
			          success: function(data){
			          	window.location="partsImportAdmin.php?invoice=" + txtInvoice;
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