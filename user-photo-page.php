<?php
    include './connDatabase/Connection.php';
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
    <!-- php for profile header  -->
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
    <title>user photo page</title>
    <link rel="stylesheet" type="text/css" href="profilepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>    
    <!--Section: Contact v.2-->
    <section class="section">
        <!-- Header Section -->
        <header class="header">
            <div class="header__container">
                

                <a href="./index.html" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
    
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
               
                <a href="./index.html" class="nav__logo">
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

                    <a href="./contactus.php" class="nav__link ">
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
                            <span class="nav__name" style="margin-bottom: 10px; color: #ecf0f3;" > Dark mode</span>
                            <input type="checkbox" id="toggle-switch">
                            <label for="toggle-switch"></label>
                        </div>
                    </div>
                </div>



               
            

                <button class="nav_logout" name="logout_btn" onclick="logout()">LOGOUT</button>
        </nav>
    </div>

    <?php

// Get the pub_id from the URL
$friendId = isset($_GET['friend_id']) ? $_GET['friend_id'] : null;
// select all the user information  from database and display them in the html form based on the public id of the user's profile picture

$query1 = "SELECT * FROM profile WHERE user_id= '$friendId' ";
$result1 = $connection->query($query1);


if ($result1) {
    // Fetch the rows from the result sets
    $row1 = $result1->fetch_assoc();
    $friendid = $row1['user_id'];
    $profilepubid = $row1['profile_photo'];
    $coverpublicid = $row1['cover_photo'];
    $cloudinaryname = 'dbete4djx';
    $profile = "https://res.cloudinary.com/{$cloudinaryname}/image/upload/{$profilepubid}";
    $cover = "https://res.cloudinary.com/{$cloudinaryname}/image/upload/{$coverpublicid}";

}


     //select from  the follow table
     $queryselectFollow = "SELECT follow FROM follow WHERE user_id='$userid' AND friend_id='$friendid' ORDER BY follow_id DESC LIMIT 1";
     $resultselectFollow = $connection->query($queryselectFollow);
     // Fetch the rows from the result sets
     $row5 =  $resultselectFollow->fetch_assoc();
     if($row5){
        $follow = $row5['follow'];

     }
     else{
        $follow= "";
     }

$query2 = "SELECT First_name, last_name,user_name FROM user WHERE user_id= '$friendid' ";
$result2 = $connection->query($query2);
if ($result2) {
    // Fetch the rows from the result sets
    $row2 = $result2->fetch_assoc();

}

// Query to get the count of rows
$query3 = "SELECT COUNT(*) AS nb_posts FROM userposts WHERE user_id = '$friendid'";
$result3 = $connection->query($query3);
if ($result3) {
    // Fetch the result as an associative array
    $row = $result3->fetch_assoc();

    // Access the count value
    $rowCount = $row['nb_posts'];
} else{
    $rowCount = 0;
}

// Query to get the count of rows
$query4 = "SELECT followers,following FROM user WHERE user_id = '$friendid'";
$result4 = $connection->query($query4);
if ($result4) {
    // Fetch the result as an associative array
    $row = $result4->fetch_assoc();

    // Access the count value
    $followers = $row['followers'];
    $following = $row['following'];
} else{
    $rowCount = 0;
}
?>

      <!--profile page creation-->
     <div class="image-container">
        <img src="<?php echo $cover; ?>" alt="profile-img" class="profile-img">
     </div>
     <img src="<?php echo $profile; ?>" alt="circle-profile" class="circle-img">

      </div>

     <!--part2-->
     <div class="container">
        <div class="text-content">
            <div class="row-1">
                <div class="name-job">
                  <span><?php echo $row2['First_name'] . ' ' . $row2['last_name']; ?></span>
                  <small><?php echo $row1['bio']; ?></small>
                </div>
                <button class="btn" id="openButton1"  <?php echo $follow ? 'style="display:none;"' : ''; ?>>Follow</button>
                <button class="btn" id="unfollowButton1" <?php echo $follow ? '' : 'style="display:none;"'; ?>>UnFollow</button>

            </div>
          <div class="row-2">
            <div class="column">
              <i class="fa-solid fa-location-dot icon"></i>
              <span class="location"><?php echo $row1['location']; ?></span>
            </div>
            <div class="column">
              <i class="fa-regular fa-newspaper icon"></i>
              <span class="numbers"><?php echo $rowCount; ?></span>
              <span>Post</span>
          </div>
          <div class="column">
              <i class="fa-solid fa-user-group icon"></i>
              <span class="numbers" id="followersCount"><?php echo $followers; ?></span>
              <span>Followers</span>
          </div>
          <div class="column">
              <i class="fa-solid fa-user-group icon"></i>
              <span class="numbers" id="followingCount"><?php echo $following; ?></span>
              <span>Following</span>
          </div>
          </div>
        </div>
      </div>

      <div class="navbar-profile">
        <div class="overview" id="overview">OVERVIEW</div>
        <div class="nav-prof-name" id="photo">PHOTOS</div>
        <div class="nav-prof-name" id="up">UPVOTED</div>
        <div class="nav-prof-name" id="down">DOWNVOTED</div>
      </div>
     
     </div>
    </div>

    <!--create the photo section-->
    <!-- create the photo section -->
