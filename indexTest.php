<?php
include './connDatabase/Connection.php';

$sql = 'SELECT * FROM user';

$resultVariable =  mysqli_query($conn, $sql);

if (!$resultVariable) {
    die("Error in SQL query: " . mysqli_error($conn));
}

$usersVariable = mysqli_fetch_all($resultVariable, MYSQLI_ASSOC);

mysqli_free_result($resultVariable);
mysqli_close($conn);
?>

<?php foreach ($usersVariable as $userVa): ?>
    <div class="col-6">
        <div class="card my">
            <div class="card-body">
                <h1><?php echo htmlspecialchars($userVa['First_name']); ?></h1>
                <p><?php echo htmlspecialchars($userVa['last_name']); ?></p>
            </div>
        </div>
    </div>

   
<?php endforeach; ?>
