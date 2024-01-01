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
// Update bio

// Check if the request method is POST and the necessary data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use json_decode to get the data from the request body
    $json = json_decode(file_get_contents('php://input'));

    // Sanitize and validate input data
    $postId = mysqli_real_escape_string($connection, $json->postId);

    // Get the type_id for the given userpost_id
    $selectQuery = "SELECT * FROM imagepost WHERE userpost_id = $postId";
    $result = $connection->query($selectQuery);

    if ($result) {
        $row = $result->fetch_assoc();
        $caption = $row['caption'];
        $image = $row['image'];

        // Send JSON response with result
        header('Content-Type: application/json');
        echo json_encode([
            "status" => "success",
            "caption" => $caption,
            "image" => $image
        ]);
        exit;
    } else {
        // Error fetching data from textpost or imagepost
        echo json_encode(["status" => "error", "message" => "Error fetching data: " . mysqli_error($connection)]);
        exit;
    }
} else {
    // Error fetching type_id
    echo json_encode(["status" => "error", "message" => "Error fetching type_id: " . mysqli_error($connection)]);
    exit;
}
?>

