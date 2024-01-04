<?php include("../connDatabase/connection.php");
session_start(); 
if (isset($_POST['deleteUserId'])) {
    $deleteUserId = $_POST['deleteUserId'];

    // Perform the deletion
    $deleteUserQuery = "DELETE FROM user WHERE user_id = '$deleteUserId'";
    $result = mysqli_query($connection, $deleteUserQuery);

    if ($result) {
        // Redirect back to the same page after deletion
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($connection);
    }
}
if(isset($_POST['banUserId'])){
    $banUserId=$_POST['banUserId'];

    $banuserquery="UPDATE user set status_id='0' where user_id='$banUserId'";
    $banresult=mysqli_query($connection,$banuserquery);
    if($banresult){
        header("Location:index.php");
        exit();
    }
    else{
        echo "Error banning user: ".mysqli_error($connection);
    }
};
if(isset($_POST['unbanUserId'])){
    $unbanUserId=$_POST['unbanUserId'];

    $unbanuserquery="UPDATE user set status_id='1' where user_id='$unbanUserId'"; 
    $unbanresult=mysqli_query($connection,$unbanuserquery);
    if($unbanresult){
        header("Location:index.php");
        exit();
    }
    else{
        echo "Error unbanning user: ".mysqli_error($connection);
    }
}


$sql="SELECT * from user where status_id='0'";
$sql_run = mysqli_query($connection, $sql);

// Fetch the latest user data
$selectUserQuery = "SELECT * FROM user";
$selectUserResult = mysqli_query($connection, $selectUserQuery);

?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@5.3.1/font/bootstrap-icons.css" rel="stylesheet"> -->
      <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@5.3.1/font/bootstrap-icons.css"> -->
      
      

  

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <!-- --------------------------------------------------------------------------------------------------------- -->
        <?php
$userid = $_SESSION['auth_user']['userid'];
$profilequery = "SELECT profile.profile_photo FROM profile INNER JOIN user ON user.user_id = profile.user_id WHERE user.user_id = $userid";
$profilequery_run = mysqli_query($connection, $profilequery);

if (mysqli_num_rows($profilequery_run) > 0) {
    while ($row = mysqli_fetch_assoc($profilequery_run)) {
        $profile = $row['profile_photo'];
    }
    $cloudinaryImageUrl = 'https://res.cloudinary.com/dbete4djx/image/upload/' . $profile;
}
?>   
        <!-- ------------------------------------------------------------------------------------------------------ -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar ">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Global Impact</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo $cloudinaryImageUrl ;?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['auth_user']['firstname'].$_SESSION['auth_user']['lastname']?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                   
                    <a href="../adminpage.php" class="nav-item nav-link"><i class="fa-solid fa-eye"></i>View Posts</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item colorAllContent ">Sign In</a>
                            <a href="signup.html" class="dropdown-item colorAllContent">Sign Up</a>
                
                        </div>
                    </div> -->
                    <div class="theme-switch nav-item nav-link">
                        <span class="nav__name">Dark mode</span>
                        <input type="checkbox" id="toggle-switch" onclick="toggleMode()">
                        <label for="toggle-switch"></label>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
      /  <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  sticky-top px-4 py-0 ">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
              
                 <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2  colorIconNav"></i>
                            <span class="d-none d-lg-inline-flex ">Message</span>
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <!-- <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Rayan send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a> -->
                            <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Marwa send you a message</h6>
                                        <small>16 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider"> -->
                            <!-- <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">ahmad send you a message</h6>
                                        <small>18 minutes ago</small>
                                    </div>
                                </div>
                            </a> -->
                            <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a> -->
                        </div>
                    </div> 
                     <div class="nav-item dropdown">
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2  colorIconNav"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a> -->
                        <!-- <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div> -->
                    </div> 
<!-- ---------------------------------------admin profile----------------------------------------------------------------------------------------------- -->

<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php echo $cloudinaryImageUrl ;?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['auth_user']['firstname'].$_SESSION['auth_user']['lastname']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../LogIn-SignUp-forgget/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
<!-- -------------user number card-------------------------------------------------------------------------------------------------------------------- -->
            <?php
