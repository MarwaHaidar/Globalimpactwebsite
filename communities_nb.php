<?php
include './connDatabase/Connection.php';
require 'vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');
?>
<?php
// Update user information

// Check if the request method is POST and the necessary data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use json_decode to get the data from the request body
    $json = json_decode(file_get_contents('php://input'));


     //update the follow table
     $queryselect = "SELECT COUNT(*) FROM community";
     $resultselect = $connection->query($queryselect);

    // Check if both updates were successful
    if ($resultselect) {

        $communityNb = $resultselect->fetch_assoc()['COUNT(*)'];


            // Send JSON response with result
            header('Content-Type: application/json');
            echo json_encode([
                "status" => "success",
                "communityNb" => $communityNb
            ]);
            exit;
        }    
        else {
            // Send JSON response with result
            header('Content-Type: application/json');
            echo json_encode([
                "status" => "success",
                "communityNb" => 0
            ]);
            exit;
        }
    }
 
 else {
    // Invalid request (missing fields)
    echo json_encode(["status" => "error", "message" => "Invalid request: Missing required fields"]);
    exit;
}
?>