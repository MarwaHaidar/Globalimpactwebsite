<?php include("../connDatabase/connection.php");
session_start();   ?>

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
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar ">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Global Impact</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['auth_user']['firstname'].$_SESSION['auth_user']['lastname']?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
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
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  sticky-top px-4 py-0 ">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2  colorIconNav"></i>
                            <span class="d-none d-lg-inline-flex ">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Rayan send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Marwa send you a message</h6>
                                        <small>16 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">ahmad send you a message</h6>
                                        <small>18 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2  colorIconNav"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
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
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['auth_user']['firstname'].$_SESSION['auth_user']['lastname']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../LogIn-SignUp-forgget/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
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
                    <!-- ------------------------------------------------------------------------------------ -->


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
       


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4  ">
                <div class="row g-4 ">
            
                    <!-- First Column -->
                    <div class="col-sm-12 col-xl-6  ">
                      
                        <div class="bg-light text-center rounded p-4 bg-dark content-container" >
                            <div class="d-flex align-items-center justify-content-between mb-4 ">
                                <h6 class="mb-0 bg-dark content-container">Like & Dislike</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="Like-DislikeId"></canvas>
                        </div>
                       
                    </div>
            
                    <!-- Second Column -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4 bg-dark content-container" >
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 bg-dark content-container"> Activate and Deactivate Users</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="ActivateUsersId"></canvas>
                        </div>
                    </div>
            
                    <!-- Third Column -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4 bg-dark content-container" >
                            <h6 class="mb-4 bg-dark content-container">Top 4 Countries</h6>
                            <canvas id="CountryId"></canvas>
                        </div>
                    </div>

                     <!-- four Column -->
                     <div class="col-sm-12 col-xl-6">
                        <div class="row g-4">
                            <div class="col-sm-12">
                                <div class="bg-light text-center rounded p-4 bg-dark content-container" >
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="mb-0 bg-dark content-container">Number of Posts per Month</h6>
                                        <div>
                                            <label for="yearSelect">Select Year: </label>
                                            <select id="yearSelect" onchange="changeYear(this.value)">
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    <canvas id="postsYearId" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
                   <!-- table of users Start -->



        
                 
                   <div class="container-fluid pt-4 px-4">
                    <div class="bg-light text-center rounded p-4 bg-dark content-container">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0 bg-dark content-container">All Users</h6>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" type="text" placeholder="Search">
                                <button type="button" class="btn btn-primary ms-2">Search</button>
                            </div>
                            <a href="">Show All</a>
                        </div>
                        <div class="table-responsive" style="height: 400px;">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 ">
                                <thead>
                                    <tr class="text-dark" >
                                        <th scope="col" ></th>
                                        <th scope="col"><h5 class="colorAllContent">First Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Last Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">User Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Location</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Date of Birth</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Action</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  
            $sql="SELECT * from user";
            $sql_run = mysqli_query($connection, $sql);

            if(mysqli_num_rows($sql_run)>0){
                while ($row = mysqli_fetch_assoc($sql_run)) {
                 $firstname=$row['First_name'];
                 $lastname=$row['last_name'];
                 $username=$row['user_name'];?>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        
                                    <td><?php echo $firstname?></td>
                                    <td><?php echo $lastname?></td>
                                    <td><?php echo $username?></td>
                                    <td></td>
                                    <td></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  user
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="#">Ban</a></li>
                                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                              </div>
                                        </td>
                                    </tr>
                                    <?php
                }}?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

                     <!-- table ogf users End -->

                     <!-- $sql = "SELECT * FROM user WHERE status_id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $status_id);
