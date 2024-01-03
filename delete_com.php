<?php
include './connDatabase/Connection.php';
?> 
<?php
// update bio

// Check if the request method is POST and the necessary data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Use json_decode to get the data from the request body
     $json = json_decode(file_get_contents('php://input'));

     // Sanitize and validate input data
     $comId = mysqli_real_escape_string($connection, $json->comId);

    // Update the bio in the database
    $updateQuery = "DELETE FROM community WHERE com_id = '$comId' ";

    if ($connection->query($updateQuery) === TRUE) {
            // Send JSON response with result
         header('Content-Type: application/json');
         echo json_encode([
             "status" => "success",
             "message" => "community deleted successfully"
         ]);
         exit;
  
     } else {
         // Error fetching updated counts
         echo json_encode(["status" => "error", "message" => "Error fetching delete: " . mysqli_error($connection)]);
         exit;
     }
 } else {
     // Error in the update query
     echo json_encode(["status" => "error", "message" => "Error delete community: " . mysqli_error($connection)]);
     exit;
 }
?>