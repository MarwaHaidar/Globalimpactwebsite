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
<!-- php for profile header -->
<?php
// sql for image profile from user header
$userprofileHeaderId = $userId; // get from session
$sqlprofileHeader = "SELECT user.*, profile.*
    FROM user
    INNER JOIN profile ON user.user_id = profile.user_id
    WHERE user.user_id = $userprofileHeaderId"; // get from session

$resultVariableprofileHeader = mysqli_query($connection, $sqlprofileHeader);
$usersVariableprofileHeader = mysqli_fetch_all($resultVariableprofileHeader, MYSQLI_ASSOC);
// print_r($usersVariableprofileHeader);
?>

<?php foreach ($usersVariableprofileHeader as $userDprofileHeader): ?>
    <?php
    // Cloudinary cloud name
    $cloudinaryCloudNameuserDprofileHeader = 'dbete4djx';
    $imageNameuserDprofileHeader = $userDprofileHeader['profile_photo'];
    $imageUrluserprofileHeader = "https://res.cloudinary.com/{$cloudinaryCloudNameuserDprofileHeader}/image/upload/{$imageNameuserDprofileHeader}.jpg";
    ?>
    <!-- Your HTML/PHP code here using $userDprofileHeader and $imageUrluserprofileHeader -->
<?php endforeach; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>about us</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!--========== Font Awsome ==========-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl p-0 " style="background-color: var(--backGroundColor);" style="border-radius: 10px;" >

         <!--========== HEADERR ==========-->
         <header class="header">
            <div class="header__container">
                

                <a href="./userpage.php" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
    

    
                <a href="profilepage.php" id="ProfilePath">
                    <div class="header__profile">
                        <img class="header_profile" src="<?php echo $imageUrluserprofileHeader; ?>" alt="Profile Image">
                    </div>
                </a>
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
                            
                            
                            <a href="./userpage.php" class="nav__link Activeclass">
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

                        <a href="./contactus.php" class="nav__link">
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
                                <span class="nav__name" style="margin-bottom: 10px;" ><div class="DarkModeColorName"> Dark mode</div> </span>
                                <input type="checkbox" id="toggle-switch">
                                <label for="toggle-switch"></label>
                            </div>
                        </div>
                    </div>



                   
                

                    <button class="nav_logout" name="logout_btn" onclick="logout()">LOGOUT</button>
            </nav>
        </div>


        


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
                <a href="" style="position: absolute; top: 10%; left: 5%;">
                    <h1 class="mt-4 Aboutusclass" style="color:var(--txteColor);">About Us</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="mb-4 animated slideInDown" style="color:var(--txteColor);">Connecting hearts,changing lives: Join our global movement.</h1>
                            <p class="pb-3 animated slideInDown" style="font-size: larger;color:var(--txteColor);">
                                At “Global Impact”, we're committed to creating a varied community
                                   where individuals from all over the world
                               come together to discuss important topics, share interests, and learn
                                     from one another.</p>
                            <a href="" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Read More</a>
                            <a href="contactus.html" class="btn btn-secondary-gradient py-sm-3 px-4 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="img/Screenshot (2).png" alt="">
                                <img class="img-fluid" src="img/Screenshot (3).png" alt="">
                                <img class="img-fluid" src="img/Screenshot (4).png" alt="">
                                <img class="img-fluid" src="img/Screenshot (1).png" alt="">
                                <img class="img-fluid" src="img/Screenshot (2).png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5 " id="about" style="background-color: var(--backGroundColor);">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary-gradient fw-medium">About Website</h5>
                        <h2 class="mb-4">#1 Website To Make Connections </h2>
                        <p class="mb-4" style="font-size: larger;">Welcome to  our online community, which is a place where people can connect, learn, and share.Explore, participate, 
                            and establish connections with people who have similar interests through 
                                 our unique system of interest-based communities.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex">
                                    <i class="fa fa-address-card fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">1234</h2>
                                        <p class="text-primary-gradient mb-0">Active Accounts</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="d-flex">
                                    <i class="fa fa-comments fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">1234</h2>
                                        <p class="text-secondary-gradient mb-0">Different communities</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.5s" src="img/Screenshot (7).png">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Features Start -->
        <div class="container-xxl py-5" id="feature" style="background-color: var(--backGroundColor);">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Website Features</h5>
                    <h1 class="mb-5">Awesome Features</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">User Profiles</h5>
                            <p class="m-0">Allow users to create their editable profile with personal information,profile pictures and cover photos.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-layer-group text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">News Feed</h5>
                            <p class="m-0">Implement a dynamic and personalized news feed that displays content from user's connection.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-edit text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Media Sharing</h5>
                            <p class="m-0"> Support the uploading and Sharing of various types of media, including images.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-shield-alt text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Fully Secured</h5>
                            <p class="m-0"> The accounts and private information of users are secured and not accessible by other users.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-cloud text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Cloud Storage</h5>
                            <p class="m-0"> All photos of the users will be uploaded on cloud.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-mobile-alt text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Responsive</h5>
                            <p class="m-0">Our website automatically adjusts for different-sized screens and viewports.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->


        <!-- Screenshot Start -->
        <div class="container-xxl py-5" style="background-color: var(--backGroundColor);">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary-gradient fw-medium">Screenshot</h5>
                        <h1 class="mb-4">User Friendly interface And Very Easy To Use GlobalImpact website.</h1>
                        <p class="mb-4"> Our website considers the needs and preferences of the target audience to provide a positive and intuitive experience. </p>
                        <p><i class="fa fa-check text-primary-gradient me-3"></i>Clear and Concise Design</p>
                        <p><i class="fa fa-check text-primary-gradient me-3"></i> Clear and Intuitive Navigation Menu</p>
                        <p class="mb-4"><i class="fa fa-check text-primary-gradient me-3"></i>Responsive and Functions Well on Various Devices</p>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                        <div class="owl-carousel screenshot-carousel">
                            <img class="img-fluid" src="img/Screenshot (1).png" alt="">
                            <img class="img-fluid" src="img/Screenshot (2).png" alt="">
                            <img class="img-fluid" src="img/Screenshot (3).png" alt="">
                            <img class="img-fluid" src="img/Screenshot (4).png" alt="">
                            <img class="img-fluid" src="img/Screenshot (3).png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Screenshot End -->

        <!-------Video Start------->
