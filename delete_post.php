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
// update bio

// Check if the request method is POST and the necessary data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Use json_decode to get the data from the request body
     $json = json_decode(file_get_contents('php://input'));

     // Sanitize and validate input data
     $postId = mysqli_real_escape_string($connection, $json->postId);

    // Update the bio in the database
    $updateQuery = "DELETE FROM userposts WHERE userpost_id = $postId";

    if ($connection->query($updateQuery) === TRUE) {
            // Send JSON response with result
         header('Content-Type: application/json');
         echo json_encode([
             "status" => "success",
             "message" => "post deleted successfully"
         ]);
         exit;
  
     } else {
         // Error fetching updated counts
         echo json_encode(["status" => "error", "message" => "Error fetching updated counts: " . mysqli_error($connection)]);
         exit;
     }
 } else {
     // Error in the update query
     echo json_encode(["status" => "error", "message" => "Error updating user information: " . mysqli_error($connection)]);
     exit;
 }
?>