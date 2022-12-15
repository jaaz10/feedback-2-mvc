<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<?php
session_start();
// error_reporting(0);

if ($_SESSION["login"]) {
  header("location:Users_list.php");
}
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="stylesheet.css">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->


    <!-- Login Form -->

    <h2>Admin Login</h2>

    <input type="text" id="login" class="fadeIn second" name="Name" placeholder="Username">

    <input type="password" id="password" class="fadeIn third" name="Password" placeholder="password">
    <p id="error_P" style="color:red"></p>
    <button class="btn btn-primary" onclick="login()">login</button><br>

    <br>
    <!-- Remind Password -->


  </div>
</div>
<?php
if ($_GET["message"] == "error") {

  echo ('<script> swal({
    title: "Not authorized!!",
    text: "Login First to access the page",
    icon: "error",
    button: "Ok",
    timer: 2000
  });</script>');
}
?>
<script>
  function login() {
    let x = document.getElementById('login').value;
    let y = document.getElementById('password').value;
    if (!x || !y) {
      jQuery('#error_P').html("Username and password must not be empty");
    } else

    {
      jQuery('#error_P').html("");

      $.ajax({
        type: 'Post',
        url: "check_login.php",
        data: {
          'Username': x,
          'Password': y
        },
        success: function(data) {
          // console.log(data);
          if (data == 0) {
            console.log("UN");
            swal({
              title: "Invalid Credentials",
              text: "Incorrect Username or Password",
              icon: "error",
              button: "Ok",
              timer: 1000
            });


          } else {
            window.location.replace("Users_list.php");

          }
        }
      });




    }



  }
</script>