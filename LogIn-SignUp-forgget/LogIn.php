<?php include("../connDatabase/connection.php");?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="./LoginSignForgget.css">
    
</head>

<div class="image-container-kawkab">
  <img class="img-kawkab  " src="./LogSignImages/kawkab.png" alt="Image kawkab">
  <img class="img-kawkab2" src="./LogSignImages/kawkab.png" alt="Image kawkab">
</div>

<body>
<div class="image-container">
    <img class="img-Logo global-black" src="./LogSignImages/global-back.png" alt="Global Black">
    <img class="img-Logo global-text" src="./LogSignImages/global-text.png" alt="Global Text">
  </div>
  

<div class="box backgroundColor-box "  id="loginBox">
    <form action="logincode.php" method="post">

    <div class="Login-title" >Login</div>
    <input class="input-email" type="text" id="email" name="email" placeholder="Enter your email" >
    <input class="input-password"  type="password" id="password" name="password" placeholder="Enter your password">
    
    <div class="checkbox-container">
        <input type="checkbox" id="myCheckbox" name="myCheckbox" value="yes">
        <label for="myCheckbox" class="custom-checkbox-label">Remember me</label>
      </div>
      
      <button class="login-button" name="login_now_btn"><div class="login-text">Login</div></button>
      </form>
      <?php     session_start();
                if(isset($_SESSION['status'])){
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status'];?></h5>
                    </div>
                    
                    <?php
                    unset($_SESSION['status']);
                }
               ?>
    
      <a id="forgotPass"class="forgotPassword-link" href="./ForgotPassword.html">Forgot Password</a>
      <p >Don't have an account ?  <a id="SignUpLink" class="SignUp-link" href="./SignUp.php">SignUp</a>
      </p>
      <!-- <p >Terms & Conditions </p>
      <p >Support</p>
       -->

      
        
</div>


<div class='stars'></div>
<div class='twinkling'></div>
<div class='clouds'></div>



</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('SignUpLink').addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('loginBox').classList.add('zoom-out');
    
            setTimeout(() => {
                window.location.href = './SignUp.php';
            }, 1000);
        });
    
        document.getElementById('forgotPass').addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('loginBox').classList.add('zoom-out');
    
            setTimeout(() => {
                window.location.href = './ForgotPassword.php';
            }, 1000);
        });
    
        document.getElementById('loginButton').addEventListener('click', function () {
            document.getElementById('loginBox').classList.add('zoom-in');
            setTimeout(() => {
                document.getElementById('loginBox').classList.remove('zoom-in');
            }, 1000);
        });
    });

    </script>
    
</html>
