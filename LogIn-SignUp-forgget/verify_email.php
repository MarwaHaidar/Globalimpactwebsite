<?php
session_start();
 include("../connDatabase/connection.php");

if(isset($_GET['token'])){
    $token=$_GET['token'];
    $verify_tokens="SELECT * from user where verify_token='$token' limit 1";
    $verify_token_run= mysqli_query($connection,$verify_tokens);

    if(mysqli_num_rows($verify_token_run)>0){
        $row=mysqli_fetch_array($verify_token_run);
        if($row['verify_status']=='0'){
            $clicked_token=$row['verify_token'];
            $update_query="UPDATE user set verify_status='1' where verify_token='$clicked_token' limit 1";
            $update_query_run=mysqli_query($connection,$update_query);
            if($update_query_run){
                $_SESSION['status']="Your account has been verified successfully";
                header("Location:LogIn.php");

            }
            else{
                $_SESSION['status']="Verification Failed!!";
                header("Location:LogIn.php");

            }


        }
        else{
            $_SESSION['status']="Email already verified, Please Login";
            header("Location:LogIn.php");
            exit(0);
        }
    }
    else{
        $_SESSION['status']="This token doesn't Exist";
        header("Location:LogIn.php");

    }
}
else{
    $_SESSION['status']="Not Allowed";
    header("Location:LogIn.php");
}













?>