<div class="grid-photo-container-user">
    <?php
    // select all the user post images from the database and display them in the photos section

    $query = "SELECT imagepost.image
    FROM imagepost
    JOIN userposts ON imagepost.userpost_id = userposts.userpost_id
    WHERE userposts.user_id = $friendid AND userposts.type_id = 2";
    
    $result = $connection->query($query);

    if ($result) {
        // Fetch all rows into an associative array
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        // Process each row
        foreach ($rows as $row) {
            $imageURL = $row['image'];

            // Output the image HTML
            echo '<div class="grid-item-user">';
            echo '<img src="https://res.cloudinary.com/dbete4djx/image/upload/' . $imageURL . '.jpg" alt="User Post Image" style="object-fit: cover;position:relative;width: 100%; height: 100%;border-radius: 10%;">';
            echo '</div>';
        }
    } else {
        // Handle query execution error
        echo 'Error executing the query: ' . $connection->error;
    }

    // Close the result set and the database connection
    $result->close();
    $connection->close();
    ?>
    </section>
</div>
    <!------------------------------------------------------------------------------------->
    <script>
        /*----------------overview page--------------*/
   document.addEventListener('DOMContentLoaded', function() {
   document.getElementById('overview-link').addEventListener('click', function() {
   // Specify the URL of the page you want to navigate to
   var overviewPageUrl = 'edit-post.html';

   // Navigate to the specified page
   window.location.href = overviewPageUrl;
});
});


// JavaScript
document.addEventListener('DOMContentLoaded', function() {
       document.getElementById('aboutus').addEventListener('click', function() {
   // Specify the URL of the page you want to navigate to
   var profilePageUrl = 'about-us.html';

   // Navigate to the specified page
   window.location.href = profilePageUrl;
});
});

 // JavaScript
 document.addEventListener('DOMContentLoaded', function() {
       document.getElementById('contactus').addEventListener('click', function() {
   // Specify the URL of the page you want to navigate to
   var profilePageUrl = 'contactUs.html';

   // Navigate to the specified page
   window.location.href = profilePageUrl;
});
});
     </script>
     <script>
    const overview = document.getElementById("overview");

    overview.addEventListener('click', function() {
        // Redirect to the user profile page using the pub_id
        const friendId = <?php echo json_encode($friendId); ?>;

        // Check if imgPubId is not null or undefined before redirecting
        if (friendId !== null && friendId !== undefined) {
            window.location.href = 'user-profile.php?friend_id=' + friendId;
        } else {
            console.error('friend_id is null or undefined.');
        }
    });
</script>
<script>
    const up = document.getElementById("up");

    up.addEventListener('click', function() {
        // Redirect to the user profile page using the pub_id
        const friendId = <?php echo json_encode($friendId); ?>;

        // Check if imgPubId is not null or undefined before redirecting
        if (friendId !== null && friendId !== undefined) {
            window.location.href = 'upvoted-user.php?friend_id=' + friendId;
        } else {
            console.error('friend_id is null or undefined.');
        }
    });
</script>
<script>
    const down = document.getElementById("down");

    down.addEventListener('click', function() {
        // Redirect to the user profile page using the pub_id
        const friendId = <?php echo json_encode($friendId); ?>;

        // Check if imgPubId is not null or undefined before redirecting
        if (friendId !== null && friendId!== undefined) {
            window.location.href = 'downvoted-user.php?friend_id=' + friendId;
        } else {
            console.error('friend_id is null or undefined.');
        }
    });
</script>
<script>
   

    document.getElementById('openButton1').addEventListener('click', function () {
    // Make a Fetch API request to update the following and followers count
    const userid = <?php echo $userid; ?>;
    const friendid = <?php echo $friendid; ?>;
    
    const data = {
        loggedInUserId: userid,
        friendId: friendid,
    };

    fetch('update_follow.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        // Update the UI or perform any other actions
        console.log('Follow success:', data);

        // Check if the response contains the new follower and following counts
        if (data.newFollowersCount !== undefined && data.newFollowingCount !== undefined) {
            // Update the UI with the new counts
            document.getElementById('followersCount').textContent = data.newFollowersCount;
            document.getElementById('followingCount').textContent = data.newFollowingCount;
            location.reload();
            

            // Toggle the visibility of the buttons
            //document.getElementById('openButton1').style.display = 'none';
            //document.getElementById('unfollowButton1').style.display = 'inline-block';
        }
    })
    .catch(error => {
        console.error('Follow error:', error);
    });
});

</script>
<script>
   
//for the unfollow button
    document.getElementById('unfollowButton1').addEventListener('click', function () {
    // Make a Fetch API request to update the following and followers count
    const userid = <?php echo $userid; ?>;
    const friendid = <?php echo $friendid; ?>;
    
    const data = {
        loggedInUserId: userid,
        friendId: friendid,
    };

    fetch('update_unfollow.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        // Update the UI or perform any other actions
        console.log('unFollow success:', data);

        // Check if the response contains the new follower and following counts
        if (data.newFollowersCount !== undefined && data.newFollowingCount !== undefined) {
            // Update the UI with the new counts
            document.getElementById('followersCount').textContent = data.newFollowersCount;
            document.getElementById('followingCount').textContent = data.newFollowingCount;

            location.reload();

            // Toggle the visibility of the buttons
            //document.getElementById('openButton1').style.display = 'inline-block';
            //document.getElementById('unfollowButton1').style.display = 'none';

        }
    })
    .catch(error => {
        console.error('unFollow error:', error);
    });
});

</script>

   
     
<script src="./indexAll.js" ></script>
</body>
</html>