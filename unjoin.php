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

    // Sanitize and validate input data
    $loggedInUserId = mysqli_real_escape_string($connection, $json->loggedInUserId);
    $comId = mysqli_real_escape_string($connection, $json->comId);


    //update the follow table
    $queryUpdateFollow = "INSERT INTO  joins(user_id,community_id,joins) VALUES('$loggedInUserId','$comId',0)";
    $resultUpdateFollow = $connection->query($queryUpdateFollow);

     //update the follow table
     $queryselectFollow = "SELECT joins FROM joins WHERE user_id='$loggedInUserId' AND community_id='$comId' ORDER BY join_id DESC LIMIT 1";
     $resultselectFollow = $connection->query($queryselectFollow);

    // Check if both updates were successful
    if ($resultUpdateFollow) {

            $row1 = $resultselectFollow->fetch_assoc();
            $join = $row1['joins'];

            // Send JSON response with result
            header('Content-Type: application/json');
            echo json_encode([
                "status" => "success",
                "message" => "User information updated successfully",
                //"join" => $join
            ]);

            exit;
    } else {
        // Error in the update query
        echo json_encode(["status" => "error", "message" => "Error updating user information: " . mysqli_error($conn)]);
        exit;
    }
} else {
    // Invalid request (missing fields)
    echo json_encode(["status" => "error", "message" => "Invalid request: Missing required fields"]);
    exit;
}
?>