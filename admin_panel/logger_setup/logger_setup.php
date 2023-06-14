
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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Logger Setup</title>
    <link rel="stylesheet" href="../../style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
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

        <a href="#">
          <i style="font-size: 32px;" class='bx bx-user-circle' ></i>
          <span class="link_name">1. Logger Setup</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">1. Logger Setup</a></li>
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
      <label class="text-center fs-2 mb-3 headline">Logger Setup</label>
      <div class="col-lg-10 text-center mx-auto">
      <div class="row mx-auto text-center mb-3">
        
        <!-- Php code of get ID -->

          <?php
            $query="SELECT MAX(`id`) FROM `accounts`";
            $q=mysqli_query($con, $query);
              if($q){
                $row=mysqli_fetch_assoc($q);
                $FID=$row['MAX(`id`)'];
                $FID=$FID+1;
              }
           ?>

        <div class="mb-3 col-lg-6 col-md-6 col-sm-12" hidden>
          <label class="form-label">ID :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="fID" value="<?php echo $FID; ?>" placeholder=" ">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">First Name :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="firstName" placeholder=" ">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Last Name :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="lastName" placeholder=" ">
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">Email :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="txtEmail" placeholder=" " >
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label class="form-label">User Name :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="txtUserName" placeholder=" " >
        </div>
        <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
          <label  class="form-label">Password :</label><br>
          <input type="text" class="col-lg-8 col-md-10 col-sm-12 form-control" id="txtPassword" placeholder=" ">
        </div>
        <div class="mb-3" id="insertBtn">
          <button class="btn btn-success" id="addUser" type="button">Save</button>
        </div>
      </div>
      </div>
    </div>

    <div class="container col-lg-10 rounded-3 text-center" style="background: white;">
      <label class="text-center fs-2 mb-3 headline2">Logger List</label>
      <div class="row overflow-scroll">
        <table id="table" class="table table-striped table-bordered text-center">
          <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Email</th>
            <th>User Name</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $sel="SELECT `id`,`first_name`,`email`,`username`,`password` FROM `accounts`";
                $q=mysqli_query($con, $sel);
                $count=1; 
                while($row=mysqli_fetch_assoc($q))
                  {
                  
                    $a=$row['id'];
                    $b=$row['first_name'];
                    $c=$row['email'];
                    $d=$row['username'];
                    $e=$row['password'];
                    
              ?>
              <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $b; ?></td>
                <td><?php echo $c; ?></td>
                <td><?php echo $d; ?></td>
                <td><?php echo $e; ?></td>
                <td>
                  <button class="delete btn-danger" data-id="<?php echo $a; ?>" >Delete</button>
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
  </section>

  
  <script src="../../script.js"></script>
  <script>


    /**************** Data Insert with Ajax ****************/

    $(document).on('click','#addUser',function(){
      $('#addUser').attr("disabled", "disabled");
      $('#addUser').text("Please Wait !!!");

      var fID = $("#fID").val();
      var firstName = $("#firstName").val();
      var lastName = $("#lastName").val();
      var txtEmail = $("#txtEmail").val().trim();
      var txtUserName = $("#txtUserName").val();
      var txtPassword = $("#txtPassword").val();

      if(fID !="" && firstName !="" && lastName !="" && txtEmail !="" && txtUserName !="" && txtPassword !=""){
        $.ajax({
          url: 'insertLogger.php',
          type: "POST",
          data:{
            fID : fID,
            firstName : firstName,
            lastName : lastName,
            txtEmail : txtEmail,
            txtUserName : txtUserName,
            txtPassword : txtPassword
          },
          success:function(response){
            swal({
                title: "Message",
                text: "Data Added",
                type: "success"
              }).then(function(){
                window.location ="logger_setup.php";
              });

          }
        });

      }else{
        swal("Please fill the form")
      }

    });

    // Redirect to login page

    $('#adminRef').click(function(){
      window.open("../Account/admin.php");
    })


      /*************** Data delete with Ajax *****************/

    $(document).on('click','.delete',function(){
      var id=$(this).data('id');

      $.ajax({
        url: 'deleteLogger.php',
        type: "POST",
        data: {"id" : id},
        success:function(response){
          swal({
                title: "Message",
                text: "Data Deleted",
                type: "success"
              }).then(function(){
                window.location ="logger_setup.php";
              });
        }
      });
      
    });


    /************ Clear form function ************/
    function clearData(){
      $('#fID').val("");
      $('#firstName').val("");
      $('#lastName').val("");
      $('#txtEmail').val("");
      $('#txtUserName').val("");
      $('#txtPassword').val("");
    }

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
