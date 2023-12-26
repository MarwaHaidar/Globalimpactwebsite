<?php include("../connDatabase/connection.php");
session_start();  


// Function definition
function formatTime($seconds) {
    $intervals = array(
        'year' => 31536000,
        'month' => 2592000,
        'week' => 604800,
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1
    );

    foreach ($intervals as $name => $duration) {
        $quotient = floor($seconds / $duration);
        if ($quotient > 0) {
            return $quotient . ' ' . $name . ($quotient > 1 ? 's' : '') . ' ago';
        }
    }

    // If we reach here, it means the time is within the last second
    return 'just now';
}



// Fetch the latest messages from the database
$query = "SELECT messages.message, user.First_name, messages.time
          FROM messages
          LEFT JOIN user ON messages.user_id = user.user_id
          ORDER BY messages.time DESC
          LIMIT 10"; // Limit the number of messages returned
$result = mysqli_query($connection, $query);

if ($result) {
    // Generate HTML for the latest messages
    while ($row = mysqli_fetch_assoc($result)) {
        $formatted_time = formatTime(strtotime($row['time'])); 
        // Assuming formatTime function is defined

        echo "<div class='d-flex align-items-center border-bottom py-3'>";
        echo "<img class='rounded-circle flex-shrink-0' src='img/user.jpg' alt='' style='width: 40px; height: 40px;'>";
        echo "<div class='w-100 ms-3'>";
        echo "<div class='d-flex w-100 justify-content-between'>";
        echo "<h6 class='mb-0 bg-dark content-container'>" . $row['First_name'] . "</h6>";
        echo "<small>" . $formatted_time . "</small>";
        echo "</div>";
        echo "<span style='overflow-x:hidden;'>" . $row['message'] . "</span>";
        echo "</div>";
        echo "</div>";
    }

    // Free result set
    mysqli_free_result($result);
} else {
    echo "Error fetching messages: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>






































?>