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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
     // Use json_decode to get the data from the request body
     $json = json_decode(file_get_contents('php://input'));

    // Sanitize and validate input data
    $comId = mysqli_real_escape_string($connection, $_POST['comId']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $topic = mysqli_real_escape_string($connection, $_POST['topic']);
    $file = $_FILES["file"]["tmp_name"];
    

    // Upload the file to Cloudinary
    $result = (new UploadApi())->upload($file);

    // Extract relevant information (e.g., public ID) from $result
    $publicId = $result['public_id'];

    // Insert the public ID into the database
    $sql = "UPDATE community SET name = '$name',description='$description',com_profile='$publicId',com_category='$topic' WHERE com_id = '$comId' ";

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
    // Use json_decode to get the data from the request body
    $json = json_decode(file_get_contents('php://input'));

    // Sanitize and validate input data
    $comId = mysqli_real_escape_string($connection, $_POST['comId']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $topic = mysqli_real_escape_string($connection, $_POST['topic']);

    // Insert the public ID into the database
    $sql = "UPDATE community SET name = '$name',description='$description',com_category='$topic' WHERE com_id = '$comId' ";

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
}
?>