$numuser = "SELECT count(user_id) AS user_count FROM user";
$numuser_run = mysqli_query($connection, $numuser);

if (mysqli_num_rows($numuser_run) > 0) {
    while ($row = mysqli_fetch_assoc($numuser_run)) {
        $count = $row['user_count'];
    }
}
?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4 ">
                <div class="row g-4" style="display: flex; justify-content: space-between"  >
                    <div class="col-sm-6 col-xl-2"  >
                        <div style="height: 100%;" class=" rounded d-flex align-items-center justify-content-between p-4 colorAllContent">
                            <i class="fa-solid fa-users fa-3x text-primary"></i>
                            <div class="ms-3" style=" width: 100%;">
                                <p class="mb-2 colorAllContent">Nb. Of Users</p>
                                <h6 class="mb-0 colorAllContent"><?php echo $count   ?></h6>
                            </div>
                        </div>
                    </div>
<!----------- -------------------------------------community number card----------------------------------------------- --------------------------------->


                    <?php 
                    $numcom="SELECT count(com_id) as com_count from community";
                    $numcom_run=mysqli_query($connection,$numcom);
                    if(mysqli_num_rows($numcom_run)>0){
                        while($row=mysqli_fetch_assoc($numcom_run)){
                            $com_count=$row['com_count'];
                        }
                    }
                         ?>
                    <div class="col-sm-6 col-xl-2">
                        <div style="height: 100%;" class=" rounded d-flex align-items-center justify-content-between p-4 colorAllContent">
                            <i class="fa-solid fa-users-viewfinder fa-3x text-primary"></i>
                            <div class="ms-3" style=" width: 100%;">
                                <p class="mb-2 colorAllContent">Nb. Of  Communities</p>
                                <h6 class="mb-0 colorAllContent"><?php echo $com_count  ?></h6>
                            </div>
                        </div>
                    </div>
<!-- --------------------------------------------------------number of actions card-------------------------------------------------------------------------------------------- -->

                    <?php
         $num_actions="SELECT count(id) as action_count from actions";
         $num_actions_run=mysqli_query($connection,$num_actions);
         if(mysqli_num_rows($num_actions_run)>0){
            while($row=mysqli_fetch_assoc($num_actions_run)){
                $num_actions=$row['action_count'];
            }
         }

?>
                    <div class="col-sm-6 col-xl-2">
                        <div style="height: 100%;" class=" rounded d-flex align-items-center justify-content-between p-4 colorAllContent">
                            <i class="fa-solid fa-arrow-pointer fa-3x text-primary"></i>
                            <div class="ms-3" style=" width: 100%;">
                                <p class="mb-2 colorAllContent">Total Actions</p>
                                <h6 class="mb-0 colorAllContent"><?php echo $num_actions  ?></h6>
                            </div>
                        </div>
                    </div>
<!------------------------------------------------number of posts card------------------------------------------------------------------------------------------------------- -->
                    <?php
         $num_posts="SELECT count(userpost_id) as posts_count from userposts";
         $num_posts_run=mysqli_query($connection,$num_posts);
         if(mysqli_num_rows($num_posts_run)>0){
            while($row=mysqli_fetch_assoc($num_posts_run)){
                $num_posts=$row['posts_count'];
            }
         }

?>


  
                    <div class="col-sm-6 col-xl-2">
                        <div style="height: 100%;" class=" rounded d-flex align-items-center justify-content-between p-4 colorAllContent">
                            <i class="fa-regular fa-clone fa-3x text-primary"></i>
                            <div class="ms-3" style=" width: 100%;">
                                <p class="mb-2 colorAllContent">Nb. Of Posts</p>
                                <h6 class="mb-0 colorAllContent"><?php echo $num_posts  ?></h6>
                            </div>
                        </div>
                    </div>

<!-- ------------------------------------number of banned users--------------------------------------------------------------------------------------------------------------- -->

                    <?php
         $num_ban="SELECT count(user_id) as ban_count from user where status_id='0'";
         $num_ban_run=mysqli_query($connection,$num_ban);
         if(mysqli_num_rows($num_ban_run)>0){
            while($row=mysqli_fetch_assoc($num_ban_run)){
                $num_banned=$row['ban_count'];
            }
         }

