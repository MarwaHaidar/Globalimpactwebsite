<?php
// require 'vendor/autoload.php';
// use Cloudinary\Api\Upload\UploadApi;
// use Cloudinary\Configuration\Configuration;
// ?>
 <?php
// Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');
// (new UploadApi())->upload('download (2).jpg');  
?>



<?php
require 'vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;

// Assuming you have a form with a file input named 'fileInput'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileInput'])) {
    // Cloudinary configuration
    Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');

    // Temporary file path
    $tempFilePath = $_FILES['fileInput']['tmp_name'];

    // Check if the file was uploaded successfully
    if (is_uploaded_file($tempFilePath)) {
        // Original file name
        $originalFileName = $_FILES['fileInput']['name'];

        // Perform the Cloudinary upload
        $result = (new UploadApi())->upload($tempFilePath, ['public_id' => 'your_public_id']);

        // Check if the upload was successful
        if (isset($result['public_id'])) {
            echo 'File uploaded to Cloudinary. Public ID: ' . $result['public_id'];

            // Now you can use $result['public_id'] in your database query or wherever needed.
        } else {
            echo 'Error uploading to Cloudinary: ' . json_encode($result);
        }
    } else {
        echo 'Error: File not uploaded successfully.';
    }
}
?>

<!-- Your HTML form -->
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileInput">
    <input type="submit" value="Upload">
</form>









<!-- ----------------- -->


<?php
require 'vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;

// Assuming you have a form with a file input named 'CreatePostInputImage'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['CreatePostInputImage'])) {
    // Cloudinary configuration
    Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');
    
    // Temporary file path
    $tempFilePath = $_FILES['CreatePostInputImage']['tmp_name'];

    // Check if the file was uploaded successfully
    if (is_uploaded_file($tempFilePath)) {
        // Perform the Cloudinary upload
        $result = (new UploadApi())->upload($tempFilePath, ['public_id' => 'your_public_id']);

        // Check if the upload was successful
        if (isset($result['public_id'])) {
            echo 'File uploaded to Cloudinary. Public ID: ' . $result['public_id'];

            // Now you can use $result['public_id'] in your database query or wherever needed.
        } else {
            echo 'Error uploading to Cloudinary: ' . json_encode($result);
        }
    } else {
        echo 'Error: File not uploaded successfully.';
    }
}
?>

<form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="create_post">
        <div class="create">
            <div class="comment_profile">
                <img class="profile_photo" src="images/Eo_circle_purple_letter-m.svg.png">
            </div>

            <input type="text" class="type_something" name="type_something" placeholder="Type Something">
        </div>
        <div class="post_features">
            <div class="createpost_icons">
                <i class="fa-solid fa-face-smile" style="color:#0099ff;"></i>
                <i class="fa-solid fa-hashtag" style="color:#0099ff;"></i>
                <input type="file" name="CreatePostInputImage">
            </div>
            <label for="dropdown">Select Category:</label>
            <select id="dropdownPostCategory" name="dropdownPostCategory">
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