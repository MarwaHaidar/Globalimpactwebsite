<?php 
include './connDatabase/Connection.php'; // Add a semicolon here

session_start();
$userData = $_SESSION['auth_user'];
$userId = $userData['userid'];
$username = $userData['username'];

if (!$userId) {
    // Redirect to the login page or handle authentication as needed
    header("Location: ./LogIn-SignUp-forgget/LogIn.php");
    exit;
}
?>
<html>
	<head>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="toppicks.css">
		        <!--========== For scrolling ==========-->
				<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	</head>
	<body>
		<div class="theme-switch" style="display: none;">
			<span class="nav__name" style="margin-bottom: 10px;">Dark mode</span>
			<input type="checkbox" id="toggle-switch">
			<label for="toggle-switch"></label>
		</div>
		<header id="HeaderColor">
			<div class="website-header">
				<a  href="./userpage.php"><img src="images/global logo.png" alt="Global Impact"></a>
				<h1>GLOBAL IMPACT</h1>
				
			</div>
			<nav class="navbar navbar-expand-md " id="navColor" >
  
  

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="userpage.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="toppicks.php">TRENDY</a>
      </li> 
		<li class="nav-item">
        <a class="nav-link" href="New.php">NEW</a>
      </li>
    
    </ul>
  </div> 
			</nav>
			<div class="breaking-news-section">
				<span id="btext">TOP PICKS</span>
				<marquee direction="left" onmouseover="this.stop()" onmouseout="this.start()">
					<a href="#" class="breaking-news">
						<p class="bntime">11 Jan 2019</p>
						Congress under pressure to reach a deal</a>
					<a href="#" class="breaking-news"><p class="bntime">11 Jan 2019</p>Powerful laser beam is helping track the moon</a>
					<a href="#" class="breaking-news"><p class="bntime">11 Jan 2019</p>Snowstorm buries Pacific Northwest, with more on the way</a>
				</marquee>
			</div>
		</header>
		<main>
			<article id="popular-news">
				<div id="featured">
					<h2>TRENDY</h2>
					<section class="popular-news-carousel">
						<div id="carousel" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
							<div class="carousel-item active">
							  <img class="d-block w-100" src="images/carousel1.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>The Federal Government Paid Media Outlets to Promote the Covid Vaccine</h5>
									<p>11th Jan 2019</p>
								 </div>
							</div>
							<div class="carousel-item">
							  <img class="d-block w-100" src="images/carousel2.jpg" alt="Second slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>The Federal Government Paid Media Outlets to Promote the Covid Vaccine</h5>
									<p>11th Jan 2019</p>
								 </div>
							</div>
							<div class="carousel-item">
							  <img class="d-block w-100" src="images/carousel3.jpg" alt="Third slide">
								<div class="carousel-caption d-none d-md-block">
									<h5> The Federal Government Paid Media Outlets to Promote the Covid Vaccine </h5>
									<p>11th Jan 2019</p>
								 </div>
							</div>
						  </div>
						  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
					</section>
					
				</div>
				<div id="latest">
					<h2>NEW</h2>
					<section class="news">
						<div class="news-container">
							<img src="images/carousel1.jpg">
							<p class="carousel-text">This floating entertainment hub</p>				
						</div>						
					</section>
					<section class="news">
						<div class="news-container">
							<img src="images/carousel2.jpg">
							<p class="carousel-text">Repurposed Boeing</p>				
						</div>						
					</section>
				</div>

			</article>

			
			<section class="POSTS" id="POSTS">
            
			<?php
   
//    echo "User ID: " . $userId . "<br>";
//    echo "Username: " . $username . "<br>";
   // <!-- sql for NAME AND Time post  -->
   
   $sqlUserPost = "SELECT userposts.*, profile.*, user.First_name, user.last_name, TIME(userposts.created_at) AS formatted_created_time,
   COUNT(DISTINCT actions.action_id) AS total_actions,
   COUNT(DISTINCT comment.comment_id) AS total_comments
   FROM userposts
   INNER JOIN profile ON userposts.user_id = profile.user_id
   INNER JOIN user ON userposts.user_id = user.user_id
   LEFT JOIN actions ON userposts.userpost_id = actions.post_id
   LEFT JOIN comment ON userposts.userpost_id = comment.post_id
   GROUP BY userposts.userpost_id
   ORDER BY total_actions DESC, total_comments DESC, userposts.created_at DESC";

$resultVariable = mysqli_query($connection, $sqlUserPost);
$usersVariable = mysqli_fetch_all($resultVariable, MYSQLI_ASSOC);
// print_r($usersVariable);



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
						   echo '<script>window.location.href = "toppicks.php";</script>';
						   exit();
					   } catch (mysqli_sql_exception $e) {
						   // Handle the duplicate entry error silently
						   // Log the error for debugging purposes
						   error_log('Error in your query failed: ' . $e->getMessage());
			   
						   // Redirect to index.php without displaying the error
						   echo '<script>window.location.href = "toppicks";</script>';
						   exit();
					   }
				   }
			   }
		   ?>
		  
		   <form action="toppicks.php" method="POST" >
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
							
							  echo '<script>window.location.href = "toppicks.php";</script>';
							  exit(); 
						  } else {
							  echo 'Error in your query failed: ' . $stmtComment->error;
						  }
					  } 
				  }
				  ?>

<!----------------------------------------this  for comment Form----------------------------------------------->
			  <hr class="divider">
			  <form action="toppicks.php" method="POST" >
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
				</div>
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
					   
						<script>


							// this for dark mode 
				// this for dark mode 
				document.addEventListener('DOMContentLoaded', function() {
            const body = document.body;
            const toggleSwitch = document.getElementById('toggle-switch');
            const PostNR = document.getElementById('POSTS');
            const currentTheme = localStorage.getItem('theme');
			const HeaderColor = document.getElementById('HeaderColor');
			const navColor =document.getElementById('navColor');


            if (currentTheme) {
                body.style.background = currentTheme === 'dark-mode' ? '#0b0c10' : 'white';
                toggleSwitch.checked = currentTheme === 'dark-mode';
                PostNR.style.background = currentTheme === 'dark-mode' ? '#0b0c10' : 'white';
				HeaderColor.style.background = currentTheme === 'dark-mode'? '#191C24' : '#0099ff';
				navColor.style.background = currentTheme === 'dark-mode'? '#191C24' : '#0099ff';
            }

            // Toggle dark mode
            toggleSwitch.addEventListener('change', function() {
                const isDarkMode = this.checked;
                body.style.background = isDarkMode ? '#0b0c10' : 'white';
                localStorage.setItem('theme', isDarkMode ? 'dark-mode' : 'light-mode');
                PostNR.style.background = isDarkMode ? '#0b0c10' : 'white';
				HeaderColor.style.background = isDarkMode ? '#191C24' : '#0099ff';
				navColor.style.background = isDarkMode ? '#191C24' : '#0099ff';
            });
        }); 
		
		
	
		</script>
		<script src="./indexAll.js"></script>
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
					</body>
				</html>