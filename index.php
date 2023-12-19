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

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="index.css">

        <title>Index Page</title>
    </head>
    <body>
        <div class="main_content" id="main_content">
            <section class="section">
       
        <!--========== HEADERR ==========-->
        <header class="header">
            <div class="header__container">
                

                <a href="#Home" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class="fa-solid fa-magnifying-glass" ></i>
                </div>
    
                <a href="profilepage.html" id="ProfilePath">
                    <div class="header__profile">
                        <img class="header_profile" src="./images/myselZoom.jpg" alt="Profile Image">
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
                            
                            
                            <a href="./index.html" class="nav__link Activeclass">
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

                        <a href="./contactus.html" class="nav__link">
                            <i class="fa-solid fa-envelope iconsColor" ></i>
                            <span class="nav__name">Contact Us</span>
                        </a>
                        <a href="./MarketPlace/MarketPlace.html" class="nav__link">
                            <i class="fa-solid fa-shop iconsColor"></i>
                            <span class="nav__name">Market Place</span>
                        </a>
                    </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Top Picks</h3>
    
                           
                                <a href="./New.html" class="nav__link">
                                    <i class="fa-solid fa-folder-plus iconsColor" ></i>
                                    <span class="nav__name">New</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                

                            

                            <a href="./toppicks.html" class="nav__link">
                                <i class="fa-solid fa-arrow-trend-up iconsColor"></i>
                                <span class="nav__name">Trendy</span>
                            </a>
                            <a href="./recommended.html" class="nav__link">
                                <i class="fas fa-thumbs-up iconsColor" ></i>
                                <span class="nav__name">Recommended</span>
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



                   
                

                <button class="nav_logout">LOGOUT</button>
            </nav>
        </div>


       

        <div class="post__container">


            <!--create Stories--> 
<div class="main_contentStory">
  <div class="StoryGallery">
    <div class="navigation left">&lt;</div>
    <div class="scroll-container">
      <div class="inner-container">
        <div class="Poststory Poststory1" id="PostStory" onclick="openFileInput()">
            <input type="file" id="fileInput" style="display: none;" accept="image/*" onchange="displaySelectedImage()">
            <img src="./images/UploadImageStory.png" id="postImage">
            <p>Post Story</p>
          </div>
          <!-- <div id="selectedImageContainer">
            <img id="selectedImage" src="" alt="Selected Image">   past into html
          </div>
           -->
        <div class="story story2" >
          <img src="./images/rayan1.jpg">
          <p>Rayan</p>
        </div>
        <div class="story story3">
          <img src="./images/marwa1.jpg">
          <p>Marwa</p>
        </div>
        <div class="story story4">
          <img src="./images/member.jpg">
          <p>Ahmad</p>
        </div>
        <div class="story story5">
          <img src="./images/member.jpg">
          <p>Amjad</p>
        </div>
        <div class="story story6">
          <img src="./images/member.jpg">
          <p>Ismail</p>
        </div>
        <div class="story story7">
          <img src="./images/member.jpg">
          <p>Ali</p>
        </div>
      </div>
    </div>
    <div class="navigation right">&gt;</div>
  </div>
</div>
<!-- this for overlay stories  -->
<div class="overlayStories" id="overlayStories">
  <div class="overlay-content-Story">
    <span class="close-btn-Story" onclick="closeOverlayStory()">&times;</span>
    <img id="overlayimageStory" src="" alt="Overlay Image Story">
  </div>
</div>



<!--------------------------------------PHP create social media posts-------------------------------------------->


                <?php
                require 'vendor/autoload.php';
                use Cloudinary\Api\Upload\UploadApi;
                use Cloudinary\Configuration\Configuration;

                $CreatePostuser_id = 2; // get user_id from session when creating login
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
                        $stmt = $conn->prepare($sql);
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
                                    $stmtText = $conn->prepare($sqlText);
                                    $stmtText->bind_param("iss", $lastUserpostId, $CreatePosttype_something, $result['public_id']);
                                    $stmtText->execute();
                                } else {
                                    // Error uploading to Cloudinary
                                    echo 'Error uploading to Cloudinary: ' . json_encode($result);
                                }
                            } else {
                                // No image file provided
                                $sqlText = "INSERT INTO textpost(userpost_id, content) VALUES (?, ?)";
                                $stmtText = $conn->prepare($sqlText);
                                $stmtText->bind_param("is", $lastUserpostId, $CreatePosttype_something);
                                $stmtText->execute();
                            }

                            if ($stmtText->affected_rows > 0) {
                                // header('Location: index.php');
                                
                            } else {
                                echo 'Error in textpost query: ' . $stmtText->error;
                            }
                        } else {
                            echo 'Error in userposts query: ' . $stmt->error;
                        }
                    }
                }
                ?>

