<?php
include("../connDatabase/connection.php");

if (isset($_POST['selectedYear'])) {
    $selectedYear = $_POST['selectedYear'];

    // Assuming your database connection is established
   

    $query = "SELECT MONTH(created_at) as month, COUNT(userpost_id) as post_count
              FROM userposts
              WHERE YEAR(created_at) = '$selectedYear'
              GROUP BY MONTH(created_at)
              ORDER BY month";

    $query_run = mysqli_query($connection, $query);
    $monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    $postcount = [];

    while ($row = mysqli_fetch_assoc($query_run)) {
        $month[] = $monthNames[$row['month'] - 1]; // Subtract 1 to get the correct index in the monthNames array
       
        $postcount[] = $row['post_count'];
    }

    // Prepare the data as an associative array
    $chartData = [
        'months' => $month,
        'postCounts' => $postcount,
    ];

    // Return the data as JSON
    echo json_encode($chartData);

    mysqli_close($connection);
}
?>
