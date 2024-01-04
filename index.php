<?php
include './connDatabase/Connection.php';
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

        <title>Ananymos</title>
    </head>
    <style>
   
    </style>
    <body>
        <div class="main_content" id="main_content">
            <section class="section">
       
       <!--========== HEADERR ==========-->
       <header class="header">
            <div class="header__container">
                

                <a href="./index.php" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
         
    
                <a>
                    <div class="header__profile">
                        <img class="header_profile" src="./images/login (1).png" alt="Profile Image" id="loginAnanymos">
                    </div>
                </a>

        </header>


        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                   
                    <a href="./index.php" class="nav__logo">
                        <img src="images/global logo.png" alt="Global Impact">   
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Our World</h3>
                            
                            
                            <a href="./index.php" class="nav__link Activeclass">
                                <i class="fa-solid fa-house nav_icon iconsColor "></i>
                                <span class="nav__name ">Home</span>
                            </a>
                        
        

                   
                     
                        </div>


        
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
                    <!-- <button class="nav_logout" name="logout_btn" onclick="logout()">LOGOUT</button> -->
            </nav>
        </div>


       

        <div class="post__container">

        
        <div  class="searchpageclass" id="searchpage"></div>




                

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
                  
               
                   
            ?>




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

                    ?>
                   
                    <form action="index.php" method="POST" >
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



 <!----------------------------------------this  for comment Form----------------------------------------------->
                            <hr class="divider">
                            <form action="userpage.php" method="POST" >
                                        <div class="comment">
                                                <div>
                          
                                        </div>
                                
                                        </div>
                                    </div>               
                        </form>

 
 <?php endforeach;?>
 </div>

<!-------------------------------this Form  for hashtag----------------------------------------------------->

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
            
     <!------------------------------ this for community ---------------------------->               
        </div>
                    <?php
            // sql for right community
            $sqlrightcommunity = "SELECT community.*
                                FROM community";            
            $resultVariablerightcommunity = mysqli_query($connection, $sqlrightcommunity);
            $usersVariablerightcommunity = mysqli_fetch_all($resultVariablerightcommunity, MYSQLI_ASSOC);     
            // print_r($usersVariablerightcommunity);
            ?>
            <div class="community_bar">
                <a href="#overlayPage"> 
                    <div class="title">
                        <i class="fa-solid fa-people-roof" style="color:#0099ff;" id="ComunityPathAdmin"></i>
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
                    </div>
                <?php
                    endif;
                    $countco++; // Increment the counter
                endforeach;
             ?>
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
    //stories
    function openStoryOverlay(imageUrl, name) {
        document.getElementById('overlayImage').src = imageUrl;
        document.getElementById('storyOverlay-users').style.display = 'flex';
        document.getElementById('overlayText').innerHTML = name;
    }

    function closeStoryOverlay() {
        document.getElementById('storyOverlay-users').style.display = 'none';
    }

    
    // ananymos login 
    document.getElementById('loginAnanymos').addEventListener('click', function(){
  window.location.href = './LogIn-SignUp-forgget/Login.php';
});
   
</script>






</html>
