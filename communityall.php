<?php  include("connDatabase/connection.php");
 require 'vendor/autoload.php';
 use Cloudinary\Api\Upload\UploadApi;
 use Cloudinary\Configuration\Configuration;
 Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');
?>
<?php
    // Start the session
    session_start();

    // Access the 'auth_user' session variable
    if (isset($_SESSION['auth_user'])) {
        // Access individual elements of the array
        $userid = $_SESSION['auth_user']['userid'];
        $email = $_SESSION['auth_user']['email'];
        $role = $_SESSION['auth_user']['role'];
    } else {
        // Session variable not set, handle accordingly (e.g., redirect to login page)
        header("Location: ./LogIn-SignUp-forgget/LogIn.php");
        exit();
    }
?>
<!-- php for profile header -->
<?php
// sql for image profile from user header
$userprofileHeaderId = $userid; // get from session
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

                          <?php
                            //select from  the follow table
                            $queryselectFollow = "SELECT joins FROM joins  WHERE user_id='$userid' AND community_id='$communityId' ORDER BY join_id DESC LIMIT 1";
                            $resultselectFollow = $connection->query($queryselectFollow);
                            // Fetch the rows from the result sets
                            $row5 =  $resultselectFollow->fetch_assoc();
                            if($row5){
                            $join = $row5['joins'];

                            }
                            else{
                            $join= "";
                            }
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
                                    <button class="post_post" id="join_com<?php echo $communityId; ?>"  <?php echo $join ? 'style="display:none;margin-right: 10px; bottom: 22px;"' : ''; ?> onclick='join_community(<?php echo $communityId; ?>,<?php echo $userid; ?>)' >Join</button>
                                    <button class="post_post" id="unjoin_com<?php echo $communityId; ?>" <?php echo $join ? '' : 'style="display:none;margin-right: 10px; bottom: 22px;"'; ?> onclick='unjoin_community(<?php echo $communityId; ?>,<?php echo $userid; ?>)'>Unjoin</button>
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

        function join_community(comId,userid){
    
    console.log("user_id:",userid);
    console.log("community id:",comId);

    
    const data = {
        loggedInUserId: userid,
        comId: comId,
    };

    fetch('join_community.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.text())
    .then(data => {
        // Update the UI or perform any other actions
        console.log('join success:', data);
        window.location.href = window.location.href;

    })
    .catch(error => {
        console.error('Follow error:', error);
    });

        }

        function unjoin_community(comId,userid){
  
    console.log(userid);
    console.log(comId);

    
    const data = {
        loggedInUserId: userid,
        comId: comId,
    };

    fetch('unjoin.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        // Update the UI or perform any other actions
        console.log('unjoin success:', data);
        window.location.href = window.location.href;

    })
    .catch(error => {
        console.error('Follow error:', error);
    });

        }

                    /* So, when a user clicks the "Join" button for a community, it triggers this AJAX request to 'join_community.php' with the 
                    community ID as data. The server-side script ('join_community.php') is responsible for updating the database to reflect that 
                    the user has joined the community. After the server responds, the client-side callback function is executed, and in this example,
                     it shows an alert saying 'Joined community!'.    */
                    
                    function logout() {
                        // Redirect to logout.php bbbbbbgut
                        window.location.href pu= 'LogIn-SignUp-forgget/logout.php';
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