$status_id = 0;
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); -->

             <!-- table of banned users Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4 bg-dark content-container">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 bg-dark content-container">All Banned Users</h6>
                        <div class="d-flex mb-2">
                            <input class="form-control bg-transparent" type="text" placeholder="Search">
                            <button type="button" class="btn btn-primary ms-2">Search</button>
                        </div>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive" style="height: 400px;">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark" >
                                    <th scope="col" ></th>
                                    <th scope="col"><h5 class="colorAllContent">First Name</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Last Name</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">User Name</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Location</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Date of Birth</h5></th>
                                    <th scope="col"><h5 class="colorAllContent">Action</h5></th>
                                </tr>
                            </thead>
                            <tbody>
            <?php  
            $sql="SELECT * from user where status_id='0'";
            $sql_run = mysqli_query($connection, $sql);

            if(mysqli_num_rows($sql_run)>0){
                while ($row = mysqli_fetch_assoc($sql_run)) {
                 $firstname=$row['First_name'];
                 $lastname=$row['last_name'];
                 $username=$row['user_name'];?>
                 

        
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $firstname?></td>
                                    <td><?php echo $lastname?></td>
                                    <td><?php echo $username?></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                              user
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="#">UnBan</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                          </div>
                                    </td>
                                </tr>



<?php


                    
            }
            
            
        }
            
            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- table of banned users End -->



            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4 ">
                <div class="row g-4 ">
                    <div class="col-sm-12 col-md-12 col-xl-12 " style="height:400px;width: 100%;">
                        <div class="h-100 bg-light rounded p-4 bg-dark content-container" style="overflow-y: scroll;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0 bg-dark content-container">Messages</h6>
                                <a href="">Show All</a>
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






































                              
                                <!-- ------------------------------------------------------------------------------------ -->
                         
                            </div>
                         
                            </div>
                    
                </div>
            </div>
            <!-- Widgets End -->

            <!--calender start-->
          

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4 bg-dark content-container">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 bg-dark content-container">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                            <button id="retrieveDataButton">Retrieve Data</button>
                        </div>
                    </div>
                    
           
                    <!-- table of users Start -->
                    <div class="bg-light text-center rounded p-4 bg-dark content-container" style="width: 65%;height: 320px;">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0 bg-dark content-container">Users</h6>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" type="text" placeholder="Search">
                                <button type="button" class="btn btn-primary ms-2">Search</button>
                            </div>
                            <a href="">Show All</a>
                        </div>
                        <div class="table-responsive " style="height: 200px;">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 " >
                                <thead>
                                    <tr class="text-dark" >
                                        <th scope="col" ></th>
                                        <th scope="col"><h5 class="colorAllContent">First Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Last Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">User Name</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Location</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Date of Birth</h5></th>
                                        <th scope="col"><h5 class="colorAllContent">Action</h5></th>
                                    </tr>
                                </thead>
                                <tbody id="userDataBody">
                                    

                            

                            
                         

                                    <!-- <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td>Nabil</td>
                                        <td>Khalaf</td>
                                        <td>Nabi_198</td>
                                        <td>Syria</td>
                                        <td>01 Jan 1990</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  user
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="#">Ban</a></li>
                                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                              </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td>Rami</td>
                                        <td>Ayash</td>
                                        <td>RM_ayyash</td>
                                        <td>Jordan</td>
                                        <td>01 Jan 2001</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  user
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="#">Ban</a></li>
                                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                              </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td>Samir</td>
                                        <td>Alwaan</td>
                                        <td>Sami_12</td>
                                        <td>Lebanon</td>
                                        <td>01 Feb 1899</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  user
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="#">Ban</a></li>
                                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                              </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td>Rola</td>
                                        <td>Said</td>
                                        <td>Roro_300</td>
                                        <td>Omman</td>
                                        <td>01 Dec 1880</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  user
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="#">Ban</a></li>
                                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                              </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td>Nadia</td>
                                        <td>Barakat</td>
                                        <td>Nado_5000</td>
                                        <td>Syria</td>
                                        <td>11 Mar 1780</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                  user
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="#">Ban</a></li>
                                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                              </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <!-- table of users End -->
                    
                </div>

            </div>
            <!--calender ends-->







            





            
 

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script>
        // Call checkDarkMode() on page load
        checkDarkMode();
    </script>

</body>

</html>