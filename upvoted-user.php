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

  <!-- -=--------------------------this SQL for posts display----------------------------- -->

                  
  <?php
                // <!-- sql for NAME AND Time post  -->
                
                $sqlUserPost = "SELECT userposts.*, profile.*, user.First_name, user.last_name, TIME(userposts.created_at) AS formatted_created_time
                FROM actions
                INNER JOIN userposts ON actions.post_id = userposts.userpost_id
                INNER JOIN user ON userposts.user_id = user.user_id
                INNER JOIN profile ON userposts.user_id = profile.user_id
                WHERE actions.user_id = $userid AND actions.action_id=1
                ORDER BY userposts.created_at DESC";

                $resultVariable = mysqli_query($connection, $sqlUserPost);
                $usersVariable = mysqli_fetch_all($resultVariable, MYSQLI_ASSOC);
                //  print_r($usersVariable);   

                // <!-- sql for text and image  post  -->

                $sqltextImage = "SELECT userposts.*, 
                COALESCE(textpost.content, '') AS content,  --  using for emty string
                COALESCE(imagepost.caption, '') AS caption, image
                FROM userposts
                LEFT JOIN imagepost ON userposts.userpost_id = imagepost.userpost_id
                LEFT JOIN textpost ON userposts.userpost_id = textpost.userpost_id;
                ";

                $resultVariabletextImage = mysqli_query($connection, $sqltextImage);
                $usersVariabletextImage = mysqli_fetch_all($resultVariabletextImage, MYSQLI_ASSOC);
                // print_r($usersVariabletextImage);

                 // <!-- sql for comment post  -->   
              
                $sqlComment = "SELECT user.*, comment.*, profile.*
                FROM comment
                INNER JOIN user ON comment.user_id = user.user_id
                INNER JOIN profile ON comment.user_id = profile.user_id";
                
                            
                    $resultVariableComment = mysqli_query($connection, $sqlComment);
                    $usersVariableComment = mysqli_fetch_all($resultVariableComment, MYSQLI_ASSOC);
                    
                    // print_r($usersVariableComment);



                    
                          // sql for image profile from user
                        $userprofileId=$userid; // get from session
                        $sqlprofileUser = "SELECT user.*, profile.*
                        FROM user
                        INNER JOIN profile ON user.user_id = profile.user_id
                        WHERE user.user_id = $userprofileId";// get from session
                        
                                    
                        $resultVariableprofileUser = mysqli_query($connection, $sqlprofileUser);
                        $usersVariableprofileUser = mysqli_fetch_all($resultVariableprofileUser, MYSQLI_ASSOC);
                        //   print_r($usersVariableprofileUser);



                         // <!-- sql story post  Select -->
                         $sqlstories = "SELECT stories.*, user.First_name, profile.profile_photo
                         FROM stories
                         INNER JOIN user ON user.user_id = stories.user_id
                         INNER JOIN profile ON profile.user_id = user.user_id
                         ORDER BY stories.created_at DESC";

                         $resultVariablestories = mysqli_query($connection, $sqlstories);
                         $usersVariablestories = mysqli_fetch_all($resultVariablestories, MYSQLI_ASSOC);
                        //   print_r($usersVariablestories);   

                    
                       
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

    <!-- -=----------------PHP For Posts ------------------------ -->
    <div class="nav-post-container">
<?php foreach ($usersVariable as $userpostD): ?>
                    <div class="post">
                        <div class="post-header">
                            <!-- <img src="images/rayan1.jpg" alt="Account Image" class="AccountImage" > -->
                        <?php
                        // Replace 'YOUR_CLOUDINARY_CLOUD_NAME' with your actual Cloudinary cloud name
                        $cloudinaryCloudNameProfile = 'dbete4djx';
                        $imageNameProfile = $userpostD['profile_photo']; // Assuming 'image' is the field name in your database
                        $imageUrlProfile = "https://res.cloudinary.com/{$cloudinaryCloudNameProfile}/image/upload/{$imageNameProfile}.jpg";
                        ?>
                          <img id="prof-img" src="<?php echo $imageUrlProfile; ?>" alt="Account Image" class="AccountImage" img-pub-id="<?php echo $imageNameProfile; ?>" >
                            <div class="user-ProfilePost">
                            <p class="account-name"><?php echo $userpostD['First_name']." ".$userpostD['last_name'] ?></p>
                                <div class="account-Date">
                                <small><?php echo  $userpostD['formatted_created_time']  ?></small>
                            <small> <i class="fa-solid fa-earth-americas"   style="padding-left: 3px;"></i></small>  
                                </div>
                            </div>
                        </div>


