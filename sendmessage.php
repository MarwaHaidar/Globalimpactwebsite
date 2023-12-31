<?php 
include("connDatabase/connection.php");
session_start();

if(isset($_POST['send_message'])){

    $message = mysqli_real_escape_string($connection, $_POST['message']);
    $userId = $_SESSION['auth_user']['userid']; 


    $query = $connection->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
    $query->bind_param("is", $userId, $message);
    $query->execute();
    $query->close();
    
    // Set a session variable to indicate successful message submission
    // $_SESSION['message_sent'] = true;
    // Redirect back to the "Contact Us" page
    header("Location: contactus.php");
    exit(); // Ensure that the script stops executing after the header is sent

}



?>
