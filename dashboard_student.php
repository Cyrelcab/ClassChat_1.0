<?php
session_start();
include('connectiondb.php');

// Check if the student is not logged in
if (!isset($_SESSION['idNumberStudent'])) {
    $_SESSION['msg'] = 'You must log in first!';
    header('location: login_student.php');
    exit();
} elseif (isset($_SESSION['idNumberStudent'])) {
    //Check if the session has expired
    $sessionTimeout = 900; // Set the session timeout limit in seconds

    if (time() - $_SESSION['last_activity_timestamp'] > $sessionTimeout) {
        $id_number = $_SESSION['idNumberStudent'];
        //update the active status
        $query = "UPDATE student_table SET active_status='offline' WHERE ID_number = '$id_number'";
        mysqli_query($conn, $query);
        unset($_SESSION['idNumberStudent']);
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
    $id_number = $_SESSION['idNumberStudent'];
    //update the active status
    $query = "UPDATE student_table SET active_status='offline' WHERE ID_number = '$id_number'";
    mysqli_query($conn, $query);
    session_destroy();
    unset($_SESSION['idNumberStudent']);
    header('location: index.php');
    exit();
}

// Set CSP header
header("Content-Security-Policy: default-src 'self'");
header("Content-Security-Policy: style-src 'self' https://maxcdn.bootstrapcdn.com");
header("Content-Security-Policy: script-src 'self' https://ajax.googleapis.com 'unsafe-inline'");
header("Content-Security-Policy: img-src * data:");

//security headers
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image/logo.png">
    <style>
        body {
            background: linear-gradient(to left, rgb(5, 98, 155), rgb(99, 27, 163));
            width: 100vw;
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

       
        .avatar-container {
        position: relative;
    }

    .avatar-container img {
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 50%;
    }

    .avatar-container:hover .overlay {
        display: flex;
    }

    .overlay span {
        color: rgb(250, 250, 250);
        margin-top: 5px;
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
    <?php
    if (isset($_SESSION['success'])) {
        echo "<script>alert('{$_SESSION['success']}');</script>";
        unset($_SESSION['success']); // Optional: Clear the session message after displaying it
    }
    ?>
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
                        <a class="nav-link text-white scrollto text-decoration-underline" href="">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white scrollto" href="auditing_student.php">Audit Logs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard_student.php?logout='1'">
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
            <div class="d-flex flex-column align-items-center">
        <input id="file" type="file" onchange="uploadImage(event)" style="display:none;" />
        <div class="avatar-container" onclick="document.getElementById('file').click();">
            <?php
            $avatarSrc = isset($_SESSION['avatar']) ? $_SESSION['avatar'] : 'image/profile.jpg';
            echo '<img src="' . $avatarSrc . '" class="rounded-circle" style="width: 150px;" alt="Avatar" />';
            ?>
            <div class="overlay">
                <!-- Label and camera icon content goes here -->
                <i class="fa fa-camera" style="font-size: 14px;"></i>
                <span>Change Image</span>
            </div>
        </div>
    </div>
                <h6 class="pt-4 px-5">Name: <?php echo $_SESSION['users_name'] ?></h6>
                <h6 class="px-5">ID Number: <?php echo $_SESSION['idNumberStudent'] ?></h6>
            </div>
            <div class="col-9 scrollable-column">
                <div class="row align-items-center">
                    <div class="col-3">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="col-4">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm">
                            <div class="input-group">
                                <input type="text" placeholder="Search" aria-describedby="button-addon1" class="form-control rounded rounded-pill border-0 bg-light custom-input">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 gap-5">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
<script>
    function uploadImage(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('.avatar-container img').src = e.target.result;
                // You may also use AJAX to send the file to the server for storage
            };
            reader.readAsDataURL(file);
        }
    }
</script>
</body>

</html>