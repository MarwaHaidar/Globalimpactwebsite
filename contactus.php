<?php 
include './connDatabase/Connection.php'; // Add a semicolon here

session_start();
$userData = $_SESSION['auth_user'];
$userId = $userData['userid'];
$username = $userData['username'];

if (!$userId) {
    // Redirect to the login page or handle authentication as needed
    header("Location: ./LogIn-SignUp-forgget/LogIn.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="contactus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>    
    <!--Section: Contact v.2-->
    <section class="section">
        <!-- Header Section -->
        <header class="header">
            <div class="header__container">
                

                <a href="./userpage.php" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
    
                <div class="header__profile" id="ProfilePath">
                    <img  class="header_profile" src="./images/myselZoom.jpg">
                    
                </div>
            </div>
        </header>

    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
               
                <a href="./userpage.php" class="nav__logo">
                    <img src="images/global logo.png" alt="Global Impact">   
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Our World</h3>
                        
                        
                        <a href="./userpage.php" class="nav__link ">
                            <i class="fa-solid fa-house nav_icon iconsColor "></i>
                            <span class="nav__name ">Home</span>
                        </a>
                    
                        <div class="nav__dropdown">
                            <a href="./categories.php" class="nav__link">
                                <i class="fa-solid fa-layer-group iconsColor"></i>
                                <span class="nav__name">Categories</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="./categories.php" class="nav__dropdown-item">Sports</a>
                                    <a href="./news.php" class="nav__dropdown-item">News</a>
                                    <a href="./technology.php" class="nav__dropdown-item">Technologies</a>
                                    <a href="./movies.php" class="nav__dropdown-item">Movies</a>
                                    <a href="./arts.php" class="nav__dropdown-item">Arts</a>
                                </div>
                            </div>
                        </div>

                        <a href="./about-us.php" class="nav__link">
                            <i class="fa-solid fa-earth-americas iconsColor" ></i>
                            <span class="nav__name">About Us</span>
                        </a>
                    </div>

                    <a href="./contactus.php" class="nav__link Activeclass">
                        <i class="fa-solid fa-envelope iconsColor" ></i>
                        <span class="nav__name">Contact Us</span>
                    </a>
                    <a href="./MarketPlace/MarketPlace.php" class="nav__link">
                        <i class="fa-solid fa-shop iconsColor"></i>
                        <span class="nav__name">Market Place</span>
                    </a>
                </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Top Picks</h3>

                       
                            <a href="./New.php" class="nav__link">
                                <i class="fa-solid fa-folder-plus iconsColor" ></i>
                                <span class="nav__name">New</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            

                        

                        <a href="./toppicks.php" class="nav__link">
                            <i class="fa-solid fa-arrow-trend-up iconsColor"></i>
                            <span class="nav__name">Trendy</span>
                        </a>

                        
                    </div>
                    <div class="nav__items">
                        <h3 class="nav__subtitle " style="margin-top: 30px;">Settings</h3>

                        <div class="theme-switch">
                            <span class="nav__name" style="margin-bottom: 10px; color: white;" >Dark mode</span>
                            <input type="checkbox" id="toggle-switch">
                            <label for="toggle-switch"></label>
                        </div>
                    </div>
                </div>



               
            

                <button class="nav_logout" name="logout_btn" onclick="logout()">LOGOUT</button>
        </nav>
    </div>


    <div class="question-header" > Have Some Questions?</div>

     <!--contactinfo with image-->
     <div class="contact-info-image">
        <img class="contact-img" src="images/img2-removebg-preview.png">
        <div class="get-in-touch">Get in touch</div>
        <hr class="hr-line">
        <div class="phone-form">
            <i class="fa-solid fa-phone icon-phone"></i>
            <a class="phone-nb" href="tel:+96179322974">+96179322974</a>
        </div>
        <div class="mail-form">
            <i class="fa-solid fa-envelope icon-mail"></i>
            <a class="email-text" href="mailto:globalImpact@gmail.com">globalImpact@gmail.com</a>
        </div>
      </div>

     <!-- Contact form -->
     <div class="contact-form">
         <!-- Grid column -->
         <div class="contact-inf-border">
             <form id="contact-form" name="contact-form" action="sendmessage.php" method="post">
                 <!-- First text input -->
                 <div class="first-text">
                     <input type="text" id="first-name" name="name" placeholder=" Your First Name" class="input-text-control" style="margin-top: 5%;" value="<?php echo $_SESSION['auth_user']['firstname'] ; ?>">
                     <input type="text" id="last-name" name="name" placeholder="Your Last Name" class="input-text-control" value="<?php echo $_SESSION['auth_user']['lastname'];?>">
                     <input type="text" id="phone-nb" name="name" placeholder="Your Phone Number" class="input-text-control" value="<?php echo $_SESSION['auth_user']['phone'];?>">
                     <input type="text" id="email" name="email" placeholder="write your email" class="input-text-control" value="<?php echo $_SESSION['auth_user']['email'];?>">
                 </div>
                 <!-- Text area for message -->
                     <div>
                         <textarea id="message" name="message" rows="2" placeholder="Message" class="msg-text"></textarea>
                     </div>
                     <div class="btn-form">
                 <i class="fa-regular fa-paper-plane icon-msg"></i>
                 <div><button class="btn-send-msg" name="send_message" style="border:none; background-color:#FB941E;">Send Message</button></div>
             </div>
         </div>
             </form>

             <!-- Button to submit form -->
            
         <!-- End of Grid column -->
     </div>
     
    
     <!-- End of Contact Form -->

    </section>






   
</body>
<script src="indexAll.js"></script>
<script>document.getElementById('ProfilePath').addEventListener('click', function(){
    window.location.href = 'profilepage.html';
  });

//   lougout 

function logout() {

window.location.href = 'LogIn-SignUp-forgget/logout.php';
}
  </script>
</html>