?>
                    <div class="col-sm-6 col-xl-2">
                        <div style="height: 100%;" class=" rounded d-flex align-items-center justify-content-between p-4 colorAllContent">
                            <i class="fa-solid fa-user-slash fa-3x text-primary"></i>
                            <div class="ms-3" style=" width: 100%;">
                                <p class="mb-2 colorAllContent">Nb. Of Banned Users</p>
                                <h6 class="mb-0 colorAllContent"><?php echo $num_banned  ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
<!-- ----------------------------charts----------------------------------------------------------------------------------------------------------------------- -->
<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4  ">
                <div class="row g-4 ">
            
<!------------------------------------- UPVOTE AND DOWNVOTE LINE CHART------------------------------------------------------------------------------ -->
                    <div class="col-sm-6 col-xl-6  ">
                      
                        <div class="bg-light text-center rounded p-4 bg-dark content-container" >
                            <div class="d-flex align-items-center justify-content-between mb-4 ">
                                <h6 class="mb-0 bg-dark content-container">UPVOTE & DOWNVOTE</h6>
                                
                            </div>
                            <canvas id="Upvote-DownvoteID"></canvas>
                        </div>
                    </div>
                        <script>
                            <?php
                          
                          
                            $chartresult1=$connection->query( "SELECT
                            YEAR(created_at) AS year,
                            SUM(CASE WHEN action_id = '1' THEN 1 ELSE 0 END) AS upvote_count,
                            SUM(CASE WHEN action_id = '2' THEN 1 ELSE 0 END) AS downvote_count
                        FROM
                            actions
                        GROUP BY
                            YEAR(created_at)");

                            $year=[];
                            $upvoteData=[];
                            $downvoteData=[];

                            while($row=$chartresult1->fetch_assoc()){
                                $year[]=$row['year'];
                                $upvoteData[]=$row['upvote_count'];
                                $downvoteData[]=$row['downvote_count'];
                            };
                        
                            
                            ?> 
                            console.log("Year:", <?php echo json_encode($year); ?>);
                            console.log("Upvote Data:", <?php echo json_encode($upvoteData); ?>);
                            console.log("Downvote Data:", <?php echo json_encode($downvoteData); ?>);
                            $(document).ready(function () {
                            var ctx2 = $("#Upvote-DownvoteID").get(0).getContext("2d");

                            var mychart2 = new Chart(ctx2, {
                                type: "line",
                                data: {
                                    labels: <?php echo json_encode($year); ?>,
                                    datasets: [{
                                        label: "Upvote",
                                        data: <?php echo json_encode($upvoteData); ?>,
                                        backgroundColor: "rgba(0, 156, 255, .2)",
                                        fill: true
                                    }, {
                                        label: "Downvote",
                                        data: <?php echo json_encode($downvoteData); ?>,
                                        backgroundColor: "rgba(0, 156, 255, .7)",
                                        fill: true
                                    }]
                                },
                                options: {
                                    responsive: true
                                }
                            });
                        });


                        </script>
                       
<!--  -------------------------------------------Active and banned users----------------------------------------------------------------------------------------------------------->
            
                    <!-- Second Column -->
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light text-center rounded p-4 bg-dark content-container" >
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 bg-dark content-container"> Activate and Deactivate Users</h6>
                                
                            </div>
                            <canvas id="ActivateUsersId"></canvas>
                        </div>
                    </div>
                    <script>
                       <?php
                        $chartresult2 = $connection->query("SELECT
                            YEAR(Date) as year,
                            SUM(case when status_id='1' then 1 else 0 end) as activeusers,
                            SUM(case when status_id='0' then 1 else 0 end) as bannedusers
                            FROM user
                            GROUP BY YEAR(Date)");

                        $years = [];
                        $activeUsers = [];
                        $bannedUsers = [];

                        while ($row = $chartresult2->fetch_assoc()) {
                            $years[] = $row['year'];
                            $activeUsers[] = $row['activeusers'];
                            $bannedUsers[] = $row['bannedusers'];
                        }
                        ?>

                        
                            $(document).ready(function () {
                                var ctx1 = $("#ActivateUsersId").get(0).getContext("2d");

                                var mychart2 = new Chart(ctx1, {
                                    type: "bar",
                                    data: {
                                        labels: <?php echo json_encode($years); ?>,
                                        datasets: [{
                                            label: "Active Users",
                                            data: <?php echo json_encode($activeUsers); ?>,
                                            backgroundColor: "rgba(0, 156, 255, .2)",
                                            fill: true
                                        }, {
                                            label: "Banned Users",
                                            data: <?php echo json_encode($bannedUsers); ?>,
                                            backgroundColor: "rgba(0, 156, 255, .7)",
                                            fill: true
                                        }]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                });
                            });
                        </script>
                        </div>
                        

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="row g-4 ">
 <!-- Third Column -->
 <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4 bg-dark content-container" >
                            <h6 class="mb-4 bg-dark content-container"></h6>
                            <canvas id="CountryId"></canvas>
                        </div>
                    </div>
                    <?php
                            $chartresult3 = $connection->query("SELECT
                                Location,
                                COUNT(user_id) as userscount
                                FROM profile
                                GROUP BY Location");

                            $location = [];
                            $users = [];

                            while ($row = $chartresult3->fetch_assoc()) {
                                $location[] = $row['Location'];
                                $users[] = $row['userscount'];
                            }
                            ?>

                            <script>
                                $(document).ready(function () {
                                    var ctx3 = $("#CountryId").get(0).getContext("2d");

                                    var mychart3 = new Chart(ctx3, {
                                        type: "bar",
                                        data: {
                                            labels: <?php echo json_encode($location); ?>,
                                            datasets: [{
                                                label: "Number of Users",
                                                data: <?php echo json_encode($users); ?>,
                                                backgroundColor: [
                                                    "rgba(0, 156, 255, .7)",
                                                    "rgba(0, 156, 255, .6)",
                                                    "rgba(0, 156, 255, .5)",
                                                    "rgba(0, 156, 255, .4)",
                                                    "rgba(0, 156, 255, .3)"
                                                ],
                                                fill: true
                                            }]
                                        },
                                        options: {
                                            responsive: true
                                        }
                                    });
                                });
                            </script>


<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<div class="col-sm-12 col-xl-4">
    <div class="bg-light text-center rounded p-4 bg-dark content-container max-height-50 ">
        <h6 class="mb-4 bg-dark content-container"></h6>
        <canvas id="doughnut-chart" width="400" height="50"></canvas>
    </div>
</div>
<?php
$chartresult3 = $connection->query("SELECT
CASE
    WHEN FLOOR(DATEDIFF(CURDATE(), birthdate) / 365.25) BETWEEN 18 AND 25 THEN '18-25'
    WHEN FLOOR(DATEDIFF(CURDATE(), birthdate) / 365.25) BETWEEN 26 AND 35 THEN '26-35'
    WHEN FLOOR(DATEDIFF(CURDATE(), birthdate) / 365.25) BETWEEN 36 AND 45 THEN '36-45'
    WHEN FLOOR(DATEDIFF(CURDATE(), birthdate) / 365.25) BETWEEN 46 AND 55 THEN '46-55'
    WHEN FLOOR(DATEDIFF(CURDATE(), birthdate) / 365.25) >= 56 THEN '56+'
    ELSE 'Unknown'
END AS AgeGroup,
COUNT(user_id) as userscount
FROM profile
GROUP BY AgeGroup");

$ageGroup = [];
$userss = [];

while ($row = $chartresult3->fetch_assoc()) {
    $ageGroup[] = $row['AgeGroup'];
    $userss[] = $row['userscount'];
}


?>

<script>
     $(document).ready(function () {
        var ctx6 = $("#doughnut-chart").get(0).getContext("2d");

        var myChart6 = new Chart(ctx6, {
            type: "doughnut",
            data: {
                labels: <?php echo json_encode($ageGroup); ?>,
                datasets: [{
                    backgroundColor: [
                        "rgba(0, 156, 255, .7)",
                        "rgba(0, 156, 255, .2)",
                        "rgba(0, 156, 255, .9)",
                        "rgba(0, 156, 255, .4)",
                        "rgba(0, 156, 255, .3)"
                    ],
                    data: <?php echo json_encode($userss); ?>,
                    fill: true // Move the fill property here
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>







                        </div>
<!-- ----------------------------------------------------------------------------------------------------------------- -->

 <div class="row g-4 ">
 <div class="col-sm-12 col-xl-12">
  
            <div class="bg-light text-center rounded p-4 bg-dark content-container">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 bg-dark content-container">Number of Posts per Month</h6>
                    <div>
                        <form method="post" id="yearForm">
                            <label for="yearSelect">Select Year: </label>
                            <select name="selectedYear" id="yearSelect" onchange="fetchChartData()">
                                <?php
                                $result = mysqli_query($connection, "SELECT DISTINCT YEAR(created_at) AS year FROM userposts ORDER BY year DESC");

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $year = $row['year'];
                                    echo "<option value=\"$year\">$year</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </div>
                </div>
                <canvas id="postsYearMonthId" width="400" height="100"></canvas>
            </div>
        </div>
    

<script>
    // Function to fetch and update chart data
    function fetchChartData() {
        var selectedYear = document.getElementById('yearSelect').value;

        // AJAX request to fetch data from the server
        $.post('linechart.php', { selectedYear: selectedYear }, function (data) {
            // Parse JSON data received from the server
            var chartData = JSON.parse(data);

            // Get the canvas element
            var ctx7 = document.getElementById('postsYearMonthId').getContext('2d');

            // Destroy the previous chart (if any)
            if (window.myChart) {
                window.myChart.destroy();
            }

            // Draw the new line chart
            window.myChart = new Chart(ctx7, {
                type: 'line',
                data: {
                    labels: chartData.months,
                    datasets: [{
                        label: 'Number of Posts',
                        fill: false,
                        borderColor: 'rgba(0, 156, 255, 1)',
                        data: chartData.postCounts
                    }]
                },
                options: {
                    responsive: true
                }
            });
        });
    }

    // Initial chart load on page load
    fetchChartData();
</script>

</div>


<!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->


<div class="row g-4 ">
<div class="col-sm-12 col-xl-6">
    <div class="bg-light text-center rounded p-4 bg-dark content-container max-height-100 ">
        <h6 class="mb-4 bg-dark content-container"></h6>
        <canvas id="bar-chart" width="400" height="200"></canvas>
    </div>
</div>

<?php
$chartResult = $connection->query("SELECT
    YEAR(Date) as year,
    COUNT(user_id) as usersCount
    FROM user
    GROUP BY year");

$years = [];
$usersCounts = [];

while ($row = $chartResult->fetch_assoc()) {
    $years[] = $row['year'];
    $usersCounts[] = $row['usersCount'];
}
?>

<script>
    $(document).ready(function () {
        var ctx = $("#bar-chart").get(0).getContext("2d");

        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: <?php echo json_encode($years); ?>,
                datasets: [{
                    label: 'Users Count',
                    backgroundColor: "rgba(0, 156, 255, 0.7)",
                    data: <?php echo json_encode($usersCounts); ?>,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


<div class="col-sm-12 col-xl-4">
    <div class="bg-light text-center rounded p-4 bg-dark content-container max-height-50 ">
        <h6 class="mb-4 bg-dark content-container"></h6>
        <canvas id="pie-chart" width="400" height="50"></canvas>
    </div>
</div>
<?php
$chartresult3 = $connection->query("SELECT

c.category_name as category_name,
COUNT(up.userpost_id) as post_count
FROM
category c
LEFT JOIN
userposts up ON c.category_id = up.category
GROUP BY
 c.category_name;");

$category_name = [];
$postcount = [];

while ($row = $chartresult3->fetch_assoc()) {
    $category_name[] = $row['category_name'];
    $postcount[] = $row['post_count'];
}
?>

<script>
    $(document).ready(function () {
        var ctx6 = $("#pie-chart").get(0).getContext("2d");

        var myChart6 = new Chart(ctx6, {
            type: "pie",
            data: {
                labels: <?php echo json_encode($category_name); ?>,
                datasets: [{
                    backgroundColor: [
                        "rgba(0, 156, 255, .7)",
                        "rgba(0, 156, 255, .2)",
                        "rgba(0, 156, 255, .9)",
                        "rgba(0, 156, 255, .4)",
                        "rgba(0, 156, 255, .3)"
                    ],
                    data: <?php echo json_encode($postcount); ?>,
                    fill: true // Move the fill property here
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>


</div>
</div>
<!-- ------------------------------table of users Start ----------------------------------------------------------------------------------------------------->



        
                 
                   <div class="container-fluid pt-4 px-4">
                    <div class="bg-light text-center rounded p-4 bg-dark content-container">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0 bg-dark content-container">All Users</h6>
                            
                           
                        </div>
                        <div class="table-responsive" style="height: 400px;">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 ">
                                <thead>
                                    <tr class="text-dark" >
                                       
                                        <th scope="col"><h5 class="colorAllContent">First Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Last Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">User Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Location</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Date of Birth</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Action</h5></th>
                                    </tr>
                                </thead>
                                <tbody id="userTableBody">
                                <?php
            while ($row = mysqli_fetch_assoc($selectUserResult)) {
                $userId = $row['user_id'];
                $firstname = $row['First_name'];
                $lastname = $row['last_name'];
                $username = $row['user_name'];
                ?>
                <tr>
                    
                    <td><?php echo $firstname; ?></td>
                    <td><?php echo $lastname; ?></td>
                    <td><?php echo $username; ?></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                user
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                <form method="post" action="">
                                    <input type="hidden" name="banUserId" value="<?php echo $userId; ?>">
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to ban user?')">Ban</button>
                                        
                                    </form>
                                </li>
                               
                                <li>
                                    <form method="post" action="">
                                        <input type="hidden" name="deleteUserId" value="<?php echo $userId; ?>">
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>




                        </div>
                    </div>
                </div> 
                

<!---------------------------------------------------------------------- table ogf users End----------------------------------------------------------------------- -->

                     <!-- $sql = "SELECT * FROM user WHERE status_id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $status_id);
$status_id = 0;
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); -->

<!-------------------------------------------------------- table of banned users Start ------------------------------------------------------------------------------>
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4 bg-dark content-container">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 bg-dark content-container">All Banned Users</h6>
                       
                        
                    </div>
                    <div class="table-responsive" style="height: 400px;">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark" >
                                    
                                    <th scope="col"><h5 class="colorAllContent">First Name</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Last Name</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">User Name</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Location</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Date of Birth</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Action</h5></th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
    <?php
    while ($row = mysqli_fetch_assoc($sql_run)) {
        $firstname = $row['First_name'];
        $lastname = $row['last_name'];
        $username = $row['user_name'];
        $user_Id = $row['user_id']; // Assuming this is the correct field name in your database
        ?>

        <tr>
          
            <td><?php echo $firstname ?></td>
            <td><?php echo $lastname ?></td>
            <td><?php echo $username ?></td>
            <td></td>
            <td></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        user
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form method="post" action="">
                                <input type="hidden" name="unbanUserId" value="<?php echo $user_Id; ?>">
                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to unban user?')">UnBan</button>
                            </form>
                        </li>

                        <li>
                            <form method="post" action="">
                                <input type="hidden" name="deleteUserId" value="<?php echo $user_Id; ?>">
                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>

    <?php } ?>
</tbody>

                        </table>
                    </div>
                </div>
            </div>
<!-- -----------------------------------------------table of banned users End --------------------------------------------------------------------------------------------------->



<!--------------------------------------------------------- Widgets Start /messages/ realted to main.js and contact us and sendmessage.php----------------------------------------------------------------------------->
            <div class="container-fluid pt-4 px-4 ">
                <div class="row g-4 ">
                    <div class="col-sm-12 col-md-12 col-xl-12 " style="height:400px;width: 100%;">
                        <div class="h-100 bg-light rounded p-4 bg-dark content-container" style="overflow-y: scroll;" id="messagesContainer">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0 bg-dark content-container">Messages</h6>
                                
                            </div>
                            <!-- -------------------------------------------------------------------------------- -->
                         
                            <?php


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
        // Format the time using the formatTime function
        $formatted_time = formatTime(time() - strtotime($row['time']));

        echo "<div class='d-flex align-items-center border-bottom py-3'id='messagesContainer' >";
        echo "<img class='rounded-circle flex-shrink-0' src='img/user.jpg' alt='' style='width: 40px; height: 40px;'>";
        echo "<div class='w-100 ms-3'>";
        echo "<div class='d-flex w-100 justify-content-between' >";
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


                              
                                <!-- ------------------------------------------------------------------------------------ -->
                         
                                 </div>
                         
                            </div>
                        </div>
                  </div>
 <!-- ---------------------------------------------------Widgets End------------------------------------------------------------------------------------- -->

<!--------------------------------------------------------calender start related to main.js and selectuserbirthdate.php---------------------------------------------------------------------------------->
          

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4 bg-dark content-container">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 bg-dark content-container">Calender</h6>
                               
                            </div>
                            <div id="calender"></div>
                            <button id="retrieveDataButton">Retrieve Data</button>
                        </div>
                    </div>
                    
           
                    <!-- table of users Start -->
                    <div class="bg-light text-center rounded p-4 bg-dark content-container" style="width: 65%;height: 320px;">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0 bg-dark content-container">Users</h6>
                           
                            
                        </div>
                        <div class="table-responsive " style="height: 200px;">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 " >
                                <thead>
                                    <tr class="text-dark" >
                                        
                                        <th scope="col"><h5 class="colorAllContent">First Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Last Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">User Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Location</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Date of Birth</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Action</h5></th>
                                    </tr>
                                </thead>
                                <tbody id="userDataBody">
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>

            <!------------------------------------ table of users End ------------------------------------------------------------->
                    
                </div>

            </div>
            <?php if (isset($_GET['success'])) {
    $success = $_GET['success'];
    $message = $_GET['message'];

    // Display success or error message using JavaScript
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    var successMessage = document.createElement("h6");';
    echo '    successMessage.innerText = "' . $message . '";';
    echo '    successMessage.className = "text-center ' . ($success == 1 ? 'text-success' : 'text-danger') . '";';
    echo '    document.getElementById("messageContainer").innerHTML = "";';
    echo '    document.getElementById("messageContainer").appendChild(successMessage);';

    // Add JavaScript to remove the message after a delay (e.g., 3000 milliseconds or 3 seconds)
    echo '    setTimeout(function() {';
    echo '        document.getElementById("messageContainer").innerHTML = "";';
    echo '    }, 5000);';

    echo '});';
    echo '</script>';
}?>
            <div id="messageContainer"></div>
          
    <!---------------------------------------------------------calender ends---------------------------------------------------------------------------->




            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4 bg-dark content-container">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Global Impact</a>, All Right Reserved. 
                        </div>
                   
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     -->
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <script>
        // Call checkDarkMode() on page load
        checkDarkMode();
         // ---------------------this for Scroll-------------------------

    // Function to set the scroll position in a cookie
    function setScrollPosition() {
      sessionStorage.setItem('scroll_position', $(window).scrollTop());
  }
  // Function to get the scroll position from sessionStorage and scroll to it
  function getAndScrollToPosition() {
      var scrollPosition = sessionStorage.getItem('scroll_position');
      if (scrollPosition !== null) {
          $(window).scrollTop(scrollPosition);
          sessionStorage.removeItem('scroll_position');
      }
  }
  // Save the scroll position when the page is unloaded (refreshed or closed)
  $(window).on('beforeunload', function () {
      setScrollPosition();
  });

  // Scroll to the saved position when the page is loaded
  $(document).ready(function () {
      getAndScrollToPosition();
  });
        


        
    </script>

</body>

</html>