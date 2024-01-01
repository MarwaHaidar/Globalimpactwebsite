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
    <link rel="stylesheet" type="text/css" href="profilepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>    
    <!--Section: Contact v.2-->
    <section class="section">
        <!-- Header Section -->
        <header class="header">
            <div class="header__container">
                

                <a href="./userpage.php" class="header__logo"><img src="images/global logo.png" alt="Global Impact"></a>

    
                <a href="profilepage.html" id="ProfilePath">
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
     

      <!--part2-->
     <div class="container">
        <div class="text-content">
            <div class="row-1">
                <div class="name-job">
                  <span><?php echo $row1['First_name'] . ' ' . $row1['last_name']; ?></span>
                  <small id="bio-text"><?php echo $row2['bio']; ?></small>
                </div>
                <button type="button" class="btn" id="openButton1">Edit Profile</button>
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
     

    <!--create the photo section-->
    <div class="grid-photo-container">
    <?php
    // select all the user post images from the database and display them in the photos section

    $query = "SELECT imagepost.image
    FROM imagepost
    JOIN userposts ON imagepost.userpost_id = userposts.userpost_id
    WHERE userposts.user_id = $userid AND userposts.type_id = 2";
    
    $result = $connection->query($query);

    if ($result) {
        // Fetch all rows into an associative array
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        // Process each row
        foreach ($rows as $row) {
            $imageURL = $row['image'];

            // Output the image HTML
            echo '<div class="grid-item">';
            echo '<img src="https://res.cloudinary.com/dbete4djx/image/upload/' . $imageURL . '" alt="User Post Image" style="object-fit: cover; position: relative; width: 100%; height: 100%; border-radius: 10%;">';
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
    <!------------edit profile overlay------------------->
    <div class="overlay" id="overlay">
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
                <div class="date-of-birth">
                    <select id="birthYear" name="birthYear">
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                    </select>
                    <select id="birthMonth" name="birthMonth">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                    </select>
                    <select id="birthDay" name="birthDay">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                    </select>
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
    <!------------------------------------------------------------------------------------->
      
    <!-----------------edit   profile overlay-->
    <script>
        document.getElementById('openButton').addEventListener('click', function() {
       document.getElementById('overlay').style.display = 'block';
       document.querySelector('.main-content').classList.add('blurred');
     });
     document.getElementById('openButton1').addEventListener('click', function() {
       document.getElementById('overlay').style.display = 'block';
       document.querySelector('.main-content').classList.add('blurred');
     });

     document.getElementById('x-button').addEventListener('click', function() {
        document.getElementById('overlay').style.display = 'none';
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
    await fetch('cloud.php', {
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
</script>

   
     
<script src="./indexAll.js" ></script>
</body>
</html>