<?php
 include("../connDatabase/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendemail_verify($username, $email, $verify_token) {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug =0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'globalimpactglobalimpact@gmail.com';
    $mail->Password = 'hubi ltcu olxs tmli';
    $mail->SMTPSecure = 'tls';




    $mail->Port = 587;

    $mail->setFrom('globalimpactglobalimpact@gmail.com', 'Global Impact');
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body = "Hello $username, click the following link to verify your email: <a href='http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/verify_email.php?token=$verify_token'>Verify Email</a>";
    
    // Display errors
    try {
        $mail->send();
        echo "Message has been sent";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}




if(isset($_POST["signup_btn"])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $confirmpassword=$_POST['confirmPassword'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    // $role=$_POST['Role'];
    // $confirm_password=$_POST['confirm_password'];
    $verify_token = md5(rand());


     // Data validation
     if (empty($username)  || empty($email) || empty($password) || empty($confirmpassword)  || empty($firstname) || empty($lastname)) {
        $_SESSION['status'] = "All fields are required";

        header("Location: http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/SignUp.php?message=All fields are required");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Invalid email format";
       
        header("Location: http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/SignUp.php?message=Invalid email format");
        exit();
    }
     // Validate password length and complexity
     if (strlen($password) < 6 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $_SESSION['status'] = "Password must be at least 6 characters and include both letters and numbers";
        
        header("Location: http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/SignUp.php?message=Password must be at least 6 characters and include both letters and numbers");
        exit();
    }

    if($password != $confirmpassword){
        $_SESSION['status']="Password and confirm password don't match";
        header("Location:http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/SignUp.php?message=Password and confirm password don't match");
        exit();
    }




    //check email existance:
    $query="SELECT * from user where email='$email' limit 1";
    $query_run=mysqli_query($connection,$query);
    
    if(mysqli_num_rows($query_run)>0){
        $_SESSION['status']="Email Address Already Exists";
        header("Location: http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/SignUp.php?message=Email address already exists");
        exit();
    }
    else{
        $query = "INSERT into user (user_name,First_name,last_name, email, password,verify_token) values (?, ?,?,?, ?, ?)";

        $stmt=mysqli_prepare($connection,$query);

        if($stmt){
            mysqli_stmt_bind_param($stmt, "ssssss", $username,$firstname,$lastname, $email, $hashed_password,$verify_token);

            $query_run =mysqli_stmt_execute($stmt);
            if ($query_run) {
                $_SESSION['status'] = "Registration successful! Please verify your email address";
                header("Location: http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/SignUp.php?message=Registration successful! Please verify your email address");
                sendemail_verify($username, $email, $verify_token);
                exit(); // Exit after successful registration
            } else {
                $_SESSION['status'] = "Registration failed";
                header("Location: http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/SignUp.php?message=Registration failed");
                exit(); // Exit if registration fails
            }
    
            // Close the statement
            mysqli_stmt_close($stmt);
        }
        else {
            echo "Error preparing statement: " . mysqli_error($connection);
        }
         // Close the database connection
         mysqli_close($connection);
        
    }
     
}