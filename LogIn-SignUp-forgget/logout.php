<?php
session_start();

// Check if the user is authenticated
if(isset($_SESSION['authenticated'])){
    // Unset session variables
    unset($_SESSION['authenticated']);
    unset($_SESSION['auth_user']);
    
    // Set a logout status message
    $_SESSION['status'] = "You logged out successfully";

    // Redirect to the login page or any other desired location
    header("Location: LogIn.php");
    exit();
} else {
    // If the user is not authenticated, redirect to the login page
    header("Location: LogIn.php");
    exit();
}
?>