<?php
include("../connDatabase/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function  sendpasswordreset($getname,$getemail,$token) {
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
    $mail->addAddress($getemail);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body = "Hello $getname, click the following link to verify your email: <a href='http://localhost/Globalimpactwebsite/LogIn-SignUp-forgget/password_change.php?token=$token&email=$getemail'>Verify Email</a>";
    
    // Display errors
    try {
        $mail->send();
        $_SESSION['status']="check your email";
            header("Location:ForgotPassword.php?message=check your email");
            exit(0);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}




if(isset($_POST['password-reset-link-btn'])){
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $token=md5(rand());
    $check_email="SELECT * from user where email ='$email' limit 1";
    $check_email_run=mysqli_query($connection,$check_email);
    if(mysqli_num_rows($check_email_run)>0){
        $row=mysqli_fetch_array($check_email_run);
        $getname=$row['user_name'];
        $getemail=$row['email'];

       
        $update_token="UPDATE user set verify_token='$token' where email='$getemail' limit 1";
        $update_token_run=mysqli_query($connection,$update_token);
        if($update_token_run){
            sendpasswordreset($getname,$getemail,$token);
        }
        else{
            $_SESSION['status']="Something went wrong";
            header("Location:ForgotPassword.php");
            exit(0);
        }

    }
    else{
        $_SESSION['status']="NO email Found";
        header("Location:ForgotPassword.php");
        exit(0);
    }
}

//* -----------------------------------------------password_change.php------------------------------------------------------------------------------*/


if(isset($_POST['password_update'])){
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $new_password=mysqli_real_escape_string($connection,$_POST['password']);
    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
    $confirmed_pass=mysqli_real_escape_string($connection,$_POST['confirmpass']);
    $token=$_POST['password_token'];
    

    if(!empty($token)){
        if(!empty($email) || !empty($new_password) || !empty($confirmed_pass))
        {   //check token is valid or not
            $check_token="SELECT verify_token from user where verify_token='$token'limit 1";
            $check_token_run=mysqli_query($connection,$check_token);
            if(mysqli_num_rows($check_token_run)>0){

                if($new_password==$confirmed_pass){

                    $update_pass="UPDATE user set password='$hashed_new_password' where verify_token='$token' limit 1";
                    $update_pass_run=mysqli_query($connection,$update_pass);
                    if($update_pass_run){
                        $_SESSION['status']="Password updated Successfully!";
                        header("Location:LogIn.php?message=Password updated Successfully!");
                        exit(0);

                    }
                    else{
                        $_SESSION['status']="Did't update password something went wrong!";
                        header("Location:password_change.php?message=Did't update password something went wrong!");
                        exit(0);
                    }




                }
                else{
                    $_SESSION['status']="Password and confirm password don't match";
                header("Location:password_change.php?token=$token&email=$email&message=Password and confirm password don't match");
                exit(0);
                }
            }
            else{
                $_SESSION['status']="Invalid token";
                header("Location:password_change.php?token=$token&email=$email&?message=Invalid token");
                exit(0);

            }



        }
        else{
            $_SESSION['status']="All fields are Mendatory!";
            header("Location:password_change.php?token=$token&email=$email&?message=All fields are Mendatory!");
            exit(0);
        }


    }
    else{
        $_SESSION['status']="NO token available";
        header("Location:password_change.php");
        exit(0);

    }


}

































?>