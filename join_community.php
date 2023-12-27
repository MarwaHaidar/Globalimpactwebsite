<?php
session_start();
include("connDatabase/connection.php");
require 'vendor/autoload.php';

if (isset($_POST['communityId'])) {
    $communityId = $_POST['communityId'];
    $userId = $_SESSION['auth_user']['userid'];

    // Check if the user has already joined
    $sqlCheckJoin = "SELECT id FROM user_community WHERE user_id = ? AND community_id = ?";
    $stmtCheckJoin = mysqli_prepare($connection, $sqlCheckJoin);
    mysqli_stmt_bind_param($stmtCheckJoin, 'ii', $userId, $communityId);
    mysqli_stmt_execute($stmtCheckJoin);
    mysqli_stmt_store_result($stmtCheckJoin);

    if (mysqli_stmt_num_rows($stmtCheckJoin) == 0) {
        // User has not joined, proceed with joining
        $sqlUpdateCount = "UPDATE community SET followers = followers + 1 WHERE com_id = ?";
        $stmtUpdateCount = mysqli_prepare($connection, $sqlUpdateCount);
        mysqli_stmt_bind_param($stmtUpdateCount, 'i', $communityId);
        $resultUpdateCount = mysqli_stmt_execute($stmtUpdateCount);

        if ($resultUpdateCount) {
            // Insert a record in user_community table to indicate the user has joined
            $sqlInsertUserCommunity = "INSERT INTO user_community (user_id, community_id) VALUES (?, ?)";
            $stmtInsertUserCommunity = mysqli_prepare($connection, $sqlInsertUserCommunity);
            mysqli_stmt_bind_param($stmtInsertUserCommunity, 'ii', $userId, $communityId);
            mysqli_stmt_execute($stmtInsertUserCommunity);

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error updating community count.']);
        }
    } else {
        // User has already joined
        echo json_encode(['status' => 'already_joined', 'message' => 'User has already joined this community.']);

    }

}
?>
