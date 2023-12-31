<?php
include("../connDatabase/connection.php");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../LogIn-SignUp-forgget/vendor/autoload.php';

function sendemail_greeting($username, $userEmail) {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'globalimpactglobalimpact@gmail.com';
    $mail->Password = 'hubi ltcu olxs tmli';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('globalimpactglobalimpact@gmail.com', 'Global Impact');
    $mail->addAddress($userEmail);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body = "Hello $username, Happy Birthday";

    // Display errors
    try {
        $mail->send();
        echo "Message has been sent";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'])) {
    $userid = $_POST['userId'];

    // Fetch the user's email address from the database
    $userEmail = getUserEmailById($connection, $userid);

    if ($userEmail) {
        // Fetch the user's name from the database (you need to implement this function)
        $username = getUserNameById($connection, $userid);

        if ($username) {
            // Send the email
            sendemail_greeting($username, $userEmail);

            // Redirect back to index.php with success message
            header("Location: index.php?success=1&message=Email sent successfully");
            exit;
        } else {
            header("Location: index.php?success=0&message=Error: User name not found");
            exit;
        }
    } else {
        header("Location: index.php?success=0&message=Error: User email not found");
        exit;
    }

    // Close the database connection
    mysqli_close($connection);
}


// Function to fetch user name from the database based on user ID
function getUserNameById($connection, $userid) {
    // Use a prepared statement to prevent SQL injection
    $namequery = "SELECT user_name FROM user WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $namequery);
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userName);
    
    // Fetch the result
    if (mysqli_stmt_fetch($stmt)) {
        // Close the statement
        mysqli_stmt_close($stmt);

        return $userName;
    } else {
        // Close the statement
        mysqli_stmt_close($stmt);

        return false;
    }
};


// Function to fetch user email from the database based on user ID
function getUserEmailById($connection,$userid) {
    // Use a prepared statement to prevent SQL injection
    $query = "SELECT email FROM user WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userEmail);

    // Fetch the result
    if (mysqli_stmt_fetch($stmt)) {
        // Close the statement
        mysqli_stmt_close($stmt);

        return $userEmail;
    } else {
        // Close the statement
        mysqli_stmt_close($stmt);

        return false;
    }
}



?>

