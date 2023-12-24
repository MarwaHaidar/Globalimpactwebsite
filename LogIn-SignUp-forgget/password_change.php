<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

      <div class="box backgroundColor-box" id="loginBox" style="display:flex;justify-content:center;">

            <div class="forgot-title">Forgot Password?</div>
            <!-- <p class="pleaseEnterYourEmail" style="display:flex;justify-content:center;">Please enter your email</p> -->

            <form action="resetpass_code.php" method="post">

                <input class="input-email" type="hidden" id="token" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>" >
                
                <input class="input-email" type="text" id="username" name="email" placeholder="Your Email Address" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>">
                
                <input class="input-email" type="text" id="username" name="password" placeholder="New Password">
                
                <input class="input-email" type="text" id="username" name="confirmpass" placeholder="Confirm New Password">
                <button class="reset-button" type="submit" name="password_update">
                    <div class="reset-text">Reset Password</div>
                </button>
            </form>

            <p>Terms & Conditions</p>
            <p>Support</p>

    </div>
<div class='stars'></div>
<div class='twinkling'></div>
<div class='clouds'></div>
</body>

<!-- <script>
  document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('SignUpLink').addEventListener('click', function (event) {
          event.preventDefault();
          document.getElementById('loginBox').classList.add('zoom-out');
          setTimeout(() => {
              window.location.href = './SignUp.html';
          }, 1000); 
      });
  
      // Add a click event listener to the SignUp button for zoom-in effect
      document.getElementById('loginButton').addEventListener('click', function () {
          // Add a class to the entire login box to trigger the zoom-in effect
          document.getElementById('loginBox').classList.add('zoom-in');
  
          // Optional: You can add a timeout to remove the zoom-in class after a delay
          setTimeout(() => {
              document.getElementById('loginBox').classList.remove('zoom-in');
          }, 1000); // Adjust the time as needed
      });
  }); -->
  
    
  </script>
</html>