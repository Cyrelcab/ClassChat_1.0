<?php
session_start();
include('connectiondb.php');

// Check if the student is not logged in
if (!isset($_SESSION['idNumberEmployee'])) {
    $_SESSION['msg'] = 'You must log in first!';
    header('location: login_employee.php');
    exit();
} elseif (isset($_SESSION['idNumberEmployee'])) {
    //Check if the session has expired
    $sessionTimeout = 900; // Set the session timeout limit in seconds 60 * 15mins 

    if (time() - $_SESSION['last_activity_timestamp'] > $sessionTimeout) {
        $id_number = $_SESSION['idNumberEmployee'];
        //update the active status
        $query = "UPDATE employee_table SET active_status='offline' WHERE Employee_number = '$id_number'";
        mysqli_query($conn, $query);
        unset($_SESSION['idNumberEmployee']);
        unset($_SESSION['last_activity_timestamp']);
        $_SESSION['msg'] = 'Session Expired!';
        header('location: login_student.php');
        exit();
    } else {
        // Update the last activity timestamp for the active session
        $_SESSION['last_activity_timestamp'] = time();
    }
}

// Logout functionality
if (isset($_GET['logout'])) {
    $id_number = $_SESSION['idNumberEmployee'];
    //update the active status
    $query = "UPDATE employee_table SET active_status='offline' WHERE Employee_number = '$id_number'";
    mysqli_query($conn, $query);
    session_destroy();
    unset($_SESSION['idNumberEmployee']);
    header('location: index.php');
    exit();
}

// Set CSP header
header("Content-Security-Policy: default-src 'self'");
header("Content-Security-Policy: style-src 'self' https://maxcdn.bootstrapcdn.com");
header("Content-Security-Policy: script-src 'self' https://ajax.googleapis.com 'unsafe-inline'");
header("Content-Security-Policy: img-src * data:");

// prevents your site from being embedded within frames, protecting against clickjacking attacks
header('X-Frame-Options: DENY');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Logs - Student</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image/logo.png">
    <style>
        body {
            background: linear-gradient(to left, rgb(5, 98, 155), rgb(99, 27, 163));
        }

        /*style for dashboard*/
        .fixed-column {
            position: fixed;
            top: 75px;
            bottom: 0;
            left: 0;
            width: 200px;
            /* Adjust the width of the fixed column */
            background-color: rgba(0, 6, 17, 0.2);
            /* Optional: Set a background color for the fixed column */
            padding: 20px;
        }

        .fixed-column i {
            text-align: center;
            display: block;
            font-size: 155px;
        }

        .scrollable-column {
            margin-left: 410px;
            padding-top: 95px;
        }

        .custom-input:focus {
            box-shadow: none !important;
        }
    </style>

    <!--stylesheet using bootstrap5-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!--font-family "Poppins"-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!--for animations-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-md background-color fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="image/logo.png" alt="ClassChat" width="95" height="50" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard_employee.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-decoration-underline" href="">Audit Logs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard_employee.php?logout='1'">
                            <button type="button" class="btn btn-width rounded-pill border border-white text-white">
                                Logout
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end of navbar-->
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col-3 fixed-column">
                <i class="far fa-user-circle"></i>
                <h6 class="pt-4 px-5">Name: <?php echo $_SESSION['users_name'] ?></h6>
                <h6 class="px-5">Employee Number: <?php echo $_SESSION['idNumberEmployee'] ?></h6>
            </div>
            <div class="col-9 scrollable-column">
                <div class="row align-items-center">
                    <div class="col-3 p-1">
                        <h5>Audit Logs</h5>
                    </div>
                </div>

                <div class="row mt-5">
                    <?php
                    include('connectiondb.php');

                    $id_number = $_SESSION['idNumberEmployee'];
                    $sql = "SELECT * FROM auditing_logs_employee WHERE employee_id = '$id_number' ORDER BY time_logged_in DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table class='text-white w-75'>
                                <tr>
                                    <th class='text-center'>Device Information</th>
                                    <th class='text-center'>Time Logged in</th>
                                </tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td class='pt-4'>{$row['device_information']}</td>
                                <td class='pt-4'>{$row['time_logged_in']}</td>
                            </tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No audit logs found";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>