<?php
include("../connDatabase/connection.php");
session_start();

// Initialize the session variable as an empty array if not set
// if (!isset($_SESSION['greetings'])) {
//     $_SESSION['greetings'] = [];
// }

if (isset($_POST['selectedDate'])) {
    // Get the selected date from the AJAX request
    $selectedDate = $_POST['selectedDate'];
    $selectuser = "SELECT user.First_name, user.last_name, user.user_name, profile.location, profile.birthdate
                   FROM user
                   INNER JOIN profile ON user.user_id = profile.user_id
                   WHERE profile.birthdate = '$selectedDate'";
    $selectuser_run = mysqli_query($connection, $selectuser);

    // Collect user data in an array
    $userDataArray = [];

    if(mysqli_num_rows($selectuser_run) > 0){
        while($row = mysqli_fetch_assoc($selectuser_run)){
            $firstn = $row['First_name'];
            $lastn = $row['last_name'];
            $usern = $row['user_name'];
            $location = $row['location'];
            $birthdate = $row['birthdate'];

            // Store each set of values as an array
            $userData = [
                'firstn' => $firstn,
                'lastn' => $lastn,
                'usern' => $usern,
                'location' => $location,
                'birthdate' => $birthdate,
            ];

            // Add the user data to the array
            $userDataArray[] = $userData;
        }
    }

    // Encode the entire array as JSON and echo the result
    echo json_encode($userDataArray);
}
?>



