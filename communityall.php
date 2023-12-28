<?php  include("connDatabase/connection.php");
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="index.css">
    
    <style>

        
        .post-com {
            width: 100%;
            height: auto;
            margin-top: 30px;
            margin-left: 33%;
            border: 1px solid var(--varColorLightDrak);
            padding: 20px;
            border-radius: 8px;
            box-shadow:var(--varBoxShadowColor);
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

    <title>Responsive sidebar submenus</title>
</head>

<body>
        <div class="main_content" id="main_content">
            <section class="section">
       
 <!--========== HEADER ==========-->
 <header class="header">
    <div class="header__container">
        

        <a href="userpage.php" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>

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
           
            <a href="./userpage.php" class="nav__logo">
                <img src="images/global logo.png" alt="Global Impact">   
            </a>

            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">Our World</h3>
                    
                    
                    <a href="./userpage.php" class="nav__link">
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
                <a href="MarketPlace/MarketPlace.php" class="nav__link">
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
                                    <button class="post_post" id="join_com"style="margin-right: 10px; bottom: 22px;" onclick='joinCommunity(<?php echo $communityId; ?>)'>Join</button>
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

        
 
      <script>
               function joinCommunity(communityId) {
                $.post('join_community.php', { communityId: communityId }, function (response) {
                    var result = JSON.parse(response);
                    if (result.status === 'success') {
                        alert('Joined community!');
                    } else if (result.status === 'already_joined') {
                        alert('You have already joined this community.');
                    } else {
                        alert('Error joining community: ' + result.message);
                    }
                });
            }



                    /* So, when a user clicks the "Join" button for a community, it triggers this AJAX request to 'join_community.php' with the 
                    community ID as data. The server-side script ('join_community.php') is responsible for updating the database to reflect that 
                    the user has joined the community. After the server responds, the client-side callback function is executed, and in this example,
                     it shows an alert saying 'Joined community!'.    */
                    
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