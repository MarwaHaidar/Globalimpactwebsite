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

// upload the chosen image to Cloudinary
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Use json_decode to get the data from the request body
     $json = json_decode(file_get_contents('php://input'));

    // Sanitize and validate input data
    $postId = mysqli_real_escape_string($connection, $_POST['postId']);
    $caption = mysqli_real_escape_string($connection, $_POST['caption']);
    

    // Insert the public ID into the database
    $sql = "UPDATE imagepost SET caption = '$caption' WHERE userpost_id = '$postId' ";

    if ($connection->query($sql) === TRUE) {
        header('Content-Type: application/json');
        echo json_encode([
            "status" => "success",
            //"publicid" => $publicId
        ]);
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
