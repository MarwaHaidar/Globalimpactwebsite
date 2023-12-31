<?php
include './connDatabase/Connection.php';

session_start();
$userData = $_SESSION['auth_user'];
$userId = $userData['userid'];
$username = $userData['username'];
$role = $userData['role'];


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

        <!--========== Font Awsome ==========-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!--========== For scrolling ==========-->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="index.css">

        <title>Index Page</title>
    </head>
    <style>
   
    </style>
    <body onload="refreshsearchpage();">
        <div class="main_content" id="main_content">
            <section class="section">
       
        <!--========== HEADERR ==========-->
        <header class="header">
            <div class="header__container">
                

                <a href="./userpage.php" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
    
                
                    <!-- -=----------------Search For name user has Post ------------------------ -->
                    <div class="header__search">
                        <input onkeyup="gosearch();" type="text" id="searchfield" placeholder="Search" class="header__input">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

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

                           
    
                <a href="profilepage.php" id="ProfilePath">
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
                        
                        <?php if ($role == 'admin'): ?>
                        <a href="./adminpage.php" class="nav__link">
                        <i class="fa-solid fa-user-tie iconsColor"></i>
                            <span class="nav__name">Admin Page</span>
                        </a>
                    <?php endif; ?>

                     <!-- this for responsive community -->
                    <?php
                    $someCondition = (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false);
                    ?>
                    <?php if ($someCondition): ?>
                        <a href="./communityall.php" class="nav__link">
                        <i class="fa-solid fa-person-shelter iconsColor"></i>
                            <span class="nav__name">Community</span>
                        </a>
                    <?php endif; ?>





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


                

                    <!-- <a href="./LogIn-SignUp-forgget/logout.php"> -->
                    <button class="nav_logout" name="logout_btn" onclick="logout()">LOGOUT</button>
            </nav>
        </div>


       

        <div class="post__container">

        
        <div  class="searchpageclass" id="searchpage"></div>




<!--------------------------------------PHP create social media posts-------------------------------------------->


                <?php
                // echo "User ID: " . $userId . "<br>";
                // echo "Username: " . $username . "<br>";
                // echo 'role is :'. $role;
                
                require 'vendor/autoload.php';
                use Cloudinary\Api\Upload\UploadApi;
                use Cloudinary\Configuration\Configuration;

                $CreatePostuser_id = $userId; //user_id get from session when creating login
                $CreatePostCategory = $_POST['dropdownPostCategory'] ?? ''; // get the category from the table category; has five categories
                $CreatePosttype_something = $_POST['type_something']?? '';
                $CreatePostInputImage = $_FILES['CreatePostInputImage']['tmp_name']?? '';




                $CreatePosterrosVariables = [    
                    'CreatePosttype_somethingError' => ''
                ];

                if (isset($_POST["post_post"])) {

                    if (empty($CreatePosttype_something)) {
                        $CreatePosterrosVariables['CreatePosttype_somethingError'] = 'insert the caption';
                    }

                    if(empty($CreatePostInputImage)){ // test is empty selction file (1 :text   2 :image)
                        $CreatePosttype_id=1;
                    }
                    else
                    {
                        $CreatePosttype_id=2;
                    }


                    if (!array_filter($CreatePosterrosVariables)) {
                        // Insert into userposts
                        $sql = "INSERT INTO userposts(user_id, type_id, category) VALUES (?, ?, ?)";
                        $stmt = $connection->prepare($sql);
                        $stmt->bind_param("iii", $CreatePostuser_id, $CreatePosttype_id, $CreatePostCategory);
                        $stmt->execute();

                        if ($stmt->affected_rows > 0) {
                            // Get the last inserted ID (userpost_id)
                            $lastUserpostId = $stmt->insert_id;

                            if (!empty($CreatePostInputImage)) {
                                // Cloudinary configuration
                                Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');

                                // Perform the Cloudinary upload
                                $result = (new UploadApi())->upload($CreatePostInputImage);

                                if (isset($result['public_id'])) {
                                    // File uploaded to Cloudinary. Public ID: $result['public_id']

                                    $sqlText = "INSERT INTO imagepost(userpost_id, caption, image) VALUES (?, ?, ?)";
                                    $stmtText = $connection->prepare($sqlText);
                                    $stmtText->bind_param("iss", $lastUserpostId, $CreatePosttype_something, $result['public_id']);
                                    $stmtText->execute();
                                } else {
                                    // Error uploading to Cloudinary
                                    echo 'Error uploading to Cloudinary: ' . json_encode($result);
                                }
                            } else {
                                // No image file provided
                                $sqlText = "INSERT INTO textpost(userpost_id, content) VALUES (?, ?)";
                                $stmtText = $connection->prepare($sqlText);
                                $stmtText->bind_param("is", $lastUserpostId, $CreatePosttype_something);
                                $stmtText->execute();
                            }

                            if ($stmtText->affected_rows > 0) {
                                // header('Location: userpage.php');
                                
                            } else {
                                echo 'Error in textpost query: ' . $stmtText->error;
                            }
                        } else {
                            echo 'Error in userposts query: ' . $stmt->error;
                        }
                    }
                }
                ?>


