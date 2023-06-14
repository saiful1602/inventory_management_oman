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
    <title>Forgot Password</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form">
            <h2 class="title">Enter Email</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="txtEmail" placeholder="Email Address" />
            </div>
            <input type="button" id="btnForgot" value="Send" class="btn solid" />
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
      $('#btnForgot').click(function(){
        var txtEmail = $('#txtEmail').val();
        swal({
          title: " Please Wait !!!",
          text: "Email Sent Successfull... \nPlease go to your email",
          buttons: false,
          closeOnClickOutside: false
        })
        if(txtEmail != ""){
          $.ajax({
            url: "sendMail.php",
            type: "POST",
            data: {
              txtEmail:txtEmail
            },
            success : function(response){
              var data = $.parseJSON(response);
              if(data.status ==  'success'){
                window.location = 'Login.php';
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

