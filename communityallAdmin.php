<?php  include("connDatabase/connection.php");
session_start(); ?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== Font Awsome ==========-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="index.css">

        <title>Responsive sidebar submenus</title>
        <style>
       .communityall__container {
        width: 900px !important;
        
        margin-top: 60px;
        }

        .post-com {
        outline-offset: -1rem;
        outline: .1rem solid rgba(0, 0, 0, .1);
        transition: .2s linear;
        width: 900px !important;
        box-shadow: none;
        margin-left:3%;
        
        height: auto;
        margin-top: 30px;
        
        border: 1px solid var(--varColorLightDrak);
        padding: 20px;
        border-radius: 10px;
        
        background-color: var(--varColorLightDrak);
        }

        .post-com:hover {
        outline-offset: 0rem;
        outline: .2rem solid gray;
        }

        .hidden {
        display: none;
        } 
        .community-image{
        width:15%;
        height:15%;

        }


        .post-com-header {
        display: flex;
        align-items: center;
        position: relative;

        } 

    </style>
    </head>
    <body>
        <div class="main_content" id="main_content">
            <section class="section">
       
 <!--========== HEADER ==========-->
 <header class="header">
    <div class="header__container">
        

        <a href="./index.html" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>

        <div class="header__search">
            <input type="search" placeholder="Search" class="header__input">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>

        <div class="header__profile">
            <img  class="header_profile" src="./images/myselZoom.jpg">
            
        </div>
    </div>
</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
           
            <a href="./index.html" class="nav__logo">
                <img src="images/global logo.png" alt="Global Impact">   
            </a>

            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">Our World</h3>
                    
                    
                    <a href="./index.html" class="nav__link">
                        <i class="fa-solid fa-house nav_icon iconsColor "></i>
                        <span class="nav__name ">Home</span>
                    </a>
                
                    <div class="nav__dropdown">
                        <a href="./categories.html" class="nav__link">
                            <i class="fa-solid fa-layer-group iconsColor"></i>
                            <span class="nav__name">Categories</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="./categories.html" class="nav__dropdown-item">Sports</a>
                                <a href="./news.html" class="nav__dropdown-item">News</a>
                                <a href="./technology.html" class="nav__dropdown-item">Technologies</a>
                                <a href="./movies.html" class="nav__dropdown-item">Movies</a>
                                <a href="./arts.html" class="nav__dropdown-item">Arts</a>
                            </div>
                        </div>
                    </div>

                    <a href="./about-us.html" class="nav__link">
                        <i class="fa-solid fa-earth-americas iconsColor" ></i>
                        <span class="nav__name">About Us</span>
                    </a>
                </div>

                <a href="#" class="nav__link">
                    <i class="fa-solid fa-envelope iconsColor" ></i>
                    <span class="nav__name">Contact Us</span>
                </a>
                <a href="#" class="nav__link">
                    <i class="fa-solid fa-shop iconsColor"></i>
                    <span class="nav__name">Market Place</span>
                </a>
            </div>

                <div class="nav__items">
                    <h3 class="nav__subtitle">Top Picks</h3>

                   
                        <a href="#" class="nav__link">
                            <i class="fa-solid fa-folder-plus iconsColor" ></i>
                            <span class="nav__name">New</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        

                    

                    <a href="#" class="nav__link">
                        <i class="fa-solid fa-arrow-trend-up iconsColor"></i>
                        <span class="nav__name">Trendy</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class="fas fa-thumbs-up iconsColor" ></i>
                        <span class="nav__name">Recommended</span>
                    </a>
                    
                </div>
                <div class="nav__items">
                    <h3 class="nav__subtitle " style="margin-top: 30px;">Settings</h3>

                    <div class="theme-switch">
                        <span class="nav__name" style="margin-bottom: 10px; color: #ecf0f3;" >Dark mode</span>
                        <input type="checkbox" id="toggle-switch">
                        <label for="toggle-switch"></label>
                    </div>
                </div>
            </div>



           
        

        <button class="nav_logout" onclick="logout()">LOGOUT</button>
    </nav>