<!-- -=--------------------------this SQL for posts display----------------------------- -->

                  
                    <?php
                // <!-- sql for NAME AND Time post  -->
                
                $sqlUserPost = "SELECT userposts.*, profile.*, user.First_name ,user.last_name,TIME(userposts.created_at) AS formatted_created_time
                FROM userposts
                INNER JOIN profile ON userposts.user_id = profile.user_id
                INNER JOIN user ON userposts.user_id = user.user_id
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
                        $userprofileId=$userId; // get from session
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


 
<!---------------------------create Stories--------------------------------> 

<div class="main_contentStory">
  <div class="StoryGallery">
    <div class="navigation left">&lt;</div>
    <div class="scroll-container">

                       <!-------------------this  for self story file PHP Form-------------------->
         
              

                       <?php
                    $userIdstory = $userId; // get from session
                    $CreatestoryInputImage = $_FILES['CreatestoryInputImage']['tmp_name'] ?? '';

                    if (isset($_POST['submitStory'])) {
                        // Process the first form
                        if (!empty($CreatestoryInputImage)) {

                            // Cloudinary configuration
                            Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');

                            // Perform the Cloudinary upload
                            $result = (new UploadApi())->upload($CreatestoryInputImage);

                            if (isset($result['public_id'])) {
                                // File uploaded to Cloudinary. Public ID: $result['public_id']

                                // Insert data into the database
                                $sqlstory = "INSERT INTO stories(user_id, image) VALUES (?, ?)";
                                $stmtstory = $connection->prepare($sqlstory);

                                if ($stmtstory) {
                                    $stmtstory->bind_param("is", $userIdstory, $result['public_id']);
                                    $stmtstory->execute();

                                    // Check if the database operation was successful
                                    if ($stmtstory->affected_rows > 0) {
                                        echo '<script>window.location.href = "userpage.php";</script>';
                                    } else {
                                        echo "<script>alert('Error inserting data into the database.')</script>";
                                    }

                                    $stmtstory->close();
                                } else {
                                    echo "<script>alert('Error preparing database statement.')</script>";
                                }
                            } else {
                                // Error uploading to Cloudinary
                                echo "<script>alert('Error uploading to Cloudinary: " . json_encode($result) . "')</script>";
                            }
                        }
                    }
?>

