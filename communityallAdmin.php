<?php  include("connDatabase/connection.php");
session_start();
$userData = $_SESSION['auth_user'];
$userId = $userData['userid'];
$username = $userData['username'];
$role = $userData['role']; 

if (!$userId) {
    // Redirect to the login page or handle authentication as needed
    header("Location: ./LogIn-SignUp-forgget/LogIn.php");
    exit;
}?>



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
    @media (max-width: 600px ){
            .post-com {
            width: 290px;
            height: auto;
        }
        }

    </style>

    </style>
    </head>
    <body>
        <div class="main_content" id="main_content">
            <section class="section">
       
<!--========== HEADERR ==========-->
<header class="header">
            <div class="header__container">
                

                <a href="./adminpage.php" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
    
                
                    <!-- php for profile header  -->
                             <?php
                                 // sql for image profile from user header
                                 $userprofileHeaderId=$userId; // get from session
                                 $sqlprofileHeader = "SELECT user.*, profile.*
                                 FROM user
                                 INNER JOIN profile ON user.user_id = profile.user_id
                                 WHERE user.user_id = $userprofileHeaderId";// get from session
                                 
                                             
                                 $resultVariableprofileHeader = mysqli_query($connection, $sqlprofileHeader);
                                 $usersVariableprofileHeader = mysqli_fetch_all($resultVariableprofileHeader, MYSQLI_ASSOC);
                                //    print_r($usersVariableprofileHeader);
                                 ?>

                                <?php foreach ($usersVariableprofileHeader as $userDprofileHeader): ?>
                                <?php
                                 // Cloudinary cloud name
                                 $cloudinaryCloudNameuserDprofileHeader = 'dbete4djx';
                                $imageNameuserDprofileHeader = $userDprofileHeader['profile_photo'];
                                 $imageUrluserprofileHeader = "https://res.cloudinary.com/{$cloudinaryCloudNameuserDprofileHeader}/image/upload/{$imageNameuserDprofileHeader}.jpg";
                                 ?>

                           
    
                <a>
                    <div class="header__profile">
                        <img class="header_profile" src="<?php echo $imageUrluserprofileHeader; ?>" alt="Profile Image">
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </header>


        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                   
                    <a href="./adminpage.php" class="nav__logo">
                        <img src="images/global logo.png" alt="Global Impact">   
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Our World</h3>
                            
                            
                            <a href="./adminpage.php" class="nav__link Activeclass">
                                <i class="fa-solid fa-house nav_icon iconsColor "></i>
                                <span class="nav__name ">Home</span>
                            </a>
                        
        

                   
                     
                        </div>


                        <a href="./userpage.php" class="nav__link">
                        <i class="fa-solid fa-user-tie iconsColor"></i>
                            <span class="nav__name">User Page</span>
                        </a>

    

                        <a href="../Globalimpactwebsite/Admin-Dashboard/index.php" class="nav__link">
                            <i class="fa-solid fa-chart-line"></i>
                            <span class="nav__name">Dashboard</span>
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

                    <!-- <a href="./LogIn-SignUp-forgget/logout.php"> -->
                    <button class="nav_logout" name="logout_btn" onclick="logout()">LOGOUT</button>
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
                                if (response.trim() === 'success') {
                                    alert('Community deleted successfully!');
                                    window.location.href = 'communityallAdmin.php';
                                    // Optionally, you can redirect the user to another page or update the UI.
                                } else {
                                    alert('Error deleting community.');
                                }
                            })
                            .fail(function() {
                                alert('Error communicating with the server.');
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