</div>








        <!--------------------------------------------------------->
        <div class="communityall__container" id="communityall__container" >
            <?php
           
            require 'vendor/autoload.php';
            
            // Your Cloudinary configuration goes here
            // use Cloudinary\Configuration\Configuration;
            // Configuration::instance([
            //     'cloud' => [
            //         'cloud_name' => 'dbete4djx',
            //         'api_key'    => '177893987749658',
            //         'api_secret' => 'sCL_-AWCJAkCtaRj4kjxf-tIq8Q',
            //     ],
            // ]);
    
            if (isset($_SESSION['auth_user']) && $_SESSION['auth_user'] && isset($_SESSION['auth_user']['userid'])) {
                $userId = $_SESSION['auth_user']['userid'];
    
                if ($userId) {
                    $sql = "SELECT com_id,name, description, com_profile, com_category,followers FROM community";
                    $sql_run = mysqli_query($connection, $sql);
    
                    if (mysqli_num_rows($sql_run) > 0) {
                        while ($row = mysqli_fetch_assoc($sql_run)) {
                            $communityId=$row['com_id'];
                            $communityName = $row['name'];
                            $communityTopic = $row['com_category'];
                            $communityDescription = $row['description'];
                            $cloudinaryPublicId = $row['com_profile'];
                            $maxDescriptionLength = 253;
                            $membercount=$row['followers'];
    
                            $truncatedDescription = substr($communityDescription, 0, $maxDescriptionLength);
                            $remainingDescription = substr($communityDescription, $maxDescriptionLength);
    
                            $cloudinaryImageUrl = 'https://res.cloudinary.com/dbete4djx/image/upload/' . $cloudinaryPublicId;
                            ?>
    
                            <div class="post-com" >
                                <div class="post-com-header">
                                    <img src="<?php echo $cloudinaryImageUrl; ?>" alt="Community Image" class="community-image">
                                    <div class="community_details">
                                        <p class="community_name"><?php echo $communityName; ?></p>
                                        <p class="community-topic"><?php echo $communityTopic; ?></p>
                                    </div>
                                </div>
                                <div class="community_desc" >
                                    <p class="post-content">
                                        <?php echo $truncatedDescription; ?>
                                    </p>
                                    <p class="post-more hidden">
                                        <?php echo $remainingDescription; ?>
                                    </p>
                                    <a href="#" class="see-more-link" onclick="toggleSeeMore(this)">See More</a>
                                    <div class="communitylinksbtn">
                                        <button class="post_post" style="margin-right: 10px; bottom: 22px;"  onclick='deletecommunity(<?php echo $communityId ?>)'>Delete</button>
                                    </div>
                                </div>
                            </div>
    
                            <?php
                        }
                    } else {
                        echo "No communities found for this user";
                    }
    
                    mysqli_close($connection);
                } else {
                    echo "User not authenticated";
                }
            }
            ?>
           </div>
        </section>
        </div>
    


          

         
        
        
        
        <!-- ----------------------------------------------------------------- -->
        
        </div>
    </section>
    </div>
                        
                
                
                
            

            
                <script>
                        function deletecommunity(communityId) {
                            // Ask for confirmation
                            var confirmation = confirm("Are you sure you want to delete this community?");
                            
                            if (confirmation) {
                                // User confirmed, proceed with deletion
                                $.post('delete_community.php', { communityId: communityId }, function (response) {
                                    if (response === 'success') {
                                        alert('Community deleted successfully!');
                                        // Optionally, you can redirect the user to another page or update the UI.
                                    } else {
                                        alert('Error deleting community.');
                                    }
                                });
                            }
                        }


                        function logout() {
                        // Redirect to logout.php
                        window.location.href = 'LogIn-SignUp-forgget/logout.php';
                    }








                    function toggleSeeMore(link) {
                        var content = link.parentNode.querySelector('.post-content'); // Get the content paragraph
                        var moreText = link.parentNode.querySelector('.post-more'); // Get the "See More" text
                
                        if (content.style.display === 'block' && moreText.style.display === 'none') {
                            content.style.display = 'block';
                            moreText.style.display = 'block';
                            link.innerText = 'See Less';
                        } else {
                            content.style.display = 'block';
                            moreText.style.display = 'none';
                            link.innerText = 'See More';
                        }
                    }
                </script>

           
        
<script src="indexAll.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </body>
</html>