<!-------------------------------------------------------------------------------------->
                <!--  buttun story -->
          
            <form action="userpage.php" method="POST" enctype="multipart/form-data" >
                <input type="file" name="CreatestoryInputImage" id="fileInput" style="display: none;" accept="image/*" onchange="displaySelectedImage()">
                <button type="submit" name="submitStory" class="submitstory">Post Story</button>
            </form>

      <div class="inner-container">

        <!-- get profile image of story self  -->
      
            <?php foreach ($usersVariableprofileUser as $userDStoryself): ?>
                            <?php
                            // Cloudinary cloud name
                                $cloudinaryCloudNameprofileStoryself = 'dbete4djx';
                                $imageNameuserStoryself = $userDStoryself['profile_photo'];
                                $imageUrluserStoryself = "https://res.cloudinary.com/{$cloudinaryCloudNameprofileStoryself}/image/upload/{$imageNameuserStoryself}.jpg";
                                ?>
                            <div class="Poststory Poststory1" id="PostStory" onclick="openFileInput()" style="background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url(<?php echo  $imageUrluserStoryself; ?>);">
                <?php endforeach; ?>


                


            <img src="./images/UploadImageStory.png" id="postImage">
             </div>

               

                  <!-- profile of story -->
                    <?php foreach ( $usersVariablestories as $userDStory): ?>
                        <?php
                                    $cloudinaryCloudNameprofileStory = 'dbete4djx';
                                    $imageNameuserStory = $userDStory['profile_photo'];
                                    $imageUrluserStory = "https://res.cloudinary.com/{$cloudinaryCloudNameprofileStory}/image/upload/{$imageNameuserStory}.jpg";
                        ?>



                  <!-- overlay of stories  -->
                    <div id="storyOverlay-users" class="overlay-stories" onclick="closeStoryOverlay()">
                        <div class="overlay-stories-content">
                            <span class="close-stories" onclick="closeStoryOverlay()">&times;</span>
                            <img src="" id="overlayImage">
                            <p id="overlayText"></p>
                        </div>
                    </div>



                    <!-- php overlay of stories  -->
                          <?php
                                $cloudinaryStory = 'dbete4djx';
                                $imageStory = $userDStory['image'];
                                $imageStoryUrl = "https://res.cloudinary.com/{$cloudinaryStory}/image/upload/{$imageStory}.jpg";
                           ?>


                    <div class="story" onclick="openStoryOverlay('<?php echo  $imageStoryUrl; ?>', '<?php echo $userDStory['First_name']; ?>')" style="background-image: linear-gradient(transparent,rgba(0,0,0,0.5)), url(<?php echo $imageUrluserStory; ?>);">
                    <img src="<?php echo $imageUrluserStory; ?>">
                    <p><?php echo $userDStory['First_name'] ?></p>
                     </div>
                    <!-- <?php echo $userDStory['image'] ?> -->

        
        <?php endforeach; ?>
  


        
      </div>
    </div>
    <div class="navigation right">&gt;</div>
  </div>
</div>
<!-- this for overlay stories  -->
<!-- <div class="overlayStories" id="overlayStories">
  <div class="overlay-content-Story">
    <span class="close-btn-Story" onclick="closeOverlayStory()">&times;</span>
    <img id="overlayimageStory" src="" alt="Overlay Image Story">
  </div>
</div> -->


<!-- -----------------------------fORM social media posts-------------------------------------------------------->

