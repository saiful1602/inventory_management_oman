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
    <title>Customer Collection Update</title>
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
<body>
  
    <?php
        $invoice=$_GET['invoice'];
        $query="SELECT * FROM `customer_collection` WHERE `invoice_no`='$invoice'";
        $q=mysqli_query($con, $query);
        if(mysqli_num_rows($q) > 0){
	?>
     <div style="padding-top:1rem;" class="container col-lg-10 rounded-3 text-center" style="background: white;">
      <label class="text-center fs-2 mb-3 headline2">Customer Collection Update</label>
      <div class="row overflow-scroll">
        <table id="table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SL</th>
              <th>Invoice</th>
              <th>Customer Address</th>
              <th>Customer Name</th>
              <th>Reason</th>
              <th>Amount(OMR)</th>
              <th>Profit(OMR)</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

              $sel="SELECT `invoice_no`,`customer_address`,`customer_name`,TRUNCATE(`amount`,3) AS amount,`reason`,
                    TRUNCATE(`profit`,3) AS profit,`date`
                    FROM `customer_collection` WHERE `invoice_no`='$invoice'";
                $q=mysqli_query($con, $sel);
                $count=1;
                $totalAmount=0;
                $totalProfit=0;
                while($row=mysqli_fetch_assoc($q))
                  {
                  
                    $b=$row['invoice_no'];
                    $c=$row['customer_address'];
                    $d=$row['customer_name'];
                    $e=$row['reason'];
                    $f=$row['amount'];
                    $g=$row['profit'];
                    $h=$row['date'];
                    $newDate = date("d-m-Y", strtotime($h));

                    $totalProfit += $g;
                    $totalAmount += $f;
                    
              ?>
              <tr id="<?php echo $b; ?>">
                <td><?php echo $count; ?></td>
                <td><?php echo $b; ?></td>
                <td><?php echo $c; ?></td>
                <td><?php echo $d; ?></td>
                <td><?php echo $e; ?></td>
                <td><?php echo $f; ?></td>
                <td><?php echo $g; ?></td>
                <td hidden><?php echo $h; ?></td>
                <td><?php echo $newDate; ?></td>
                <td align="center">
                  <button class="edit btn-primary" data-id="<?php echo $b; ?>" >Edit</button>
                </td>
              </tr>
              <?php
              $count++;
                }
               ?>
               <tr>
                  <td colspan="5" style="font-weight:bold;color: red;font-size: 1.2rem;">Total :</td>
                  <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo number_format($totalAmount,3); ?></td>
                  <td style="font-weight:bold;color: red;font-size: 1.1rem;"><?php echo number_format($totalProfit,3); ?></td>
                  <td></td>
                </tr>
          </tbody>
        </table>
      </div>
    </div>



    <div  id="tableDiv" class="container col-lg-10 rounded-3 text-center" style="background: #4a91bd;padding-top:2rem; ">
      <div class=" col-lg-8 text-center mx-auto">
      
      <div class="row mx-auto text-center mb-3">

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="fID" value="" placeholder=" " maxlength="20">
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">Invoice</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12" id="txtInvoice" value="<?php echo $invoice; ?>" placeholder=" " maxlength="20">
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Customer Address</label>
          <select class="form-select" id="cusAddress">
            <option>Select</option>
            
            <?php
              
            $query="SELECT `customer_address` FROM `customer_setup` GROUP BY `customer_address`";
            $q=mysqli_query($con, $query);
            while($row=mysqli_fetch_assoc($q)){
            ?>
                <option value="<?php echo $row["customer_address"]; ?>"><?php echo $row["customer_address"]; ?></option>
            <?php
            }
            ?>
          </select>
        </div>

        <div class="mb-3 mx-auto col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label font-color1">Customer Name</label>
          <select class="form-select" id="cusName">
            <option selected>Select</option>
          </select>
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label">Reason</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="txtReason" placeholder=" " maxlength="50" >
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Amount(OMR)</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control " id="txtAmount" placeholder=" " maxlength="20"
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Profit(OMR)</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control " id="txtProfit" placeholder=" " maxlength="20"
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
        </div>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12 text-center">
          <label class="form-label font-color1">Collection Date :</label><br>
          <input type="text" class="form-control text-center" id="datepicker" placeholder="Select Date " maxlength="40" readonly>
        </div>
        
        

        <div class="mb-3" id="insertBtn">
          <button class="btn btn-success" id="updateBtn" type="button">Update</button>
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
      $('#tableDiv').hide();
    })
      /*************** Datepicker ******************/ 

      $(function(){
	    $( "#datepicker" ).datepicker({
	      dateFormat: "yy-mm-dd",
	      changeMonth: true,
	      changeYear: true,
          maxDate: new Date
	    	});
	 	 });

      /**************** Clear Form *********************/

    function clearForm(){
      $('#txtInvoice').val('');
      $('#cusAddress').val('');
      $('#cusName').val('');
      $('#txtAmount').val('');
      $('#txtProfit').val('');
      $('#txtReason').val('');
    }

      /**************** show customer name with Ajax ****************/

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
               $("#cusName").append("<option value=\""+value.customer_name+"\">"+value.customer_name+"</option>");

            });
            
          }
        });
      });


     	/*************** Get data into Form ******************/

		$("table").on('click','.edit',function(){
      $('#tableDiv').show();

			var id=$(this).data('id');
			var currentRow=$(this).closest("tr"); 
      var Invoice=currentRow.find("td:eq(1)").text(); 
      var cusAddress=currentRow.find("td:eq(2)").text(); 
      var cusName=currentRow.find("td:eq(3)").text(); 
      var txtReason=currentRow.find("td:eq(4)").text(); 
      var txtAmount=currentRow.find("td:eq(5)").text();
      var txtProfit=currentRow.find("td:eq(6)").text();
      var datepicker=currentRow.find("td:eq(7)").text();

      clearForm();

      $('#txtInvoice').val(Invoice);
      $('#txtReason').val(txtReason);
      $('#txtAmount').val(txtAmount);
      $('#txtProfit').val(txtProfit);
      $('#datepicker').val(datepicker);
      $('#cusAddress option[value="'+cusAddress+'"]').attr('selected',true);
      
      //get Address and set name
      $.ajax({
          url : "selectCusName.php",
          type : "GET",
          data: { 'address' : cusAddress},
          success : function(data){
            let dd=JSON.parse(data)
             $.each(dd, function(index, value) {
               $("#cusName").append("<option value=\""+value.customer_name+"\">"+value.customer_name+"</option>");
               $('#cusName option[value="'+cusName+'"]').attr('selected',true);
            });
            
          }
        });

      $('.edit').hide();
    })


     /**************** Data Update with Ajax ****************/

    $(document).on('click','#updateBtn',function(){
      $('#updateBtn').attr("disabled", "disabled");
      $('#updateBtn').text("Please Wait !!!");
      
      var txtInvoice = $("#txtInvoice").val();
      var cusAddress = $("#cusAddress").val();
      var cusName = $("#cusName").val();
      var txtAmount = $("#txtAmount").val();
      var txtProfit = $("#txtProfit").val();
      var txtReason = $('#txtReason').val();
      var datepicker = $('#datepicker').val();

      if(datepicker !="" && txtInvoice !="" && cusName !="" && cusAddress !="" && txtAmount !="" && txtReason !="" && txtProfit !=""){

        $.ajax({
          url: 'collectionUpdate.php',
          type: "POST",
          data:{
            txtInvoice : txtInvoice,
            cusAddress : cusAddress,
            cusName : cusName,
            txtAmount : txtAmount,
            txtReason : txtReason,
            txtProfit : txtProfit,
            datepicker : datepicker
          },
          success:function(response){
            swal({
                title: "Message",
                text: "Data Updated",
                type: "success"
              }).then(function(){
                window.location ="CusColAdmin.php?invoice="+txtInvoice;
               
              });

              
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