<section class="video-section prelative text-center white" style="background-color: var(--backGroundColor);">
    <div class="section-padding video-overlay" style="border-radius: 5px;">
      <div class="container p-4 ">
        <h3>Watch Now</h3>
        <i class="fa fa-play" id="video-icon" aria-hidden="true"></i>
        <div class="video-popup">
          <div class="video-src">
            <div class="iframe-src">
              <iframe src="https://www.youtube.com/embed/rClDzqflZb0?rel=0&amp;showinfo=0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-------Video End-------> 

         <!-- team section -->

  <section class="team_section layout_padding" style="background-color: var(--backGroundColor);">
    <div class="container" style="margin-top: 50px;background-color: var(--backGroundColor);">
      <div class="heading_container heading_center" style="display: flex; flex-direction: column; align-items: center;">
        <h2>
          Our Team
        </h2>
        <p style="font-size: large;">
          Our Team is a group of 3 Full Stack Developers, that had the chance to join the ESA Coding Lab program. This website is there first project in the program.
        </p>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/rayan-profile.JPG" alt="" style="object-fit: cover;">
            </div>
            <div class="detail-box">
              <h3>
                Rayan Soltan
              </h3>
              <h6 class="">
              <small>  Full Stack Developer</small>
              </h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
            <div class="box">
              <div class="img-box">
                <img src="images/myself.jpg" alt="" style="object-fit: cover;">
              </div>
              <div class="detail-box">
                <h3>
                  Oussama Hamzeh
                </h3>
                <h6 class="">
                  <small>  Full Stack Developer</small>
                </h6>
              </div>
            </div>
          </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/marwa2.jpg" alt="" style="object-fit: cover;">
            </div>
            <div class="detail-box">
              <h3>
                Marwa Haidar
              </h3>
              <h6 class="">
                <small>  Full Stack Developer</small>
              </h6>
            </div>
          </div>
        </div>
    
      </div>
    </div>
  </section>

  <!-- end team section -->

    <!-- aboutus  Footer -->
    <div class="AboutFooter">

    
        <div class="boxAboutIcon">
            <div class="iconAboutIcon">
                <i class="fab fa-facebook"></i>
            </div>
            <span class="spanAboutIcon">Facebook</span>
        </div>
        <div class="boxAboutIcon">
            <div class="iconAboutIcon">
                <i class="fab fa-instagram"></i>
            </div>
            <span class="spanAboutIcon">Instagram</span>
        </div>
        <div class="boxAboutIcon">
            <div class="iconAboutIcon">
                <i class="fab fa-twitter"></i>
            </div>
            <span class="spanAboutIcon">Twitter</span>
        </div>
        <div class="boxAboutIcon">
            <div class="iconAboutIcon">
                <i class="fab fa-youtube"></i>
            </div>
            <span class="spanAboutIcon">YouTube</span>
        </div>
        <div class="boxAboutIcon">
            <div class="iconAboutIcon">
                <i class="fab fa-linkedin"></i>
            </div>
            <span class="spanAboutIcon">LinkdIn</span>
        </div>
  

</div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up text-white"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        wow = new WOW();
        wow.init();
    $(document).ready(function(e) {
    
        $('#video-icon').on('click',function(e){
        e.preventDefault();
        $('.video-popup').css('display','flex');
        $('.iframe-src').slideDown();
        });
        $('.video-popup').on('click',function(e){
        var $target = e.target.nodeName;
        var video_src = $(this).find('iframe').attr('src');
        if($target != 'IFRAME'){
        $('.video-popup').fadeOut();
        $('.iframe-src').slideUp();
        $('.video-popup iframe').attr('src'," ");
        $('.video-popup iframe').attr('src',video_src);
        }
        });
    
        $('.slider').bxSlider({
        pager: false
        });
    });
    
    // for logout 

    function logout() {

window.location.href = 'LogIn-SignUp-forgget/logout.php';
}

    </script>
    <script src="index.js"></script>
    <script src="indexAll.js"></script>
</body>

</html>