<form action="userpage.php" method="POST" enctype="multipart/form-data">
            <div class="create_post">
                <div class="create">
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
                    
               

                <input type="text" class="type_something" name="type_something"  id="type_something_input" placeholder="Type Something">
                </div>
                <div style="color:red ; margin-left:55px " ><?php echo $CreatePosterrosVariables['CreatePosttype_somethingError'] ?></div>
                <div class="post_features">
                    <div class="createpost_icons">
                      <i class="fa-solid fa-face-smile" style="color:#0099ff; cursor: pointer;" id="openEmojiOverlay"></i>
                        <i class="fa-solid fa-hashtag" style="color:#0099ff; cursor: pointer;" id="typehashting"></i>

                         <!-- <input type="file" name="CreatePostInputImage" class="CreatePostInputImage"> -->
                         <label for="CreatePostInputImage" class="CreatePostInputImageLabel">
                        <i class="fa-regular fa-image" style="color:#0099ff;cursor: pointer;"></i>
                        <input type="file" name="CreatePostInputImage" id="CreatePostInputImage" class="CreatePostInputImage" onchange="displayFileName(this)">
                        </label>
                        <div class="CreatePostInputImageDisplay" id="CreatePostInputImageDisplay">No image selected</div>


                    </div>   
                <select id="dropdownPostCategory" name="dropdownPostCategory" class="dropdownPostCategory">
                    <option value="1">Sports</option>
                    <option value="2">News</option>
                    <option value="3">Technologies</option>
                    <option value="4">Movies</option>
                    <option value="5">Art</option>
                </select> 
                        <button class="post_post" name="post_post">Post</button>
                    </div>
                   
                </div>
                </form>
                <div class="emoji-overlay" id="emojiOverlay">
                <i class="fa-solid fa-face-smile emoji-icon" data-emoji="😊"></i>
                <i class="fa-solid fa-face-sad-cry emoji-icon" data-emoji="😭"></i>
                <i class="fa-solid fa-face-grin-tears emoji-icon" data-emoji="😂"></i>
                <i class="fa-solid fa-face-angry emoji-icon" data-emoji="😡"></i>
                <i class="fa-solid fa-face-sad-tear emoji-icon" data-emoji="😢"></i><br>
                <i class="fa-solid fa-face-kiss-wink-heart emoji-icon" data-emoji="😘"></i>
                <i class="fa-solid fa-face-grin-tongue-wink emoji-icon" data-emoji="😜"></i>
                <i class="fa-solid fa-face-grin-stars emoji-icon" data-emoji="🤩"></i>
                <i class="fa-solid fa-face-flushed emoji-icon" data-emoji="😳"></i>
                <i class="fa-solid fa-face-dizzy emoji-icon" data-emoji="😵"></i>
                
                <!-- Add more emojis as needed -->
                </div>

<!-- -=----------------PHP For Posts ------------------------ -->

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
                          <img src="<?php echo $imageUrlProfile; ?>" alt="Account Image" class="AccountImage" friend-id="<?php echo $userpostD['user_id']; ?>">
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

<!-------------------------------this Form  for hashtag----------------------------------------------------->

<?php
    // sql for trend hashtag
    $sqlhashtag = "SELECT userpost_id, content AS post_content, NULL AS caption, NULL AS image
    FROM textpost
    WHERE LOCATE('#', content) > 0

    UNION

    SELECT i.userpost_id, NULL AS post_content, i.caption, i.image
    FROM imagepost i
    WHERE LOCATE('#', i.caption) > 0";

    $resultVariablehashtag = mysqli_query($connection, $sqlhashtag);

    if (!$resultVariablehashtag) {
        die("Error in SQL query: " . mysqli_error($connection));
    }

    $usersVariablehashtag = mysqli_fetch_all($resultVariablehashtag, MYSQLI_ASSOC);

    $hashtags = array();
    foreach ($usersVariablehashtag as $posthash) {
        if (!empty($posthash['post_content'])) {
            preg_match_all('/#(\w+)/', $posthash['post_content'], $matches);
            $hashtags = array_merge($hashtags, $matches[1]);
        }
        if (!empty($posthash['caption'])) {
            preg_match_all('/#(\w+)/', $posthash['caption'], $matches);
            $hashtags = array_merge($hashtags, $matches[1]);
        }
    }

    // Count the frequency of each hashtag word
    $wordFrequency = array_count_values($hashtags);
    // Sort the hashtag words by frequency in descending order
    arsort($wordFrequency);
    // Take only the top 4 hashtag words
    $topHashtags = array_slice($wordFrequency, 0, 4);
?>

