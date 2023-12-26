<?php
include './connDatabase/Connection.php';

echo '<div id="searchpage">';

if (isset($_POST['search'])) {
    $searchTerm = strtoupper($_POST['search']);

    $sqlSearch = "
        SELECT DISTINCT user.First_name, user.last_name, user.user_id
        FROM userposts
        INNER JOIN profile ON userposts.user_id = profile.user_id
        INNER JOIN user ON userposts.user_id = user.user_id
        WHERE UPPER(user.First_name) LIKE '%{$searchTerm}%'
        OR UPPER(user.last_name) LIKE '%{$searchTerm}%'
        ORDER BY userposts.created_at DESC
    ";

    $resultSearch = mysqli_query($connection, $sqlSearch);

    while ($data = mysqli_fetch_assoc($resultSearch)) {
        // Display the distinct first names and last names as links
        echo '<a href="SearchpostsUsers.php?user_id=' . $data['user_id'] . '">';
        echo $data['First_name'] . ' ' . $data['last_name'];
        echo '</a>';
        echo '<br>';    
    }
}

echo '</div>';
?>

