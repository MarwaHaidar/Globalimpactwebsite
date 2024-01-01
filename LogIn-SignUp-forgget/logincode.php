<?php 
session_start();
include("../connDatabase/connection.php");


if(isset($_POST['login_now_btn'])) {

    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $enteredPassword = mysqli_real_escape_string($connection, $_POST['password']);

        // This is to prevent SQL injection before touching the database
        $login_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
        $login_query_run = mysqli_query($connection, $login_query);

        if(mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);
            if($row['verify_status'] == '1' && password_verify($enteredPassword, $row['password']) && ($row['status_id'] == '1')) {
                $_SESSION['authenticated'] = TRUE;
                $_SESSION['auth_user'] = [
                    'userid'=>$row['user_id'],
                    'username' => $row['user_name'],
                    'firstname'=>$row['First_name'],
                    'lastname'=>$row['last_name'],
                    'phone' => $row['phone'],
                    'email' => $row['email'],
                    'role'=>$row['Role']
                ];
                
                $id =  $_SESSION['auth_user']['userid'];
                $pubId = 'dulmtpfioxvwf6fyyc8r';
                 if($row['Role']=='user'&& $row['verify_status'] == '1'){
                    $select_query = "SELECT user_id FROM profile WHERE user_id='$id'";
                    $select_query_run = mysqli_query($connection, $select_query);
                    if (mysqli_num_rows($select_query_run) == '0'){
                        $insert_query = "INSERT INTO profile(user_id,profile_photo,cover_photo) VALUES('$id','$pubId','$pubId')";
                        $insert_query_run = mysqli_query($connection, $insert_query);

                    }
                 }

                // if($row['Role']=='user'&& $row['verify_status'] == '1'){
                //     $_SESSION['users']=[
                //         'username'=>$row['user_name']
                //     ];

                // }
                $redirectPage = ($row['Role'] == "admin") ? "../adminpage.php" : "../userpage.php";
                $_SESSION['status'] = "You are Logged In Successfully!";
                header("Location: $redirectPage");
                exit();
            } else {
                $_SESSION['status'] = "Invalid email or password";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Invalid email or password";
            header("Location: login.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "All Fields are Mandatory";
        header("Location: login.php");
        exit(0);
    }
}
?>