<div class="right_navbar">
    <div class="Trending_bar">
        <div class="title"><i class="fa-solid fa-fire-flame-curved" style="color:#0099ff;"></i>
        <p class="title-word">Trending</p></div>
        <hr class="right-divider">

        <!-- Display only the top 4 hashtag words -->
        <?php
            foreach ($topHashtags as $word => $frequency) {
                echo '<div class="element1">';
                echo '<p class="name">' . htmlspecialchars($word) . '</p>';
                echo '</div>';
            }
        ?>
    </div>



    <!------------------------------ this for recomended bar ------------------------->

    <?php        
        // sql for recomended      
        $sqlrecomended = "SELECT user.*, profile.*
        FROM user
        INNER JOIN profile ON user.user_id = profile.user_id";            
         $resultVariablerecomended = mysqli_query($connection, $sqlrecomended);
         $usersVariablerecomended = mysqli_fetch_all($resultVariablerecomended, MYSQLI_ASSOC);     
        //  print_r($usersVariablerecomended);
    ?>
        <div class="recommended_bar">
            <div class="title"><i class="fa-solid fa-people-group" style="color:#0099ff;"></i>
                <p class="title-word"> Recommended</p></div>
                <hr class="right-divider">
            
         <!-- this for recomended Form  -->     
                <?php
                $count = 0;
                 foreach ($usersVariablerecomended as $userrecommended):
                    if ($count < 4): 
                ?>
                        <div class="element5">
                            <div class="comment_profile">
                                        <?php
                                            // Cloudinary cloud name
                                            $cloudinaryCloudNamerecommended = 'dbete4djx';
                                            $imageNameuserrecommended  = $userrecommended['profile_photo'];
                                            $imageUrlrecommended= "https://res.cloudinary.com/{$cloudinaryCloudNamerecommended}/image/upload/{$imageNameuserrecommended}.jpg";
                                            ?>
                                <img class="profile_photo" src="<?php echo $imageUrlrecommended ?>">
                            </div>
                            <p class="name"><?php echo $userrecommended['First_name']."  ".$userrecommended['last_name'] ?></p>
                        </div>
                <?php
                    endif;
                    $count++; // Increment the counter
                endforeach;
                ?>

                
     <!------------------------------ this for community ---------------------------->   
                
        </div>

                    <?php
            // sql for recommended
            $sqlrightcommunity = "SELECT community.*
                                FROM community";            
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
                <?php
                            //select from  the follow table
                            $queryselectFollow = "SELECT joins FROM joins  WHERE user_id='$userId' AND community_id='$usercommunityId' ORDER BY join_id DESC LIMIT 1";
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
                        <button class="follow" id="join_com<?php echo $usercommunityId; ?>"  <?php echo $join ? 'style="display:none;"' : ''; ?> onclick='join_community(<?php echo $usercommunityId; ?>,<?php echo $userId; ?>)' >Join</button>
                        <button class="follow" id="unjoin_com<?php echo $usercommunityId; ?>" <?php echo $join ? '' : 'style="display:none;"'; ?> onclick='unjoin_community(<?php echo $usercommunityId; ?>,<?php echo $userId; ?>)'>Unjoin</button>
                      
                    </div>
                <?php
                    endif;
                    $countco++; // Increment the counter
                endforeach;
                ?>



                <hr class="right-divider">
                <div class="titleCommunity"><i class="fa-solid fa-people-roof" style="color:#0099ff;" font-size: 20px; ></i>
                    <p class="add-community" style="font-size: 12px;"> ADD Community</p>
                    <i class="fa-solid fa-circle-plus iconCommunity" id="open_overlay" ></i></div>



        </div>



    </div>
    </section>
    </div>

    <div id="overlayPage" class="overlay-page">
        <div class="overlay-content">
            <div id="overlay_header">
            <h2>Create Community</h2>
          <!--  <button id="closeOverlay">Exit</button>-->
            <i class="fa-regular fa-circle-xmark"  id="closeOverlay" style="color: #0099ff;"></i>
        </div>
        <div id="form">
            <form id="createCommunityForm" action="create_com.php" method="POST" enctype="multipart/form-data">
                <hr style="width: 90%; margin-left: 4%;">
          <div class="comunnityForm">
                    <label for="communityName">Community Name</label><br>
                    <input type="text" id="communityName" name="communityName" placeholder="Community Name" required>
      
          
                    <label for="description">Topic</label><br>
                    <input type="text" id="communityTopic" name="communitycategory"  placeholder= "This will help relevant users find your community"required>
          
         
                    <label for="description">Description</label><br>
                    <input type="text" id="communityName" name="communitydesc"  placeholder="This is how new members come to understand your community" required>
          
           
                    <label for="communityPhoto">Community Photo</label><br>
                    <input type="file" id="communityPhoto" name="communityPhoto" accept="image/*">
                    
       
                
                <button type="submit" class="custom-btn save-edit-aboutinfo" name="create_com_btn">Create Community</button>
        

                
            </div>    
            </form>
            </div>
            
        </div>
    </div>
