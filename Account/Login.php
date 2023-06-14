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
    <title>Sign in Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="txtName" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" />
            </div>
            <input type="button" id="btnLogin" value="Login" class="btn solid" />

            <a href="forgot_pass.php"><p style="color:red;font-weight:bold;" class="social-text">Forgot password?</p></a>

          </form>
          
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>ALI BIN MOHAMMED (SAYED)</h1>
            <h3 >Welcome to !!!</h3>
            <h2>Manager Panel</h2>

          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
      
          </div>
        </div>
      </div>
    </div>

    <script>

      $(document).on('keypress',function(e) {
          if(e.which == 13) {
            $('#btnLogin').click();
          }
      });
      $('#btnLogin').click(function(){
        Authnticate();
      })

      function Authnticate(){
        var txtName = $('#txtName').val();
        var txtPassword = $('#txtPassword').val();

        if(txtName != "" && txtPassword != ""){
          $.ajax({
            url: "authenticate.php",
            type: "POST",
            data: {
              txtName:txtName,
              txtPassword:txtPassword
            },
            success : function(response){
              var data = $.parseJSON(response);
              if(data.status ==  'success'){
                window.location = '/ali_bin_muhammed/index.php';
              }else{
                swal(data.message)
              }
            }
          })
        }else{
          swal("Please fill the form");
        }
      }
    </script>
  </body>
</html>