<!-- -----------------------------fORM social media posts-------------------------------------------------------->

            <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="create_post">
                <div class="create">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>

                <input type="text" class="type_something" name="type_something" placeholder="Type Something">
                </div>
                <div style="color:red ; margin-left:55px " ><?php echo $CreatePosterrosVariables['CreatePosttype_somethingError'] ?></div>
                <div class="post_features">
                    <div class="createpost_icons">
                        <i class="fa-solid fa-face-smile" style="color:#0099ff;"></i>
                        <i class="fa-solid fa-hashtag" style="color:#0099ff;"></i>

                         <input type="file" name="CreatePostInputImage">
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
<!-- -=--------------------------this SQL for posts display----------------------------- -->

                  
                    <?php
                // <!-- sql for NAME AND Time post  -->
                
                $sqlUserPost = "SELECT userposts.*, profile.*, user.First_name ,user.last_name,TIME(userposts.created_at) AS formatted_created_time
                FROM userposts
                INNER JOIN profile ON userposts.user_id = profile.user_id
                INNER JOIN user ON userposts.user_id = user.user_id";

                $resultVariable = mysqli_query($conn, $sqlUserPost);
                $usersVariable = mysqli_fetch_all($resultVariable, MYSQLI_ASSOC);

                // <!-- sql for text and image  post  -->

                $sqltextImage = "SELECT userposts.*, 
                COALESCE(textpost.content, '') AS content,  --  using for emty string
                COALESCE(imagepost.caption, '') AS caption
                FROM userposts
                LEFT JOIN imagepost ON userposts.userpost_id = imagepost.userpost_id
                LEFT JOIN textpost ON userposts.userpost_id = textpost.userpost_id;
                ";

                $resultVariabletextImage = mysqli_query($conn, $sqltextImage);
                $usersVariabletextImage = mysqli_fetch_all($resultVariabletextImage, MYSQLI_ASSOC);
                // print_r($usersVariabletextImage);   

                 // <!-- sql for comment post  -->   
                
                 $sqlComment = "SELECT userposts.*, comment.*
                 FROM userposts
                 INNER JOIN comment ON userposts.userpost_id = comment.post_id";
  
                    $resultVariableComment = mysqli_query($conn, $sqlComment);
                    $usersVariableComment = mysqli_fetch_all($resultVariableComment, MYSQLI_ASSOC);
                    
                    // print_r($usersVariableComment);
    
            ?>

<!-- -=----------------PHP FOR NAME AND TIME ------------------------ -->

<?php foreach ($usersVariable as $userpostD): ?>
                    <div class="post">
                    <?php  echo  $userpostD['userpost_id']?>
                        <div class="post-header">
                            <img src="images/rayan1.jpg" alt="Account Image" class="AccountImage" >
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
                                <img src="images/rayan-post.jpg" alt="Post Image" class="post-image">
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>


    
                    <div class="view-comments">
                        <a class="CommentsLink" href="javascript:void(0);" onclick="showCommentsOverlay('<?php echo $userpostD['userpost_id']; ?>')">View All Comments</a>    <!-- View comments link with JavaScript onClick event -->
                    </div>