<!-- this for emojies -->
    </body>
      <script src="index.js"></script>
       <script src="indexAll.js"></script>
<script>      
    //comment 
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
    //file
function displayFileName(input) {
  var display = document.getElementById("CreatePostInputImageDisplay");
  display.textContent = input.files.length > 0 ? input.files[0].name : "No image selected";
}

</script>

<script>
    //stories0
    function openStoryOverlay(imageUrl, name) {
        document.getElementById('overlayImage').src = imageUrl;
        document.getElementById('storyOverlay-users').style.display = 'flex';
        document.getElementById('overlayText').innerHTML = name;
    }

    function closeStoryOverlay() {
        document.getElementById('storyOverlay-users').style.display = 'none';
    }

    
  function logout() {

    window.location.href = 'LogIn-SignUp-forgget/logout.php';
  }

</script>
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
    </script>


<script>
    // this for search
    function getXMLHttpRequest() { // This function is used to create an XMLHttpRequest object, taking into account different ways browsers handle it
        var xhr = null;
        if (window.XMLHttpRequest || window.ActiveXObject) {

            if (window.ActiveXObject) {

                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP")
                }
            } else {
                xhr = new XMLHttpRequest();
            }

        } else {
            alert("your browser does not support XMLHttpRequest ...");
            return null;
        }

        return xhr;
    }
    // using getc

    var xhr = getXMLHttpRequest();

    function refresh(s) {
        var xhr = getXMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status === 0)) {
                document.getElementById(s).innerHTML = xhr.responseText;
            }
        };

        xhr.open("GET", s + ".php", true);
        xhr.send(null);
    }

    function refreshsearchpage() {
        refresh('searchpage');
    }

    function gosearch() {
        var xhr = getXMLHttpRequest(); 
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status === 0)) {
                document.getElementById('searchpage').innerHTML = xhr.responseText;
            }
        };

        var search = document.getElementById('searchfield').value;

        xhr.open("POST", "searchpage.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("search=" + search);
    }

    refreshsearchpage();


    // using fetch 

    // function refreshsearchpage() {
    //     refresh('searchpage');
    // }

    // function gosearch() {
    //     var search = document.getElementById('searchfield').value;

    //     fetch('searchpage.php', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/x-www-form-urlencoded'
    //         },
    //         body: `search=${search}`
    //     })
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error(`HTTP error! Status: ${response.status}`);
    //             }
    //             return response.text();
    //         })
    //         .then(data => {
    //             document.getElementById('searchpage').innerHTML = data;
    //         })
    //         .catch(error => {
    //             console.error('Fetch error:', error);
    //         });
    // }

    // refreshsearchpage();

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

<!-- this for join right community -->
<script>
    function joinRightCommunity(communityId) {
        console.log("Community ID:", communityId);
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
</script>
<script>
    // Get all elements with the class "prof-img"
    const profileImages = document.querySelectorAll('.AccountImage');

    // Add a click event listener to each profile image
    profileImages.forEach(function(profimg) {
        profimg.addEventListener('click', function() {
            // Extract the user ID from the data attribute
            const friendId = this.getAttribute('friend-id');

            // Log or perform any action with the user ID
            console.log('Clicked on profile image of user ID:', friendId);

            // Redirect to the user profile page using the user ID
            window.location.href = 'user-profile.php?friend_id=' + friendId;
        });
    });
</script>

</html>
