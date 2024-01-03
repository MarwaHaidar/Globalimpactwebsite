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
    $friendId = mysqli_real_escape_string($connection, $json->friendId);

    // Update the user information in the database
    // Update the followers count for the following user
    $queryUpdateFollowing = "UPDATE user SET followers = followers + 1 WHERE user_id = '$friendId'";
    $resultUpdateFollowing = $connection->query($queryUpdateFollowing);

    // Update the following count for the follower user
    $queryUpdateFollower = "UPDATE user SET following = following + 1 WHERE user_id = '$loggedInUserId'";
    $resultUpdateFollower = $connection->query($queryUpdateFollower);

    //update the follow table
    $queryUpdateFollow = "INSERT INTO  follow(user_id,friend_id,follow) VALUES('$loggedInUserId','$friendId',1)";
    $resultUpdateFollow = $connection->query($queryUpdateFollow);

     //update the follow table
     $queryselectFollow = "SELECT follow FROM follow WHERE user_id='$loggedInUserId' AND friend_id='$friendId' ORDER BY follow_id DESC LIMIT 1";
     $resultselectFollow = $connection->query($queryselectFollow);

    // Check if both updates were successful
    if ($resultUpdateFollowing && $resultUpdateFollower && $resultUpdateFollow) {
        // Fetch the updated counts from the database
        $queryGetCounts = "SELECT followers, following FROM user WHERE user_id = '$friendId'";
        $resultGetCounts = $connection->query($queryGetCounts);

        if ($resultGetCounts) {
            $row = $resultGetCounts->fetch_assoc();
            $row1 = $resultselectFollow->fetch_assoc();
            $newFollowersCount = $row['followers'];
            $newFollowingCount = $row['following'];
            $follow = $row1['follow'];

            // Send JSON response with result
            header('Content-Type: application/json');
            echo json_encode([
                "status" => "success",
                "message" => "User information updated successfully",
                "newFollowersCount" => $newFollowersCount,
                "newFollowingCount" => $newFollowingCount,
                "follow" => $follow
            ]);

            exit;
        } else {
            // Error fetching updated counts
            echo json_encode(["status" => "error", "message" => "Error fetching updated counts: " . mysqli_error($conn)]);
            exit;
        }
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


