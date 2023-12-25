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
            if($row['verify_status'] == '1' && password_verify($enteredPassword, $row['password'])) {
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