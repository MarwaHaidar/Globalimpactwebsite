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

// Update user information
// Check if the request method is POST and the necessary data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use json_decode to get the data from the request body
    $json = json_decode(file_get_contents('php://input'));

    // Check if the required fields are present
    if (isset($json->firstname) && isset($json->lastname) && isset($json->username)) {
        // Sanitize and validate input data
        $firstname = mysqli_real_escape_string($connection, $json->firstname);
        $lastname = mysqli_real_escape_string($connection, $json->lastname);
        $username = mysqli_real_escape_string($connection, $json->username);
        
        // Initialize the update query for the user table
        $updateQuery = "UPDATE user SET First_name = '$firstname', last_name = '$lastname', user_name = '$username' WHERE user_id = '$userid' ";
        $connection->query($updateQuery);
        

        // Check if location is present in the JSON data
        if (isset($json->locationn)) {
            $locationn = trim(mysqli_real_escape_string($connection, $json->locationn));
            if($locationn != ""){
                 // Append the update query for the profile table
            $updateQuery = "UPDATE profile SET location = '$locationn' WHERE user_id = '$userid'";
            $connection->query($updateQuery);

            }
        }

        // Check if formattedDate is present in the JSON data
        if (isset($json->formattedDate)) {
            $formattedDate = trim(mysqli_real_escape_string($connection, $json->formattedDate));
            if($formattedDate != ""){
                 // Append the update query for the profile table
            $updateQuery = "UPDATE profile SET birthdate = '$formattedDate' WHERE user_id = '$userid'";
            $connection->query($updateQuery);
            }
        }

       
            // Send JSON response with result
            header('Content-Type: application/json');
            // Successful update
            echo json_encode(["status" => "success", "message" => "User information updated successfully"]);
            exit;
       
    } else {
        // Invalid request (missing fields)
        echo json_encode(["status" => "error", "message" => "Invalid request: Missing required fields"]);
        exit;
    }
} else {
    // Invalid request (not a POST request)
    echo json_encode(["status" => "error", "message" => "Invalid request: Not a POST request"]);
    exit;
}
?>
