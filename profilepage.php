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
    <title>Account page</title>
    <link rel="stylesheet" href="profilepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>    
    <!--Section: Contact v.2-->
    <section class="section">
        <!-- Header Section -->
        <header class="header">
            <div class="header__container">
                

                <a class="header__logo" href="./userpage.php"><img src="images/global logo.png" alt="Global Impact"></a>
    
    
                <div class="header__profile" >
                    <img  class="header_profile" src="<?php echo $imageUrluserprofileHeader; ?>">
                    
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

    <!-- -=--------------------------this SQL for posts display----------------------------- -->

                  
    <?php
                // <!-- sql for NAME AND Time post  -->
                
                $sqlUserPost = "SELECT userposts.*, profile.*, user.First_name, user.last_name, TIME(userposts.created_at) AS formatted_created_time
                FROM userposts
                INNER JOIN profile ON userposts.user_id = profile.user_id
                INNER JOIN user ON userposts.user_id = user.user_id
                WHERE userposts.user_id = $userid
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
                LEFT JOIN textpost ON userposts.userpost_id = textpost.userpost_id
                WHERE userposts.user_id = $userid ";

                $resultVariabletextImage = mysqli_query($connection, $sqltextImage);
                $usersVariabletextImage = mysqli_fetch_all($resultVariabletextImage, MYSQLI_ASSOC);
                // print_r($usersVariabletextImage);

                 // <!-- sql for comment post  -->   
              
                $sqlComment = "SELECT user.*, comment.*, profile.*
                FROM comment
                INNER JOIN user ON comment.user_id = user.user_id
                INNER JOIN profile ON comment.user_id = profile.user_id
                WHERE user.user_id = $userid ";
                
                            
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
                        // $sqlstories = "SELECT stories.*, user.First_name, profile.profile_photo
                         //FROM stories
                         //INNER JOIN user ON user.user_id = stories.user_id
                         //INNER JOIN profile ON profile.user_id = user.user_id
                         //ORDER BY stories.created_at DESC";

                         //$resultVariablestories = mysqli_query($connection, $sqlstories);
                         //$usersVariablestories = mysqli_fetch_all($resultVariablestories, MYSQLI_ASSOC);
                        //   print_r($usersVariablestories);   

                    
                       
            ?>
    

    <?php
    // select all the user information from database and display them in the html form

    $query1 = "SELECT First_name, last_name,user_name FROM user WHERE user_id= '$userid' ";
    $result1 = $connection->query($query1);

    $query2 = "SELECT profile_photo,cover_photo,bio,location FROM profile WHERE user_id= '$userid' ";
    $result2 = $connection->query($query2);
    $row2 = $result2->fetch_assoc();
    $profilepubid = $row2['profile_photo'];
    $coverpubid = $row2['cover_photo'];
    $cloudinaryname = 'dbete4djx';
    $profile = "https://res.cloudinary.com/{$cloudinaryname}/image/upload/{$profilepubid}";
    $cover = "https://res.cloudinary.com/{$cloudinaryname}/image/upload/{$coverpubid}";

    // Query to get the count of rows
    $query3 = "SELECT COUNT(*) AS nb_posts FROM userposts WHERE user_id = '$userid'";
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
    $query4 = "SELECT followers,following FROM user WHERE user_id = '$userid'";
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

    if ($result1) {
        // Fetch the rows from the result sets
        $row1 = $result1->fetch_assoc();
    }
    ?>

      <!--profile page creation-->
      <form action="profilepagecode.php" method="POST" enctype="multipart/form-data" id="regForm">
      <div class="image-container">
        <img src="<?php echo $cover; ?>" alt="profile-img" class="profile-img" id="profile-image">
  
     </div>
     <img src="<?php echo $profile; ?>" alt="circle-profile" class="circle-img" id="circle-img">
     
      <div class="camera-cont"><i class="fa-solid fa-camera camera-icon" id="small-camera" onclick="uploadFile('camera1')"></i></div>
      <div class="camera-cont2"><i class="fa-solid fa-camera camera-icon2"  id="big-camera" onclick="uploadFile('camera2')"></i></div>

      <!--part2-->
     <div class="container">
        <div class="text-content">
            <div class="row-1">
                <div class="name-job">
                  <span><?php echo $row1['First_name'] . ' ' . $row1['last_name']; ?></span>
                  <small id="bio-text"><?php echo $row2['bio']; ?></small>
                </div>
                <button type="button" class="btn" id="openbtn">Edit Profile</button>
              </div>
          <div class="row-2">
            <div class="column">
              <i class="fa-solid fa-location-dot icon"></i>
              <span class="location"><?php echo $row2['location']; ?></span>
            </div>
            <div class="column">
              <i class="fa-regular fa-newspaper icon"></i>
              <span class="numbers" id="nb-of-posts"><?php echo $rowCount; ?></span>
              <span>Post</span>
          </div>
          <div class="column">
              <i class="fa-solid fa-user-group icon"></i>
              <span class="numbers"><?php echo $followers; ?></span>
              <span>Followers</span>
          </div>
          <div class="column">
              <i class="fa-solid fa-user-group icon"></i>
              <span class="numbers"><?php echo $following; ?></span>
              <span>Following</span>
          </div>
          </div>
        </div>
      </div>
      </form>


     <div class="navbar-profile">
        <a href="profilepage.php">
            <div class="overview">OVERVIEW</div>
        </a>
        <a href="my-photo-page.php">
            <div class="overview">PHOTOS</div>
        </a>
        <a href="upvoted.php">
        <div class="nav-prof-name">UPVOTED</div>
        </a>
        <a href="downvoted.php">
        <div class="nav-prof-name">DOWNVOTED</div>
        </a>
      </div>
      <!-----------display posts------------------------------------------------------------------------->
      <div class="nav-post-container">
      <section class="POSTS" id="POSTS">  

            <?php
   
            // echo "User ID: " . $userId . "<br>";
            // echo "Username: " . $username . "<br>";
            // <!-- sql for NAME AND Time post  -->
            
            $sqlUserPost = "SELECT userposts.*, profile.*, user.First_name ,user.last_name,TIME(userposts.created_at) AS formatted_created_time
            FROM userposts
            INNER JOIN profile ON userposts.user_id = profile.user_id
            INNER JOIN user ON userposts.user_id = user.user_id
            WHERE userposts.user_id= $userid
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
                    //   print_r($usersVariableprofileUser); ?>




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
                          <img src="<?php echo $imageUrlProfile; ?>" alt="Account Image" class="AccountImage" >
                            <div class="user-ProfilePost">
                            <p class="account-name"><?php echo $userpostD['First_name']." ".$userpostD['last_name'] ?></p>
                                <div class="account-Date">
                                <small><?php echo  $userpostD['formatted_created_time']  ?></small>
                            <small> <i class="fa-solid fa-earth-americas"   style="padding-left: 3px;"></i></small>  
                                </div>
                            </div>
                            <div class="post_menu">
                        <i class="fa-solid fa-ellipsis-vertical" style="color:#0099ff;" onclick="showMenu(this)"></i>
                        <div class="actions-menu">
                            <ul>
                                <li onclick="showeditpostoverlay('<?php echo $userpostD['userpost_id']; ?>','<?php echo $userpostD['type_id']; ?>')">Edit</li>
                                <li onclick="deleteAction('<?php echo $userpostD['userpost_id']; ?>')">Delete</li>
                            </ul>
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
                            $userIdWriteupvote = $userid; // get from session
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
                                    echo '<script>window.location.href = "profilepage.php";</script>';
                                    exit();
                                } catch (mysqli_sql_exception $e) {
                                    // Handle the duplicate entry error silently
                                    // Log the error for debugging purposes
                                    error_log('Error in your query failed: ' . $e->getMessage());
                        
                                    // Redirect to index.php without displaying the error
                                    echo '<script>window.location.href = "profilepage";</script>';
                                    exit();
                                }
                            }
                        }
                    ?>
                   
                    <form action="profilepage.php" method="POST" >
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
     <!--  edit image-post overlay------------------------------------------------------------------------->

        <div class="edit-post-overlay" id="edit-imagepost-overlay-<?php echo $userpostD['userpost_id']; ?>" style="display:none">
        <!-- Content of the overlay -->
        <div class="edit-post-card">
            <div class="edit-post-overlay-header">
              <div class="edit-post-text">Edit Post</div>
              <img id="x-edit-post-<?php echo $userpostD['userpost_id']; ?>"
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
              class="x-img"
              onclick="closeimage('<?php echo $userpostD['userpost_id']; ?>')"
              />
            </div>
            <div><hr class="hr"></div>
            <div class="image-name">
                <img  class="profile-photo-edit-post" src="https://res.cloudinary.com/dbete4djx/image/upload/<?php echo $userpostD['profile_photo']; ?>">
                <a class="user-name" id="nameimage<?php echo $userpostD['userpost_id']; ?>"><?php echo $userpostD['First_name']; ?> <?php echo $userpostD['last_name']; ?></a>
            </div>
            <div class="text-hashtag">
                <input type="text" class="change-caption" placeholder="Say Something About This Post..." id="imagecaption<?php echo $userpostD['userpost_id']; ?>">
                <label for="image" style="margin-top: 3%;margin-left: 3.5%;">Update your post's image:</label>
                <input type="file" name="image" id="image<?php echo $userpostD['userpost_id']; ?>"  style="margin-left: 3.5%;" onchange="previewImage()">
            </div>
            <img  class="edit-post-photo" src="images/white-background.png" id="preview-img<?php echo $userpostD['userpost_id']; ?>">
            <button class="custom-btn-post save-edit-post" id="closeButtonimage<?php echo $userpostD['userpost_id']; ?>" onclick="updateActionimage('<?php echo $userpostD['userpost_id']; ?>')">Save</button>
            
      </div>
    </div>

     <!--  edit text-post overlay------------------------------------------------------------------------->

     <div class="edit-post-overlay" id="edit-textpost-overlay-<?php echo $userpostD['userpost_id']; ?>" style="display:none">
        <!-- Content of the overlay -->
        <div class="edit-post-card">
            <div class="edit-post-overlay-header">
              <div class="edit-post-text">Edit Post</div>
              <img id="x-edit-post-<?php echo $userpostD['userpost_id']; ?>"
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
              class="x-img"
              onclick="closetext('<?php echo $userpostD['userpost_id']; ?>')"
              />
            </div>
            <div><hr class="hr"></div>
            <div class="image-name">
                <img  class="profile-photo-edit-post" src="https://res.cloudinary.com/dbete4djx/image/upload/<?php echo $userpostD['profile_photo']; ?>" id="profiletext<?php echo $userpostD['userpost_id']; ?>">
                <a class="user-name" id="nametext<?php echo $userpostD['userpost_id']; ?>"><?php echo $userpostD['First_name']; ?> <?php echo $userpostD['last_name']; ?></a>
            </div>
            <div class="text-hashtag">
                <input type="text" class="change-caption" placeholder="Say Something About This Post..." id="textcontent<?php echo $userpostD['userpost_id']; ?>">
            </div>
            <button class="custom-btn-post save-edit-post" id="closeButtontext<?php echo $userpostD['userpost_id']; ?>" onclick="updateActiontext('<?php echo $userpostD['userpost_id']; ?>')">Save</button>
            
      </div>
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

                    <?php
                           
                            
                           if (isset($_POST['submitWrite_comment'])) {
                               $postIdWrite_comment = $_POST['userpost_id'];
                               $userIdWrite_comment = $userid; // get from session
                               $commentContent = $_POST['comment_' . $postIdWrite_comment]; 
                               
     

                                 // echo ' post id ' . $postIdWrite_comment . " user id " .  $userIdWrite_comment . ' comment ' . $commentContent;

                               if (!empty($commentContent)) {
                                   $sqlCommentInsert = "INSERT INTO comment (post_id, user_id, content) VALUES (?, ?, ?)";

                                   $stmtComment = $connection->prepare($sqlCommentInsert);
                                   $stmtComment->bind_param("iis", $postIdWrite_comment, $userIdWrite_comment, $commentContent);
                                   $stmtComment->execute();

                                   if ($stmtComment->affected_rows > 0) {
                                     
                                       echo '<script>window.location.href = "profilepage.php";</script>';
                                       exit(); 
                                   } else {
                                       echo 'Error in your query failed: ' . $stmtComment->error;
                                   }
                               } 
                           }
                           ?>

