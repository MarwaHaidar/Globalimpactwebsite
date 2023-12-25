
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp</title>
  <link rel="stylesheet" href="./LoginSignForgget.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  

</head>
<div class="image-container-kawkab">
  <img class="img-kawkab  " src="./LogSignImages/kawkab.png" alt="Image kawkab">
  <img class="img-kawkab2" src="./LogSignImages/kawkab.png" alt="Image kawkab">
</div>

<body>


  <div class="image-container">
    <img class=" global-black" src="./LogSignImages/global-back.png" alt="Global Black">
    <img class=" global-text" src="./LogSignImages/global-text.png" alt="Global Text">
  </div>

  <div class="box backgroundColor-box " id="loginBox">

    <div class="SignUp-title">Sign Up</div>
   
    <form action="Signupcode.php" method="post">
    

    <input class="input-username" type="text" id="username" name="username" placeholder="username" >
    <input class="input-username" type="text" id="firstname" name="firstname" placeholder="First Name" >
    <input class="input-username" type="text" id="lastname" name="lastname" placeholder="Last Name" >
    <input class="input-email" type="text" id="email" name="email" placeholder="email">
    <input class="input-password" type="password" id="password" name="password" placeholder="password">
    <input class="input-password" type="password" id="confirmPassword" name="confirmPassword" placeholder="confirm password" >
    
    
    <button class="SignUp-button" type="submit" name="signup_btn">
     <div class="SignUp-text">Sign Up</div>
</button>
    </form>    
    <?php
 if(isset($_GET['message'])){
  echo '<h6>'.$_GET['message'].'</h6>';}
 ?>
    
    <p> Already Registration ? <a id="LogInLink" class="Login-link" href="LogIn.php">Login</a></p>
    <!-- <p>Terms & Conditions </p>
    <p>Support</p> -->


  </div>

  <div class='stars'></div>
  <div class='twinkling'></div>
  <div class='clouds'></div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('LogInLink').addEventListener('click', function (event) {
      event.preventDefault();
      document.getElementById('loginBox').classList.add('zoom-out');
      setTimeout(() => {
        window.location.href = './LogIn.php';
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>