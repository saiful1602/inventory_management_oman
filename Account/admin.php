<?php
  include("../DBconfig.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Admin Panel</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form">
            <h2 class="title">Hello Admin !!!</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="txtName" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" />
            </div>
            <input type="button" id="btnLogin" value="Login" class="btn solid" />

            <p style="color:red;font-weight:bold;" class="social-text">Forgot password?</p>

          </form>
          
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>ALI BIN MOHAMMED (SAYED)</h1>
            <h3 >Welcome to !!!</h3>
            <h2>Admin Panel</h2>

          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
      
          </div>
        </div>
      </div>
    </div>

    <script>
      $('#btnLogin').click(function(){
        var txtName = $('#txtName').val();
        var txtPassword = $('#txtPassword').val();
        swal({
          title: " Please Wait !!!",
          buttons: false,
          closeOnClickOutside: false
        })
        if(txtName != "" && txtPassword != ""){
          $.ajax({
            url: "admin_auth.php",
            type: "POST",
            data: {
              txtName:txtName,
              txtPassword:txtPassword
            },
            success : function(response){
              var data = $.parseJSON(response);
              if(data.status ==  'success'){
                window.location = '/test/admin_panel/admin_panel.php';
              }else{
                swal(data.message)
              }
            }
          })
        }else{
          swal("Please fill the form");
        }
      })
    </script>
  </body>
</html>