<!-------------------------------this Form Overlay for comments ---------------------------------->
        


                    <div id="view-Comments-Overlay-Id-<?php echo $userpostD['userpost_id']; ?>" class="view-Comments-Overlay" style="display: none;">
                        <div class="view-Comments-Overlay-Form">
                            <p>This is the caption for the image.</p>
                            <div id="exit-comment" class="exit-comment" onclick="exitCommentsOverlay()">
                                <img
                                    loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
                                    class="x-imgComments"
                                />
                            </div>
                            <hr class="hrComments">
                            <img src="images/images (1).jpg" alt="Post Image" class="post-imageComment ">
                            <hr class="hrComments">
                            <h3 style="text-align: center; margin-top: 2px;">All Comments</h3>
                            <div class="All-Comments-Inside-Overlay" style="overflow-y: scroll; height: inherit;">
                                <?php foreach ($usersVariableComment as $userDComment): ?>
                                    <?php if ($userpostD['userpost_id'] == $userDComment['post_id']): ?>
                                        <div class="Comments-inside-O">
                                            <img class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                                            <div class="usersComments"><?php echo $userDComment['content']; ?></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

 <!----------------------------------------this  for comment Form----------------------------------------------->
                            <hr class="divider">
                            <form action="index.php" method="POST" >
                                        <div class="comment">
                                        <div class="comment_profile">
                                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                                        </div>
                                        <input type="text" class="write_comment" placeholder="Write a comment" name="comment_<?php echo $userpostD['userpost_id']; ?>">
                                        <!-- Add a hidden input field for the post ID  to get the userpost for each comment-->
                                        <input type="hidden" name="userpost_id" value="<?php echo $userpostD['userpost_id']; ?>">
                                        <input type="submit" name="submitWrite_comment" value="Comment" >
                                        </div>
                                    </div>               
                        </form>
 <!----------------------------------------this  for comment PHP Form----------------------------------------------->
                                            <?php
                                if (isset($_POST['submitWrite_comment'])) {
                                    $postIdWrite_comment = $_POST['userpost_id'];
                                    $userIdWrite_comment = 2; // get from session
                                    $commentContent = $_POST['comment_' . $postIdWrite_comment]; 

                                    echo ' post id ' . $postIdWrite_comment . " user id " .  $userIdWrite_comment . ' comment ' . $commentContent;

                                    if ($commentContent !== null) {
                                        $sqlCommentInsert = "INSERT INTO comment (post_id, user_id, content) VALUES (?, ?, ?)";

                                        $stmtComment = $conn->prepare($sqlCommentInsert);
                                        $stmtComment->bind_param("iis", $postIdWrite_comment, $userIdWrite_comment, $commentContent);
                                        $stmtComment->execute();

                                        if ($stmtComment->affected_rows > 0) {
                                          
                                            echo '<script>window.location.href = "index.php";</script>';
                                            exit(); 
                                        } else {
                                            echo 'Error in your query failed: ' . $stmtComment->error;
                                        }
                                    } else {
                                        echo 'Error: Comment content is NULL';
                                    }
                                }
                                ?>
 
 <?php endforeach;?>
 </div>
        
<!-------------------------------this Form  for right navbar----------------------------------------------------->
    <div class="right_navbar">
        <div class="Trending_bar">
            <div class="title"><i class="fa-solid fa-fire-flame-curved" style="color:#0099ff;" ></i>
            <p class="title-word">Trending</p></div>
            <hr class="right-divider">
            <div class="element1">
                <p class="name">#mhmd</p>
                <button class="follow">Follow</button>
            </div>

            <div class="element2">
                <p class="name">#ahmd</p>
                <button class="follow">Follow</button>
            </div>
            <div class="element2">
                <p class="name">#amjad</p>
                <button class="follow">Follow</button>
            </div>
           


        </div>

        <div class="recommended_bar">
            <div class="title"><i class="fa-solid fa-people-group" style="color:#0099ff;"></i>
                <p class="title-word"> Recommended</p></div>
                <hr class="right-divider">
                <div class="element1">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">Ali Tarhini</p>
                    <button class="follow">Follow</button>
                </div>
    
                <div class="element2">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">Ali Mantache</p>
                    <button class="follow">Follow</button>
                </div>
                
                <div class="element4">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">rayan sultan</p>
                    <button class="follow">Follow</button>
                </div>
                
        </div>

        <div class="community_bar">
           <a href="#overlayPage"> <div class="title"  ><i class="fa-solid fa-people-roof" style="color:#0099ff;" id="ComunityPath"></i>
                <p class="title-word"> Community</p></div></a>
                <hr class="right-divider">
                <div class="element1">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">crypto-edu</p>
                    <button class="follow">Join</button>
                </div>
    
                <div class="element2">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">everyday-talk</p>
                    <button class="follow">Join</button>
                </div>
                
                <div class="element3">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">Esa-coding Lab</p>
                    <button class="follow">Join</button>
                </div>

                <hr class="right-divider">
                <div class="titleCommunity"><i class="fa-solid fa-people-roof" style="color:#0099ff;" font-size: 20px;" ></i>
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
            <i class="fa-regular fa-circle-xmark"  id="closeOverlay" style="color: #000000;"></i>
        </div>
        
        <div id="form">
            <form id="createCommunityForm">
                <hr style="width: 90%; margin-left: 4%;">
          <div class="comunnityForm">
                    <label for="communityName">Community Name</label><br>
                    <input type="text" id="communityName" name="communityName" placeholder="Community Name" required>
      
          
                    <label for="description">Topic</label><br>
                    <input type="text" id="communityTopic" name="communityTopic"  placeholder= "This will help relevant users find your community ">
          
         
                    <label for="description">Description</label><br>
                    <input type="text" id="communityName" name="communityName"  placeholder="This is how new members come to understand your community" required>
          
           
                    <label for="communityPhoto">Community Photo</label><br>
                    <input type="file" id="communityPhoto" name="communityPhoto" accept="image/*">
                    
       
                
                <button type="submit" class="custom-btn save-edit-aboutinfo">Create Community</button>
                
            </div>    
            </form>
            </div>
            
        </div>
    </div>
    </body>
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




</html>