<!----------------------------------------this  for comment Form----------------------------------------------->
                       <hr class="divider">
                       <form action="profilepage.php" method="POST" >
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
    </div>

      <!------------------------------ this for community ---------------------------->   
      <div class="right_navbar">
                <?php
                // sql for recommended
                $sqlrightcommunity = "SELECT community.*
                            FROM community
                            WHERE user_id = '$userid'";            
                $resultVariablerightcommunity = mysqli_query($connection, $sqlrightcommunity);
                $usersVariablerightcommunity = mysqli_fetch_all($resultVariablerightcommunity, MYSQLI_ASSOC);     
                // print_r($usersVariablerightcommunity);
                ?>

                <div class="community_bar">
                <a href="#overlayPage"> 
                <div class="title">
                    <i class="fa-solid fa-people-roof" style="color:#0099ff;" id="ComunityPath"></i>
                    <p class="title-word"> Community</p>
                </div>
                </a>
                <hr class="right-divider">

                <?php
                $countco = 0;
                foreach ($usersVariablerightcommunity as $usercommunity):
                $usercommunityId = $usercommunity['com_id']; // Assuming 'com_id' is the identifier for communities
                if ($countco < 4): 
                ?>
                <div class="element1">
                    <div class="comment_profile">
                                    <?php
                                        // Cloudinary cloud name
                                        $cloudinaryCloudNamecommunity= 'dbete4djx';
                                        $imageNameuserrecommunity  = $usercommunity['com_profile'];
                                        $imageUrlrecommunity= "https://res.cloudinary.com/{$cloudinaryCloudNamecommunity}/image/upload/{$imageNameuserrecommunity}.jpg";
                                        ?>
                        <img class="profile_photo" src="<?php echo   $imageUrlrecommunity ?>">
                    </div>
                    <p class="name"><?php echo $usercommunity['name'] ?></p>
                    <button  class="follow" onclick='showeditcommunityOverlay("<?php echo $usercommunityId; ?>")'>Edit</button>
                    <button  class="follow" onclick='deleteCommunity("<?php echo $usercommunityId; ?>")' style="background:red">Delete</button>
                </div>
                <?php
                endif;
                $countco++; // Increment the counter
                endforeach;
                ?>


