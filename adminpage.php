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
    </head>
    <body>
        <div class="main_content" id="main_content">
            <section class="section">
       
        <!--========== HEADERR ==========-->
        <header class="header">
            <div class="header__container">
                

                <a href="./adminpage.html" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class="fa-solid fa-magnifying-glass" ></i>
                </div>
    
                <a >
                    <div class="header__profile">
                        <img class="header_profile" src="../Globalimpactwebsite/Admin-Dashboard/img/AdminImg.webp" alt="Profile Image">
                    </div>
                </a>
            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                   
                    <a href="./adminpage.html" class="nav__logo">
                        <img src="images/global logo.png" alt="Global Impact">   
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Our World</h3>
                            
                            
                            <a href="./adminpage.html" class="nav__link Activeclass">
                                <i class="fa-solid fa-house nav_icon iconsColor "></i>
                                <span class="nav__name ">Home</span>
                            </a>
                        
        

                   
                     
                        </div>

            
                        <a href="./MarketPlace/MarketPlace.html" class="nav__link">
                            <i class="fa-solid fa-shop iconsColor"></i>
                            <span class="nav__name">Market Place</span>
                        </a>

                        <a href="../Globalimpactwebsite/Admin-Dashboard/index.php" class="nav__link">
                            <i class="fa-solid fa-chart-line"></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                    </div>
    
  
                    </div>



                       

                    <a href="LogIn-SignUp-forgget/logout.php">
                    <button class="nav_logout" name="logout_btn">LOGOUT</button>
                    </a>
            </nav>
        </div>

       














      
        <div class="post__container">






        <!--posts display-->    
            <div class="post">
                <div class="post-header">
                    <img src="images/rayan1.jpg" alt="Account Image" class="AccountImage" >
                    <div class="user-ProfilePost">
                    <p class="account-name">Rayan Sultan</p>
                        <div class="account-Date">
                        <small>3h ago</small>
                     <small> <i class="fa-solid fa-earth-americas"   style="padding-left: 3px;"></i></small>  
                        </div>
                    </div>
                    <div class="post_menu">
                        <i class="fa-solid fa-ellipsis-vertical" style="color:#0099ff;" onclick="showMenu(this)"></i>
                        <div class="actions-menu">
                            <ul>
                                <li onclick="BanUserAction()">Ban</li>
                                <li onclick="deleteAction()">Delete</li>
                            </ul>
                        </div>    
                    </div>
                </div>
           
               
                <p class="post-caption">This is the caption for the image.</p>
                <img src="images/rayan-post.jpg" alt="Post Image" class="post-image">
                
                <div class="post-actions">
                    <div class="vote-buttons">
                        <button onclick="upvote()" class="darkmodeUpDownComments"><i class="fa-solid fa-thumbs-up UpvateClass" ></i></button><span class="count">100</span>
                        <button onclick="downvote()" class="darkmodeUpDownComments"><i class="fa-solid fa-thumbs-down DownClass"></i></button><span class="count">50</span>
                    </div>
                    <button class="comment-button CommentsLink darkmodeUpDownComments"  onclick="comment()" ><i class="fa-solid fa-comment commnetsVote" ></i></button><span class="count">60</span>
                </div>
                   <!--view comments--------------------------------------------->
                   <div class="view-comments" ><a class="CommentsLink" href="#1">View All Comments </a></div>
                 
                   <!------------------------------------------------------->
        
            </div>

            <div class="post">
                <div class="post-header">
                    <a href="user-profile.html" id="ProfilePathUser">
                        <img src="./images/marwa1.jpg" alt="Account Image" class="AccountImage" >
                    </a>
                    <div class="user-ProfilePost">
                    <p class="account-name">Marwa Haidar</p>
                        <div class="account-Date">
                        <small>3h ago</small>
                     <small> <i class="fa-solid fa-earth-americas"   style="padding-left: 3px;"></i></small>  
                        </div>
                    </div>
                    <div class="post_menu">
                        <i class="fa-solid fa-ellipsis-vertical" style="color:#0099ff;"onclick="showMenu(this)"></i>
                        <div class="actions-menu">
                            <ul>
                                <li onclick="BanUserAction()">Ban</li>
                                <li onclick="deleteAction()">Delete</li>
                            </ul>
                        </div>    
                    </div>
                </div>
                <p class="post-caption">This is the caption for the image.</p>
                <img src="images/marwa2.jpg" alt="Post Image" class="post-image">
                
                <div class="post-actions">
                    <div class="vote-buttons">
                        <button onclick="upvote()" class="darkmodeUpDownComments"><i class="fa-solid fa-thumbs-up UpvateClass" ></i></button><span class="count">100</span>
                        <button onclick="downvote()" class="darkmodeUpDownComments"><i class="fa-solid fa-thumbs-down DownClass" ></i></button><span class="count">50</span>
                    </div>
                    <button class="comment-button CommentsLink darkmodeUpDownComments " onclick="comment()"><i class="fa-solid fa-comment commnetsVote" ></i></button><span class="count">20</span>
                </div>
                <!--view comments--------------------------------------------->
                <div class="view-comments"><a class="CommentsLink" href="#2">View All Comments </a></div>          
                <!------------------------------------------------------->
         
            </div>
            

            <div class="post">
                <div class="post-header">
                    <img src="images/myself.jpg" alt="Account Image" class="AccountImage" >
                    <div class="user-ProfilePost">
                    <p class="account-name">Oussama hamzeh</p>
                        <div class="account-Date">
                        <small>3h ago</small>
                     <small> <i class="fa-solid fa-earth-americas"   style="padding-left: 3px;"></i></small>  
                        </div>
                    </div>
                    <div class="post_menu">
                        <i class="fa-solid fa-ellipsis-vertical" style="color:#0099ff;" onclick="showMenu(this)"></i>
                        <div class="actions-menu">
                            <ul>
                                <li onclick="BanUserAction()">Ban</li>
                                <li onclick="deleteAction()">Delete</li>
                            </ul>
                        </div>    
                    </div>
                </div>
                <p class="post-caption">This is the caption for the image.</p>
                <img src="images/myself.jpg" alt="Post Image" class="post-image">
                
                <div class="post-actions">
                    <div class="vote-buttons">
                        <button onclick="upvote()" class="darkmodeUpDownComments"><i class="fa-solid fa-thumbs-up UpvateClass" ></i></button><span class="count">100</span>
                        <button onclick="downvote()" class="darkmodeUpDownComments"><i class="fa-solid fa-thumbs-down DownClass"></i></button><span class="count">50</span>
                    </div>
                    <button class="comment-button CommentsLink darkmodeUpDownComments" onclick="comment()"><i class="fa-solid fa-comment commnetsVote" ></i></button><span class="count">10</span>
                </div>
                  <!--view comments--------------------------------------------->
                  <div class="view-comments" id=""><a class="CommentsLink" href="#3">View All Comments </a></div>    
                  <!------------------------------------------------------->
          
                
                
            </div>

    </div>


