<?php
// session_start();
// include("connDatabase/connection.php");


// require 'vendor/autoload.php';

// if (isset($_POST['communityId'])) {
//     $communityId = $_POST['communityId'];
//     $userId = $_SESSION['auth_user']['userid'];

//     // Check if the user has already joined
//     $sqlCheckJoin = "SELECT id FROM user_community WHERE user_id = $userId AND community_id = $communityId";
//     $resultCheckJoin = mysqli_query($connection, $sqlCheckJoin);

//     if (mysqli_num_rows($resultCheckJoin) == 0) {
//         // User has not joined, proceed with joining
//         $sqlUpdateCount = "UPDATE community SET followers = followers + 1 WHERE com_id = $communityId";
//         $resultUpdateCount = mysqli_query($connection, $sqlUpdateCount);

//         if ($resultUpdateCount) {
//             // Insert a record in user_community table to indicate the user has joined
//             $sqlInsertUserCommunity = "INSERT INTO user_community (user_id, community_id) VALUES ($userId, $communityId)";
//             mysqli_query($connection, $sqlInsertUserCommunity);

//             echo 'success';
//         } else {
//             echo 'error';
//         }
//     } else {
//         // User has already joined
//         echo 'already_joined';
//     }
// }

?>