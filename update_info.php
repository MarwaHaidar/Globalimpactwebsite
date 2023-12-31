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
        $locationn = trim(mysqli_real_escape_string($connection, $json->locationn));
        $birthYear = trim(mysqli_real_escape_string($connection, $json->birthYear));
        $birthMonth = trim(mysqli_real_escape_string($connection, $json->birthMonth));
        $birthDay = trim(mysqli_real_escape_string($connection, $json->birthDay));

        
            // Convert month name to number
            //$monthNumber = date_parse($birthMonth)['month'];

            // Check if the conversion was successful
                // Create the formatted date
                $formattedDate = sprintf("%04d-%02d-%02d", $birthYear, $birthMonth, $birthDay);
        // Update the user information in the database
        $updateQuery = "UPDATE user SET First_name = '$firstname', last_name = '$lastname', user_name = '$username' WHERE user_id = '$userid' ";
        $updateQuery1 = "UPDATE profile SET location = '$locationn', birthdate = '$formattedDate' WHERE user_id = '$userid' ";

        if ($connection->query($updateQuery) === TRUE && $connection->query($updateQuery1) === TRUE ) {
            // Send JSON response with result
            header('Content-Type: application/json');

            // Successful update
            echo json_encode(["status" => "success", "message" => "User information updated successfully"]);

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
} else {
    // Invalid request (not a POST request)
    echo json_encode(["status" => "error", "message" => "Invalid request: Not a POST request"]);
    exit;
}
?>


