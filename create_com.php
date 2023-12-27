<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include("connDatabase/connection.php");
require 'vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;

if (isset($_POST['create_com_btn'])) {
    $communityName = $_POST['communityName'] ?? '';
    $communityCategory = $_POST['communitycategory'] ?? '';
    $communityDescription = $_POST['communitydesc'] ?? '';
    $communityPhoto = $_FILES['communityPhoto']['tmp_name'] ?? '';
    $userId = $_SESSION['auth_user']['userid'];  

    // Check if the user is authenticated (user ID is in the session)
    if (!$userId) {
        // Redirect to the login page or handle authentication as needed
        header("Location: LogIn.php");
        exit;
    }

    // File upload handling
    if (!empty($communityPhoto)) {
        // Cloudinary configuration
        Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');

                // Perform the Cloudinary upload
                $result = (new UploadApi())->upload($communityPhoto);

                if (isset($result['public_id'])) {
                    // File uploaded to Cloudinary. Public ID: $result['public_id']
                
                    $sqlText = "INSERT INTO community (user_id, name, description, com_profile, com_category, followers) VALUES (?, ?, ?, ?, ?, 0)";
                    $stmtText = $connection->prepare($sqlText);
                    $stmtText->bind_param("issss", $userId, $communityName, $communityDescription, $result['public_id'],$communityCategory);
                    $stmtText->execute();
                
                    if ($stmtText->affected_rows > 0) {
                        // Insertion successful
                        echo "Community created successfully!";
                        echo '<script>window.location.href = "communityall.php";</script>';
                    } else {
                        // Insertion failed
                        echo "Error creating community: " . $stmtText->error;
                    }
                } else {
                    // Error uploading to Cloudinary
                    echo 'Error uploading to Cloudinary: ' . json_encode($result);
                }
                
    } else {
        // No image file provided
        // Insert data into the community table without an image path
        $sql = "INSERT INTO community (user_id, name, description, com_profile, com_category, followers) VALUES (?, ?, ?, '', ?, 0)";
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bind_param("isss", $userId, $communityName, $communityDescription, $communityCategory);

        // Execute the statement
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            // Insertion successful
            echo "Community created successfully!";
        } else {
            // Insertion failed
            echo "Error creating community: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection (assuming $connection is your database connection)
$connection->close();
?>