<!-------------------------------this Form  for view All comment inside Overlay------------------------------------------------------>


    <div id="view-Comments-Overlay-Id" class="view-Comments-Overlay">
        <div class="view-Comments-Overlay-Form">
            <p>This is the caption for the image.</p>
                   <div id="exit-comment"> <img 
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
                    class="x-imgComments"
                    />
                 
                </div>
            <hr class="hrComments">
            <img src=  "images/images (1).jpg" alt="Post Image" class="post-imageComment " >
            <hr class="hrComments">
            <h3 style="text-align: center; margin-top: 2px;">All Comments</h3>
            <div class="All-Comments-Inside-Overlay">
                   <div class="Comments-inside-O">
                     <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                     <div class="usersComments"> Nice</div>
                   </div>
                     
                   <div class="Comments-inside-O">
                     <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                     <div class="usersComments"> Amazing!</div>
                   </div>
                   <div class="Comments-inside-O">
                     <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                     <div class="usersComments"> I like this !!!</div>
                   </div>
            </div>
        
        </div>
</div>
    
    <!------------------------------------------------------------------------------------->
    <div class="right_navbar">
        <div class="Trending_bar">
            <div class="title"><i class="fa-solid fa-fire-flame-curved" style="color:#0099ff;" ></i>
            <p class="title-word">Trending</p></div>
            <hr class="right-divider">
            <div class="element1">
                <p class="name">#mhmd</p>
             
            </div>

            <div class="element2">
                <p class="name">#ahmd</p>
              
            </div>
            <div class="element2">
                <p class="name">#amjad</p>
               
            </div>
           


        </div>



        <div class="community_bar">
           <a href="communityallAdmin.php"> <div class="title"  ><i class="fa-solid fa-people-roof" style="color:#0099ff;" id="ComunityPathAdmin"></i>
                <p class="title-word"> Community</p></div></a>
                <hr class="right-divider">
                <div class="element1">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">crypto-edu</p>
                    <button class="follow">View</button>
                </div>
    
                <div class="element2">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">everyday-talk</p>
                    <button class="follow">View</button>
                </div>
                
                <div class="element3">
                    <div class="comment_profile">
                        <img  class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
                    </div>
                    <p class="name">Esa-coding Lab</p>
                    <button class="follow">View</button>
                </div>

                
       


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
  



<script>
   // this for Community path for admin -------------
document.getElementById('ComunityPathAdmin').addEventListener('click', function(){
 window.location.href = 'communityallAdmin.html';
});


</script>

       <script src="index.js"></script>
       <script src="indexAll.js"></script>
       
    </body>
</html>