<!-- -=------------------PHP IF TEXT OT IMAGE---------------------- -->





                <?php foreach ($usersVariabletextImage as $userDtetxImage): ?>
                <?php if ($userDtetxImage['userpost_id'] == $userpostD['userpost_id']): ?>
                    <?php if ($userDtetxImage['type_id'] == 1): ?>
                        <p class="post-caption"><?php echo $userDtetxImage['content']; ?></p>
                    <?php elseif ($userDtetxImage['type_id'] == 2): ?>
                        <p class="post-caption"><?php echo $userDtetxImage['caption']; ?></p>
                       <?php $userDtetxImage['image'];?>   <!-- get name of picure from database -->
                        <?php
                        // Replace 'YOUR_CLOUDINARY_CLOUD_NAME' with your actual Cloudinary cloud name
                        $cloudinaryCloudName = 'dbete4djx';
                        $imageName = $userDtetxImage['image']; // Assuming 'image' is the field name in your database
                        $imageUrl = "https://res.cloudinary.com/{$cloudinaryCloudName}/image/upload/{$imageName}.jpg";
                        ?>
                        <img src="<?php echo $imageUrl; ?>" alt="Post Image" class="post-image">
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- this for upvote down vote form -->
                    <?php
                        //sql for upvote select 
                        
                        $sqlprofileupvote = "SELECT COUNT(*) AS Upvote
                        FROM actions
                        INNER JOIN userposts ON userposts.userpost_id = actions.post_id
                        INNER JOIN actiontype ON actions.action_id = actiontype.action_id
                        WHERE actions.action_id =1  -- the number one is upvote -->
                        AND actions.post_id = " . $userpostD['userpost_id'];
    
                        $resultVariableupvote = mysqli_query($connection,$sqlprofileupvote);
                        $upvoteCounts = mysqli_fetch_all($resultVariableupvote, MYSQLI_ASSOC);
                        // print_r($upvoteCounts);

                     
                        //sql for downvote select
                        
                        $sqlprofiledownvote = "SELECT COUNT(*) AS Dowvote
                        FROM actions
                        INNER JOIN userposts ON userposts.userpost_id = actions.post_id
                        INNER JOIN actiontype ON actions.action_id = actiontype.action_id
                        WHERE actions.action_id =2  -- the number one is downvotevote -->
                        AND actions.post_id = " . $userpostD['userpost_id'];
    
                        $resultVariabledownvote = mysqli_query($connection, $sqlprofiledownvote);
                        $downvoteCounts = mysqli_fetch_all($resultVariabledownvote, MYSQLI_ASSOC);
                        // print_r($downvoteCounts);
                       

                        //sql for comment select
                          
                           $sqlprofilecomment = "SELECT COUNT(*) AS Comment
                           FROM comment
                           INNER JOIN userposts ON userposts.userpost_id = comment.post_id
                           WHERE comment.post_id = " . $userpostD['userpost_id'];
       
                           $resultVariablecomment = mysqli_query($connection, $sqlprofilecomment );
                           $usersVariablecomment = mysqli_fetch_all($resultVariablecomment, MYSQLI_ASSOC);
                        //    print_r($usersVariablecomment);

                        
                        
                        
                        //sql for upvote and downvote insert

                        if (isset($_POST['upvotebtn'])) {
                            $upvoteContent = 1;
                        } elseif (isset($_POST['downvotebtn'])) {
                            $upvoteContent = 2;
                        }


                        
                        if (isset($_POST['upvotebtn']) || isset($_POST['downvotebtn'])) {
                            $userIdWriteupvote = $userId; // get from session
                            $userpostupvote_id = $_POST['userpostupvote_id'];


                            // Check if the user has already voted
                            $sqlCheckVote = "SELECT * FROM actions WHERE user_id = ? AND post_id = ?";
                            $stmtCheckVote = $connection->prepare($sqlCheckVote);
                            $stmtCheckVote->bind_param("ii", $userIdWriteupvote, $userpostupvote_id);
                            $stmtCheckVote->execute();
                            $resultCheckVote = $stmtCheckVote->get_result();

                          
                            
                            if ($resultCheckVote->num_rows > 0) {
                                // User has already voted, delete the previous vote
                                $sqlDeleteVote = "DELETE FROM actions WHERE user_id = ? AND post_id = ?";
                                $stmtDeleteVote = $connection->prepare($sqlDeleteVote);
                                $stmtDeleteVote->bind_param("ii", $userIdWriteupvote, $userpostupvote_id);
                                $stmtDeleteVote->execute();
                            } else {
                                // User hasn't voted yet, insert the new vote
                                $sqlupvoteContentInsert = "INSERT INTO actions(user_id, post_id, action_id) VALUES (?, ?, ?)";
                                $stmtupvote = $connection->prepare($sqlupvoteContentInsert);
                                $stmtupvote->bind_param("iii", $userIdWriteupvote, $userpostupvote_id, $upvoteContent);
                        
                                try {
                                    $stmtupvote->execute();
                                    echo '<script>window.location.href = "userpage.php";</script>';
                                    exit();
                                } catch (mysqli_sql_exception $e) {
                                    // Handle the duplicate entry error silently
                                    // Log the error for debugging purposes
                                    error_log('Error in your query failed: ' . $e->getMessage());
                        
                                    // Redirect to userpage.php without displaying the error
                                    echo '<script>window.location.href = "userpage.php";</script>';
                                    exit();
                                }
                            }
                        }
                    ?>
                   
                    <form action="userpage.php" method="POST" >
                    <div class="post-actions">
                    <div class="vote-buttons">
                        <button name="upvotebtn"  class="darkmodeUpDownComments"><i  class="fa-solid fa-thumbs-up UpvateClass" ></i><span class="count"><?php foreach ($upvoteCounts as $upvote):  echo $upvote['Upvote']; endforeach; ?></span>
                        <button name="downvotebtn" class="darkmodeUpDownComments"><i class="fa-solid fa-thumbs-down DownClass" ></i></button><span class="count"><?php foreach ($downvoteCounts as $Downvote):  echo $Downvote['Dowvote']; endforeach; ?></span>
                    <button class="comment-button darkmodeUpDownComments" onclick="comment()"><i class="fa-solid fa-comment commnetsVote"></i></button><span class="count"><?php foreach ($usersVariablecomment as $commentcount):  echo $commentcount['Comment']; endforeach; ?></span>
                
                    <input type="hidden" name="userpostupvote_id" value="<?php echo $userpostD['userpost_id']; ?>">
                    </div>
                    </div>
                    </form>
            <!-- -----------this for view all comment--------------- -->

    
                    <div class="view-comments">
                        <a class="CommentsLink" href="javascript:void(0);" onclick="showCommentsOverlay('<?php echo $userpostD['userpost_id']; ?>')">View All Comments</a>    <!-- View comments link with JavaScript onClick event -->
                    </div>