<!-- 
                <hr class="right-divider">
                <div class="titleCommunity"><i class="fa-solid fa-people-roof" style="color:#0099ff;" font-size: 20px; ></i>
                <p class="add-community" style="font-size: 12px;"> ADD Community</p>
                <i class="fa-solid fa-circle-plus iconCommunity" id="open_overlay" ></i></div> -->



                </div>

                <!--community edit overlay----------------------------------------------------------------->

        <div class="overlay" id="overlayeditcommunityPage<?php echo $usercommunityId; ?>" style="display:none">
        <!-- Content of the overlay -->
        <div class="div" id="divcom">
            <div class="div-2">
              <div class="edit-profile-text">Edit Community</div>
              <img id="closecommunityOverlay<?php echo $usercommunityId; ?>"
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
              class="x-img"
              onclick="closecommunityoverlay('<?php echo $usercommunityId; ?>')"
              />
            </div>
            <div><hr class="hr"></div>
            <div class="about-info-form" id="about-infocom">
                <div class="about-info" id="about-infocom">About Community</div>
                <div class="input-info-text" id="about-infocom">Community Name</div>
                <input type="text" class="input" id="communityName<?php echo $usercommunityId; ?>"  name="firstname">
                <div class="input-info-text" id="about-infocom">Community Topic</div>
                <input  type="text" class="input" id="communityTopic<?php echo $usercommunityId; ?>"  name="lastname">
                <div class="input-info-text" id="about-infocom">Community Description</div>
                <input  type="text" class="input" id="communityDescription<?php echo $usercommunityId; ?>"  name="username">
                <div class="input-info-text" id="about-infocom">Community Photo</div>
                <input type="file" id="communityPhoto<?php echo $usercommunityId; ?>" name="communityPhoto" accept="image/*">
               
                <div class="custom-btn save-edit-aboutinfo" id="saveButtonAbout<?php echo $usercommunityId; ?>" onclick="editCommunity('<?php echo $usercommunityId; ?>')">Update</div>
            </div>
      </div>
            </div>

    

     <div class="overlay" id="overlay" style="display:none">
        <!-- Content of the overlay -->
        <div class="div" id="div">
            <div class="div-2">
              <div class="edit-profile-text">Edit Profile</div>
              <img id="x-button"
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
              class="x-img"
              />
            </div>
            <div><hr class="hr"></div>
            <div class="about-info-form" id="about-info">
                <div class="about-info" id="about-info">About Info</div>
                <div class="input-info-text" id="about-info">First Name</div>
                <input type="text" class="input" id="firstname" placeholder="your first name" name="firstname" value= <?php echo $row1['First_name']; ?>>
                <div class="input-info-text" id="about-info">Last Name</div>
                <input  type="text" class="input" id="lastname" placeholder="your last name" name="lastname" value= <?php echo $row1['last_name']; ?>>
                <div class="input-info-text" id="about-info">User Name</div>
                <input  type="text" class="input" id="username" placeholder="your user name" name="username" value= <?php echo $row1['user_name']; ?>>
                <div class="input-info-text" id="about-info">Location</div>
                <div class="combobox-container">
                    <select id="locationn" name="locationn">
                        <option value="Lebanon">Lebanon</option>
                        <option value="Palastine">Palastine</option>
                        <option value="Syria">Syria</option>
                    </select>
                </div>


                <div class="input-info-text" id="about-info">Date Of Birth</div>

                        <!-- calender  -->
                <div class="date-of-birth">
                <input type="text" id="datepicker">
                </div>


                <div class="checkbox-form">
                    <input type="checkbox" name="checkbox">
                    <label class="label">Make My Date Of Birth Public</label>
                </div>
                <div class="custom-btn save-edit-aboutinfo" id="saveButtonAbout" onclick="saveabout3()">Save</div>
                
    
            </div>
            <div class="bio-text" id="biolable">Bio</div>
            <div class="image-text" id="image-text">Image</div>
      </div>

      <!--<div class="bio-overlay" id="bio-overlay">-->
        <!-- Content of the bio overlay -->
        <div class="bio-div" id="bio-div">
            <div class="bio-div-2">
              <div class="edit-profile-text-bio">Edit Profile</div>
              <img id="x-bio-button"
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
              class="x-img-bio"
              />
            </div>
            <div><hr class="hr-bio"></div>
            <div class="about-info-bio" id="about-info-bio">About Info</div>
            <div class="bio-form-bio">
                <div class="bio-text-bio">Bio</div>
                <textarea class="textarea-bio" id="textarea-bio" rows="7" cols="70" placeholder="your bio"></textarea>
                <div class="custom-btn-bio edit-bio-save-bio" id="closeButton-bio" onclick="saveBio()">Save</div>
            </div>
            <div class="image-text-bio" id="image-text-bio">Image</div>
      </div>

      <!--<div class="img-overlay" id="img-overlay">-->
        <!-- Content of the overlay --------  image edit-->
        <div class="img-div" id="img-div">
            <div class="img-div-2">
              <div class="img-edit-profile-text">Edit Profile</div>
              <img id="x-img-button"
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
              class="img-x-img"
              />
            </div>
            <div><hr class="img-hr"></div>
            <div class="img-about-info" id="img-about-info">About Info</div>
            <div class="img-bio-form" id="img-bio-form">Bio</div>
            <div class="img-image-form">
                <div class="img-image-text">Image</div>
                <div class="img-img-container">
                    <img src="images/white-background.png" alt="Preview" class="img-upload-img" id="img-preview">
                </div>
                <i class="fa-solid fa-upload img-upload-icon" id="big-icon" onclick="uploadFile('userFileInput')"></i>
                <div class="img-profile-container">
                    <img src="images/white-background.png" alt="Preview2" class="img-upload-img2" id="img-preview-2">
                </div>
                <i class="fa-solid fa-upload img-user-upload-icon" id="small-icon" onclick="uploadFile('FileInput')"></i>
                <div class="img-custom-btn img-edit-img-save" id="img-closeButton">Save</div>
    
                
    
            </div>

      </div>
      </div>
      <!-- for choose file image-->
      <input type="file" id="userFileInput" style="display: none" onchange="handleFileChange('big-icon',this,'img-preview')">
      <input type="file" id="FileInput" style="display: none" onchange="handleFileChange('small-icon',this,'img-preview-2')">
      <input type="file" id="camera1" style="display: none" onchange="handleFileChange('small-camera',this,'circle-img')">
      <input type="file" id="camera2" style="display: none" onchange="handleFileChange('big-camera',this,'profile-image')">
    </form>
    </body>

    <!-----------------edit   profile overlay-->
    <script>
         document.getElementById('openbtn').addEventListener('click', function() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('div').style.display = 'block';
            document.getElementById('img-div').style.display = 'none'; 
            document.getElementById('bio-div').style.display = 'none';
            document.querySelector('.main-content').classList.add('blurred');
     });

     document.getElementById('x-button').addEventListener('click', function() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('div').style.display = 'none';
        document.getElementById('img-div').style.display = 'none';
        document.getElementById('bio-div').style.display = 'none';
        document.querySelector('.main-content').classList.remove('blurred');
     });
     document.getElementById('biolable').addEventListener('click', function() {
       document.getElementById('div').style.display ="none";
       document.getElementById('img-div').style.display ="none";
       document.getElementById('bio-div').style.display ="block";
       
     });
     document.getElementById('x-bio-button').addEventListener('click', function() {
      /* document.getElementById('bio-div').style.display = 'none';
       document.getElementById('overlay').style.display = 'none';
       document.querySelector('.main-content').classList.remove('blurred');*/
       document.getElementById('overlay').style.display = 'none';
       document.querySelector('.main-content').classList.remove('blurred');
     });
     document.getElementById('image-text').addEventListener('click', function() {
       document.getElementById('bio-div').style.display ="none";
       document.getElementById('img-div').style.display ="block";
       document.getElementById('div').style.display ="none";
       
     });
     document.getElementById('x-img-button').addEventListener('click', function() {
       /*document.getElementById('img-div').style.display = 'none';
       document.getElementById('overlay').style.display = 'none';
       document.querySelector('.main-content').classList.remove('blurred');*/
       document.getElementById('overlay').style.display = 'none';
       document.querySelector('.main-content').classList.remove('blurred');
     });
     /*for bio page*/
     document.getElementById('about-info-bio').addEventListener('click', function() {
       document.getElementById('bio-div').style.display ="none";
       document.getElementById('div').style.display ="block";
     });
     document.getElementById('image-text-bio').addEventListener('click', function() {
       document.getElementById('bio-div').style.display ="none";
       document.getElementById('img-div').style.display ="block";
     });
     /*for image page*/
     document.getElementById('img-about-info').addEventListener('click', function() {
       document.getElementById('img-div').style.display ="none";
       document.getElementById('div').style.display ="block";
     });
     document.getElementById('img-bio-form').addEventListener('click', function() {
       document.getElementById('img-div').style.display ="none";
       document.getElementById('bio-div').style.display ="block";
     });
     </script>
      
      <script>

      // JavaScript
      document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('profile-image').addEventListener('click', function() {
    // Specify the URL of the page you want to navigate to
    var profilePageUrl = 'edit-post.html';

    // Navigate to the specified page
    window.location.href = profilePageUrl;
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
    function showMenu(icon) {
    // Hide all other menus
    hideAllMenus();

    // Find the parent menu and show its actions-menu
    const parentMenu = icon.closest('.post_menu');
    const actionsMenu = parentMenu.querySelector('.actions-menu');
    actionsMenu.style.display = 'block';

    // Close the menu when clicking outside of it
    document.addEventListener('click', function closeMenu(event) {
        if (!parentMenu.contains(event.target)) {
            actionsMenu.style.display = 'none';
            document.removeEventListener('click', closeMenu);
        }
    });
}

function hideAllMenus() {
    // Hide all actions-menus
    const allMenus = document.querySelectorAll('.actions-menu');
    allMenus.forEach(menu => {
        menu.style.display = 'none';
    });
}
</script>
      <script>
        // Function to reload the page after a specified delay
        function autoReloadPage() {
                location.reload();
        }
    </script>
      <script>
        function uploadFile(input) {
            // Trigger the click event of the corresponding file input
            document.getElementById(input).click();
        }
    
        let file; // Declare file in a higher scope

        function handleFileChange(cameraId, input, targetImageId) {
    // Handle the file change event here
    // You can access the selected file using input.files[0]
    console.log(`Selected file from ${cameraId}:`, input.files[0].name);

    if (input.files && input.files[0]) {
        const file = input.files[0]; // Assign input.files[0] to the file variable

        // Extract file extension
        const fileNameParts = file.name.split('.');
        const fileExtension = fileNameParts[fileNameParts.length - 1];

        console.log('File extension:', fileExtension);
        console.log('File extension:', file);

        // Check if a file is selected
        if (file) {
            const formData = new FormData();
            formData.append('file', file);
            formData.append('cameraId', cameraId); // Add cameraId to uniquely identify the file
            formData.append('fileExtension', fileExtension); // Add file extension to the form data

            // Make a Fetch request to the server (Cloudinary)
            fetch('profilepagecode.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text()) // Read the response body as text
.then(data => {
    const separatorIndex = data.indexOf('##JSON_SEPARATOR##');

    if (separatorIndex !== -1) {
        const successMessage = data.substring(0, separatorIndex).trim();
        const jsonDataString = data.substring(separatorIndex + '##JSON_SEPARATOR##'.length);

        console.log('Success:', successMessage);

        try {
            const jsonData = JSON.parse(jsonDataString);
            console.log('Parsed JSON Data:', jsonData);

            // Construct the Cloudinary URL using publicId and fileExtension from the server response
            const cloudinaryUrl = `https://res.cloudinary.com/dbete4djx/image/upload/${jsonData.public_id}.${jsonData.fileExtension}`;
            console.log('Cloudinary URL:', cloudinaryUrl);

            // Assuming you have an <img> element with the ID 'previewImage'
            let previewImage = document.getElementById(targetImageId);

            // Set the 'src' attribute of the image element to the Cloudinary URL
            previewImage.src = cloudinaryUrl;
            previewImage.style.display = 'block';
        } catch (error) {
            console.error('Error parsing JSON:', error);
        }
    } else {
        console.error('Unexpected response format:', data);
    }
})
        }
    }

}
</script>
<script>
    document.getElementById("img-closeButton").addEventListener('click', function() {
        autoReloadPage();
    });

   
     function closecommunityoverlay(comId) {
        var overlayId = 'overlayeditcommunityPage' + comId;
        var overlay = document.getElementById(overlayId);
       overlay.style.display = 'none';
       document.querySelector('.main-content').classList.remove('blurred');

     }

</script>
<script>
    function saveBio() {
        // Get the bio data from the textarea
        const bioText = document.getElementById('textarea-bio').value;
        console.log(bioText);

        const data = {
        bioText: bioText
    };
    console.log(data);

        // Make a Fetch request to send the data to the server
        fetch('updatebio.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
        // Update the UI or perform any other actions
        console.log('update bio success:', data);
        document.getElementById('textarea-bio').textContent = data.bioText;
        document.getElementById('bio-text').textContent = data.bioText;
    })
    .catch(error => {
        console.error('Follow error:', error);
    });
    }

    function deleteAction(postId) {
    console.log(postId);
        var confirmDelete = confirm("Are you sure you want to delete this post?");
        const data = {
        postId: postId
    };
    console.log(data);
        
        if (confirmDelete) {
           // Make a Fetch request to send the data to the server
        fetch('delete_post.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
            .then(data => {
                // Success: Reload the page or update the UI as needed
                location.reload(); // Example: Reload the page
            })
            .catch(error => {
                // Error: Handle the error, display a message, etc.
                console.error('Error deleting post:', error);
            });
        }
    }


    function deleteCommunity(comId) {
    console.log(comId);
        var confirmDelete = confirm("Are you sure you want to delete this community?");
        const data = {
        comId: comId
    };
    console.log(data);
        
        if (confirmDelete) {
           // Make a Fetch request to send the data to the server
        fetch('delete_com.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
            .then(data => {
                // Success: Reload the page or update the UI as needed
                location.reload(); // Example: Reload the page
            })
            .catch(error => {
                // Error: Handle the error, display a message, etc.
                console.error('Error deleting community:', error);
            });
        }
    }

    function updateActiontext(postId) {
    console.log(postId);
        var content = 'textcontent' + postId;
        var content = document.getElementById(content).value;
        const data = {
        postId: postId,
        content: content
    };
    console.log(data);
        
           // Make a Fetch request to send the data to the server
        fetch('update_post_text.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
            .then(data => {
                console.log(data);
                autoReloadPage();
            })
            .catch(error => {
                // Error: Handle the error, display a message, etc.
                console.error('Error deleting post:', error);
            });
        }


        function updateActionimage(postId) {
    console.log(postId);
        var caption = 'imagecaption' + postId;
        var caption = document.getElementById(caption).value;
        // Assuming you have an input element with the id 'image'
        var fileid = 'image' + postId;
        var inputFile = document.getElementById(fileid);

        // Get the selected file
        const selectedFile = inputFile.files[0];
        const fileName = selectedFile.name;
        console.log(selectedFile);

        const formData = new FormData();
            formData.append('file', selectedFile);
            formData.append('caption', caption); // Add cameraId to uniquely identify the file
            formData.append('postId', postId); // Add file extension to the form data

        const data = {
        postId: postId,
        caption: caption,
        file: fileName,
    };
    console.log(data);
        
           // Make a Fetch request to send the data to the server
        fetch('update_post_image.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
            .then(data => {
                console.log(data);
                autoReloadPage();
            })
            .catch(error => {
                // Error: Handle the error, display a message, etc.
                console.error('Error updating post:', error);
            });
        }


        function editCommunity(comId) {
    console.log(comId);

    var nameId = 'communityName' + comId;
    var descriptionId = 'communityDescription' + comId;
    var topicId = 'communityTopic' + comId;

    var name = document.getElementById(nameId).value;
    var description = document.getElementById(descriptionId).value;
    var topic = document.getElementById(topicId).value;

    // Assuming you have an input element with the id 'image'
    var fileid = 'communityPhoto' + comId;
    var inputFile = document.getElementById(fileid);

    // Check if a file is selected
    var selectedFile = inputFile.files.length > 0 ? inputFile.files[0] : null;

    // Create FormData and append data
    var formData = new FormData();
    formData.append('comId', comId);
    formData.append('name', name);
    formData.append('description', description);
    formData.append('topic', topic);

    if (selectedFile) {
        // If a file is selected, append it to FormData
        formData.append('file', selectedFile, selectedFile.name);
    }

    var data = {
        comId: comId,
        name: name,
        file: selectedFile ? selectedFile.name : null,
        description: description,
        topic: topic,
    };
    console.log(data);

    // Make a Fetch request to send the data to the server
    fetch('edit_community.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        autoReloadPage();
    })
    .catch(error => {
        // Error: Handle the error, display a message, etc.
        console.error('Error updating post:', error);
    });
}

</script>

<script>
const saveabout3 = async() => { // function addUser(){}

function monthNameToNumber(monthName) {
    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const monthNumber = monthNames.indexOf(monthName) + 1;

    return monthNumber > 0 ? monthNumber : null;
}
    // console.log(userName.value + " " + pass.value + " " + roles.value);
    const data = {
        firstname: firstname.value,
        lastname: lastname.value,
        username: username.value,
        locationn: locationn.value,
        birthYear: birthYear.value,
        birthMonth: birthMonth.value,
        //birthMonth : monthNameToNumber(birthMonth),
        birthDay: birthDay.value,
        
    };
    console.log(locationn);
    console.log(birthYear);
    console.log(birthMonth);
    console.log(birthDay);
    console.log(data);
    await fetch('update_info.php', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });

    //userData.reset();
    autoReloadPage();
}

function showeditpostoverlay(postId,typeId) {
    // Assuming you have a variable 'typeId' representing the type_id of the post
    console.log(postId);
    console.log(typeId);
    
    // Display the correct overlay based on typeId
    if (typeId == 2) {
        var overlayId = 'edit-imagepost-overlay-' + postId;
        var overlay = document.getElementById(overlayId);
        console.log(overlay);
        overlay.style.display = 'block';
        const data = {
        postId: postId
    };
    var textid = 'imagecaption' + postId;
    var textid = document.getElementById(textid);
    var img = 'preview-img' + postId;
    var img = document.getElementById(img);
    
        // Send a fetch request for type_id == 2
        fetch('show_overlay_image.php', {
            method: 'POST', // or 'PUT', 'DELETE', etc.
            headers: {
                'Content-Type': 'application/json',
                // Add any other headers as needed
            },
            body: JSON.stringify(data), // Include data in the request body if needed
        })
        .then(response => response.json())
        .then(data => {
    // Handle the response data
    console.log(data);

    // Assuming you have a variable 'textid' representing the text input element
    textid.value = data.caption;

    // Assuming you have a variable 'img' representing the image element
    const src = data.image;
    const cloudinaryUrl = `https://res.cloudinary.com/dbete4djx/image/upload/${src}`;
    img.setAttribute('src', cloudinaryUrl);
    })
        .catch(error => {
            console.error('Error:', error);
        });
    } else if (typeId == 1) {
        var overlayId = 'edit-textpost-overlay-' + postId;
        var overlay = document.getElementById(overlayId);
        overlay.style.display = 'block';
        const data = {
        postId: postId
    };
    var textid = 'textcontent' + postId;
    var textid = document.getElementById(textid);
        // Send a fetch request for type_id == 2
        fetch('show_overlay_text.php', {
            method: 'POST', // or 'PUT', 'DELETE', etc.
            headers: {
                'Content-Type': 'application/json',
                // Add any other headers as needed
            },
            body: JSON.stringify(data), // Include data in the request body if needed
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data
            console.log(data);
            textid.value= data.content;

        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    }

    /* show the edit community overlay -----------------------------------------------*/

    function showeditcommunityOverlay(comId) {
    // Assuming you have a variable 'typeId' representing the type_id of the post
    console.log(comId);
    
    // Display the correct overlay based on typeId
        var overlayId = 'overlayeditcommunityPage' + comId;
        var overlay = document.getElementById(overlayId);
        console.log(overlay);
        overlay.style.display = 'block';
        const data = {
        comId: comId
    };
        var name = 'communityName' + comId;
        var name = document.getElementById(name);
        var description = 'communityDescription' + comId;
        var description = document.getElementById(description);
        var topic = 'communityTopic' + comId;
        var topic = document.getElementById(topic);
        // Assuming you have an input element with the id 'image'
        //var fileid = 'communityPhoto' + comId;
        //var inputFile = document.getElementById(fileid);

        // Get the selected file
       // const selectedFile = inputFile.files[0];
        //const fileName = selectedFile.name;
        //console.log(selectedFile);
    
        // Send a fetch request for type_id == 2
        fetch('show_overlay_community.php', {
            method: 'POST', // or 'PUT', 'DELETE', etc.
            headers: {
                'Content-Type': 'application/json',
                // Add any other headers as needed
            },
            body: JSON.stringify(data), // Include data in the request body if needed
        })
        .then(response => response.json())
        .then(data => {
    // Handle the response data
    console.log(data);

    // Assuming you have a variable 'textid' representing the text input element
    name.value = data.name;
    description.value = data.description;
    topic.value = data.topic;

    // Assuming you have a variable 'img' representing the image element
    //const src = data.image;
    //const cloudinaryUrl = `https://res.cloudinary.com/dbete4djx/image/upload/${src}`;
    //img.setAttribute('src', cloudinaryUrl);
    })
        .catch(error => {
            console.error('Error:', error);
        });
    } 



    function closetext(postId) {
        console.log(postId);

        var overlayId = 'edit-textpost-overlay-' + postId;
        var overlay = document.getElementById(overlayId);
        console.log(overlay);
        overlay.style.display = 'none';

    document.querySelector('.main-content').classList.remove('blurred');
}
function closeimage(postId) {
        console.log(postId);

        var overlayId = 'edit-imagepost-overlay-' + postId;
        var overlay = document.getElementById(overlayId);
        console.log(overlay);
        overlay.style.display = 'none';
        
    document.querySelector('.main-content').classList.remove('blurred');
}

</script>
<script>

            let commentLinks = document.querySelectorAll('.CommentsLink');
            
            
            // Add the click event listener to each link
            commentLinks.forEach(function(link) {
             link.addEventListener('click', function() {
                 document.getElementById('view-Comments-Overlay-Id').style.display = 'block';
                 document.querySelector('.main-content').classList.add('blurred');
             });
            });
            // for exit comment form inside overlay
            document.getElementById('exit-comment').addEventListener('click', function() {
                 document.getElementById('view-Comments-Overlay-Id').style.display = 'none';
                 document.querySelector('.main-content').classList.remove('blurred');
              
             });
                        function imgSlider(someThing){
                            document.querySelector('.sports').src = someThing;
                        }
                        function changeColor(color){
                            const sec = document.querySelector('.main');
                            sec.style.background = color;
                        }
            
                    </script>
<script src="index.js"></script>
    <script src="indexAll.js"></script>

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
<script>
    // ---------------------this for Scroll-------------------------

// Function to set the scroll position in a cookie
function setScrollPosition() {
  sessionStorage.setItem('scroll_position', $(window).scrollTop());
}
// Function to get the scroll position from sessionStorage and scroll to it
function getAndScrollToPosition() {
  var scrollPosition = sessionStorage.getItem('scroll_position');
  if (scrollPosition !== null) {
      $(window).scrollTop(scrollPosition);
      sessionStorage.removeItem('scroll_position');
  }
}
// Save the scroll position when the page is unloaded (refreshed or closed)
$(window).on('beforeunload', function () {
  setScrollPosition();
});

// Scroll to the saved position when the page is loaded
$(document).ready(function () {
  getAndScrollToPosition();
});

</script>
<script> 
    function showMenu(icon) {
    // Hide all other menus
    hideAllMenus();

    // Find the parent menu and show its actions-menu
    const parentMenu = icon.closest('.post_menu');
    const actionsMenu = parentMenu.querySelector('.actions-menu');
    actionsMenu.style.display = 'block';

    // Close the menu when clicking outside of it
    document.addEventListener('click', function closeMenu(event) {
        if (!parentMenu.contains(event.target)) {
            actionsMenu.style.display = 'none';
            document.removeEventListener('click', closeMenu);
        }
    });
}

function hideAllMenus() {
    // Hide all actions-menus
    const allMenus = document.querySelectorAll('.actions-menu');
    allMenus.forEach(menu => {
        menu.style.display = 'none';
    });
}

function logout() {

window.location.href = 'LogIn-SignUp-forgget/logout.php';
}

</script>

<script>
 $(function() {
    $("#datepicker").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1900:2023", // Adjust the range as needed
      dateFormat: "yy-mm-dd", // Adjust the format as needed
    });
  });

</script>
<script>
// ---------------------this for Scroll-------------------------

// Function to set the scroll position in a cookie
function setScrollPosition() {
  sessionStorage.setItem('scroll_position', $(window).scrollTop());
}
// Function to get the scroll position from sessionStorage and scroll to it
function getAndScrollToPosition() {
  var scrollPosition = sessionStorage.getItem('scroll_position');
  if (scrollPosition !== null) {
      $(window).scrollTop(scrollPosition);
      sessionStorage.removeItem('scroll_position');
  }
}
// Save the scroll position when the page is unloaded (refreshed or closed)
$(window).on('beforeunload', function () {
  setScrollPosition();
});

// Scroll to the saved position when the page is loaded
$(document).ready(function () {
  getAndScrollToPosition();
});
</script>


</html>