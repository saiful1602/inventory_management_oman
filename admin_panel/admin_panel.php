
<?php   

include("../DBconfig.php");
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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../style.css">
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
        <a href="logger_setup/logger_setup.php">
          <i style="font-size: 32px;" class='bx bx-user-circle' ></i>
          <span class="link_name">1. Logger Setup</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="logger_setup/logger_setup.php">1. Logger Setup</a></li>
        </ul>
      </li>

      <li>
        <a href="data_setup/data_setup.php">
          <i style="font-size: 32px;" class='bx bx-wrench' ></i>
          <span class="link_name">2. Data Setup Update</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="data_setup/data_setup.php">2. Data Setup</a></li>
        </ul>
      </li>

      <li>
        <a href="data_entry_update/data_entry_update.php">
          <i style="font-size: 32px;" class='bx bx-calendar' ></i>
          <span class="link_name">3. Data Entry Update/Backdate</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="data_entry_update/data_entry_update.php">3. Data Entry Update/Backdate</a></li>
        </ul>
      </li>

      <li>
        <a href="data_delete/data_delete.php">
          <i style="font-size: 32px;" class='bx bx-eraser' ></i>
          <span class="link_name">4. Data Entry Delete</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="data_delete/data_delete.php">4. Data Delete</a></li>
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
       <a href="admin_logout.php"><i class='bx bx-log-out'></i></a>
      </div>
      <div class="name-job">
        <div align="center" class="profile_name">
          <a href="admin_logout.php"><button class="logout btn btn-danger">Logout</button></a>
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
     
    </div>
  </section>

  
  <script src="../script.js"></script>
  <script>

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