<!-------------------------------this Form Overlay for comments ---------------------------------->
        

                    
                        <div id="view-Comments-Overlay-Id-<?php echo $userpostD['userpost_id']; ?>" class="view-Comments-Overlay" style="display: none;">
                            <div class="view-Comments-Overlay-Form">
                           
         <?php foreach ($usersVariabletextImage as $userDtetxImage): ?>
                    <?php if ($userDtetxImage['userpost_id'] == $userpostD['userpost_id']): ?>
                    <?php if ($userDtetxImage['type_id'] == 1): ?>
                        <div class="headerComentinsideOverlay">  <h4 class="post-caption"><?php echo $userDtetxImage['content']; ?></p>  </h4>
                    
                        </div> 
                      
                    <?php elseif ($userDtetxImage['type_id'] == 2): ?>
                        <div class="headerComentinsideOverlay">  <h4 class="post-caption"><?php echo $userDtetxImage['caption']; ?></h4></div> 
                       <?php $userDtetxImage['image'];?>   <!-- get name of picure from database -->
                       <hr class="hrComments">
                        <?php
                        // Replace 'YOUR_CLOUDINARY_CLOUD_NAME' with your actual Cloudinary cloud name
                        $cloudinaryCloudName = 'dbete4djx';
                        $imageName = $userDtetxImage['image']; // Assuming 'image' is the field name in your database
                        $imageUrl = "https://res.cloudinary.com/{$cloudinaryCloudName}/image/upload/{$imageName}.jpg";
                        ?>
                        <img src="<?php echo $imageUrl; ?>" alt="Post Image" class="post-imageComment">
                    <?php endif; ?>
                <?php endif; ?>
        <?php endforeach; ?>


                            <div id="exit-comment" class="exit-comment" onclick="exitCommentsOverlay()">
                            <i class="fa-solid fa-xmark x-imgComments" style="color:#0099ff"></i>  
                            </div>
                            <hr class="hrComments">
                            <h3 style="text-align: center; margin-top: 2px;">All Comments</h3>
                            <div class="All-Comments-Inside-Overlay" >
                                <?php foreach ($usersVariableComment as $userDComment): ?>
                                    <?php if ($userpostD['userpost_id'] == $userDComment['post_id']): ?>
                                        <div class="Comments-inside-O">
                                        <?php
                                        // Replace 'YOUR_CLOUDINARY_CLOUD_NAME' with your actual Cloudinary cloud name
                                        $cloudinaryCloudNameProfilecomment = 'dbete4djx';
                                        $imageNameProfilecomment = $userDComment['profile_photo']; // Assuming 'image' is the field name in your database
                                        $imageUrlProfilecomment = "https://res.cloudinary.com/{$cloudinaryCloudNameProfilecomment}/image/upload/{$imageNameProfilecomment}.jpg";
                                        ?>
                                             <img class="profile_photo" src="<?php echo $imageUrlProfilecomment; ?>">
                                             <div class="prcomment"><?php echo $userDComment['First_name'] . ' ' . $userDComment['last_name'];  ?> </div>
                                        </div>
                                        <div class="usersComments"><?php echo $userDComment['content']; ?></div>
                                        <hr style="width:95%">
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

 <!----------------------------------------this  for comment PHP Form----------------------------------------------->
 <?php
                           
                            
                                if (isset($_POST['submitWrite_comment'])) {
                                    $postIdWrite_comment = $_POST['userpost_id'];
                                    $userIdWrite_comment = $userId; // get from session
                                    $commentContent = $_POST['comment_' . $postIdWrite_comment]; 
                                    
          
    
                                      // echo ' post id ' . $postIdWrite_comment . " user id " .  $userIdWrite_comment . ' comment ' . $commentContent;

                                    if (!empty($commentContent)) {
                                        $sqlCommentInsert = "INSERT INTO comment (post_id, user_id, content) VALUES (?, ?, ?)";

                                        $stmtComment = $connection->prepare($sqlCommentInsert);
                                        $stmtComment->bind_param("iis", $postIdWrite_comment, $userIdWrite_comment, $commentContent);
                                        $stmtComment->execute();

                                        if ($stmtComment->affected_rows > 0) {
                                          
                                            echo '<script>window.location.href = "userpage.php";</script>';
                                            exit(); 
                                        } else {
                                            echo 'Error in your query failed: ' . $stmtComment->error;
                                        }
                                    } 
                                }
                                ?>

 <!----------------------------------------this  for comment Form----------------------------------------------->
                            <hr class="divider">
                            <form action="userpage.php" method="POST" >
                                        <div class="comment">
                                                <div class="comment_profile">
                            <?php foreach ($usersVariableprofileUser as $userDprofile): ?>
                                            <?php
                                                // Cloudinary cloud name
                                                    $cloudinaryCloudNameuserDprofile = 'dbete4djx';
                                                    $imageNameuserDprofile = $userDprofile['profile_photo'];
                                                    $imageUrluserDprofile = "https://res.cloudinary.com/{$cloudinaryCloudNameuserDprofile}/image/upload/{$imageNameuserDprofile}.jpg";
                                                    ?>
                                                    <div class="comment_profile">
                                                    <img  class="profile_photo" src="<?php echo $imageUrluserDprofile; ?>">
                                                </div>
                            <?php endforeach; ?>
                                        </div>
                                        <input type="text" class="write_comment" placeholder="Write a comment" name="comment_<?php echo $userpostD['userpost_id']; ?>">
                                        <!-- Add a hidden input field for the post ID  to get the userpost for each comment-->
                                        <input type="hidden" name="userpost_id" value="<?php echo $userpostD['userpost_id']; ?>">
                                        <button type="submit" name="submitWrite_comment" class="submitWrite_comment">Comment</button>
                                      
                                        </div>
                                    </div>               
                        </form>

 
 <?php endforeach;?>
 </div>
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
    const photo = document.getElementById("photo");

    photo.addEventListener('click', function() {
        // Redirect to the user profile page using the pub_id
        const friendId = <?php echo json_encode($friendId); ?>;

        // Check if imgPubId is not null or undefined before redirecting
        if (friendId !== null && friendId !== undefined) {
            window.location.href = 'user-photo-page.php?friend_id=' + friendId;
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
        if (friendId !== null && friendId !== undefined) {
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
<script>      
    function showCommentsOverlay(userpostId) {
        var overlayId = 'view-Comments-Overlay-Id-' + userpostId;
        var overlay = document.getElementById(overlayId);
        // Show the overlay
        overlay.style.display = 'block';
        //exit overlay
        var exitComment = overlay.querySelector('.exit-comment');
        exitComment.addEventListener('click', function() {
         overlay.style.display = 'none';
         
     });
    }
</script>

   
     
<script src="./indexAll.js" ></script>
</body>
</html>