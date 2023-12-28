<?php
session_start();
include("connDatabase/connection.php");

if (isset($_POST['submitWrite_comment'])) {
    $postIdWrite_comment = $_POST['userpost_id'];
    $userIdWrite_comment = $_SESSION['auth_user']['userid'];
    $commentContent = $_POST['comment_' . $postIdWrite_comment];

    if (!empty($commentContent)) {
        $sqlCommentInsert = "INSERT INTO comment (post_id, user_id, content) VALUES (?, ?, ?)";

        $stmtComment = $connection->prepare($sqlCommentInsert);
        $stmtComment->bind_param("iis", $postIdWrite_comment, $userIdWrite_comment, $commentContent);
        $stmtComment->execute();

        if ($stmtComment->affected_rows > 0) {
            // Successful comment insertion
            $response = array('status' => 'success');
            echo json_encode($response);
            exit();
        } else {
            // Error in query
            $response = array('status' => 'error', 'message' => 'Error in query');
            echo json_encode($response);
            exit();
        }
    } else {
        // Empty comment content
        $response = array('status' => 'error', 'message' => 'Comment content is empty');
        echo json_encode($response);
        exit();
    }
}

// Default response if no valid data is received
$response = array('status' => 'error', 'message' => 'Invalid request');
echo json_encode($response);
?>
