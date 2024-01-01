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
<?php
// upload the choosen image to cloud
$sql = "SELECT profile_photo, cover_photo FROM profile WHERE user_id = '$userid' ";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    
    // Access the values of "column1" and "column2"
    $profile = $row['profile_photo'];
    $cover = $row['cover_photo'];
} else {
    echo "No rows found";
}

// Start the session
//session_start();

// upload the chosen image to Cloudinary
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"]["tmp_name"];
    $cameraId = $_POST["cameraId"];
    $fileExtension = $_POST["fileExtension"];

    // Upload the file to Cloudinary
    $result = (new UploadApi())->upload($file);

    // Extract relevant information (e.g., public ID) from $result
    $publicId = $result['public_id'];

    // Choose the appropriate column based on cameraId
    $columnName = ($cameraId == 'small-icon' or $cameraId == 'small-camera' ) ? 'profile_photo' : 'cover_photo';

    // Insert the public ID into the database
    $sql = "UPDATE profile SET $columnName = '$publicId' WHERE user_id = '$userid' ";

    if ($connection->query($sql) === TRUE) {
        // Send JSON response with Cloudinary upload result
        header('Content-Type: application/json');

        // Output a clear separator before JSON data
        echo "##JSON_SEPARATOR##";

        echo json_encode(['public_id' => $publicId, 'fileExtension' => $fileExtension]);
        // Stop further execution
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Send JSON response indicating an error
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request']);
}


?>








