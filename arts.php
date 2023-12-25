<?php
include './connDatabase/Connection.php';

session_start();
$userData = $_SESSION['auth_user'];
$userId = $userData['userid'];
$username = $userData['username'];



?>  
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="categories.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <title>Arts</title>

   
    </head>
    <body data-page-type="Arts">
        <div class="main_content" id="main_content">
            <section class="section">
        <section class="main-arts" id="sectionColorModeIdArts"  >
            <header>
                <a href="#" class="logo">Arts</a>
                <ul>
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="./categories.html" >Sports</a></li>
                    <li><a href="./news.html" >News</a></li>
                    <li><a href="./technology.html" >Technologies</a></li>
                    <li><a href="./movies.html">Movies</a></li>
                    <li><a href="./arts.html" class="AcitveCategory">Arts</a></li>
                </ul>
            </header>
            <div class="content">
                <div class="textBox">
                    <h2>That's what<br><span>I like</span></h2>
                    <p>
                        ARTS
                    </p>
                    <a href="#POSTSArt">View POSTS</a>
                </div>
                <div class="imgBox">
                    <img src="images/art1.png" alt="" class="arts">
                </div>
            </div>
            <ul class="thumb-arts">
                <li><img src="images/art2.png" onclick=" changeColor('#FFA500');"></li>
                <li><img src="images/art4.png" onclick=" changeColor('#0099ff');"></li>
                <li><img src="images/art5.png" onclick="changeColor('#7B2CBF');"></li>
            </ul>
        </section>



        <section class="POSTS" id="POSTSArt" >
            
        <?php
// <!-- sql for NAME AND Time post  -->

$sqlUserPost = "SELECT userposts.*, profile.*, user.First_name ,user.last_name,TIME(userposts.created_at) AS formatted_created_time
FROM userposts
INNER JOIN profile ON userposts.user_id = profile.user_id
INNER JOIN user ON userposts.user_id = user.user_id
WHERE userposts.category=5
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
                        echo '<script>window.location.href = "arts.php";</script>';
                        exit();
                    } catch (mysqli_sql_exception $e) {
                        // Handle the duplicate entry error silently
                        // Log the error for debugging purposes
                        error_log('Error in your query failed: ' . $e->getMessage());
            
                        // Redirect to index.php without displaying the error
                        echo '<script>window.location.href = "arts";</script>';
                        exit();
                    }
                }
            }
        ?>
       
        <form action="arts.php" method="POST" >
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
                         
                           echo '<script>window.location.href = "arts.php";</script>';
                           exit(); 
                       } else {
                           echo 'Error in your query failed: ' . $stmtComment->error;
                       }
                   } 
               }
               ?>

<!----------------------------------------this  for comment Form----------------------------------------------->
           <hr class="divider">
           <form action="arts.php" method="POST" >
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
</section>
</section>
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