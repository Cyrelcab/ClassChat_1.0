<?php
session_start();

// Check if the student is not logged in
if (!isset($_SESSION['idNumberStudent'])) {
    $_SESSION['msg'] = 'You must log in first!';
    header('location: login_student.php');
    exit();
} elseif (isset($_SESSION['idNumberStudent'])) {
    // Check if the session has expired
    // $sessionTimeout = 60; // Set the session timeout limit in seconds

    // if (time() - $_SESSION['last_activity_timestamp'] > $sessionTimeout) {
    //     unset($_SESSION['idNumberStudent']);
    //     unset($_SESSION['last_activity_timestamp']);
    //     $_SESSION['msg'] = 'Session Expired!';
    //     header('location: login_student.php');
    //     exit();
    // } else {
    //     // Update the last activity timestamp for the active session
    //     $_SESSION['last_activity_timestamp'] = time();
    // }
}

// Logout functionality
if (isset($_GET['logout'])) {
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
        .fixed-column i{
            text-align: center;
            display: block; 
            font-size: 155px;
        }

        .scrollable-column {
            margin-left: 410px;
            padding-top: 95px;
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
                        <a class="nav-link text-white scrollto" href="#about">Auditing Logs</a>
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
                <i class="far fa-user-circle"></i>
                <h5 class="pt-4 px-5">Name: <?php echo $_SESSION['users_name']?></h5>
                <h5 class="px-5">ID Number: <?php echo $_SESSION['idNumberStudent']?></h5>
            </div>
            <div class="col-9 scrollable-column">
                <p class="w-75">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem animi minima unde voluptatem dolorum quisquam officiis, aspernatur aliquid necessitatibus temporibus suscipit voluptatibus, maxime corporis odio. Consequuntur in magnam qui ut?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam error doloremque dolore, non temporibus dolores impedit repudiandae illum vitae nam culpa, quod necessitatibus quisquam, unde tempora corrupti animi consectetur cupiditate Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, reiciendis cupiditate temporibus adipisci earum illo, officia provident magnam fugiat consequatur quae tempore ex, pariatur praesentium enim aperiam. Sequi, vero dolore! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem maxime molestiae nesciunt obcaecati cupiditate tempore quasi in repellendus necessitatibus, sapiente reprehenderit? Culpa eos est nulla doloremque atque ea, explicabo voluptatibus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Non eum, laudantium numquam inventore fugit adipisci laborum? Hic fugiat ipsum doloribus doloremque dolores dolore modi quisquam eaque? Hic rerum odit eveniet? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam odio distinctio cum commodi libero, sequi adipisci pariatur alias labore nesciunt tempore! Eius possimus odio laborum voluptatum sunt numquam, consequatur mollitia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum at nostrum, reprehenderit accusantium tenetur numquam vero, hic voluptatem ducimus repudiandae doloremque minima neque, labore facere. Autem optio quod nostrum. Sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis rem soluta, alias totam, nobis hic ipsum laboriosam harum doloribus suscipit aut repellat deleniti ex quis? Minus itaque aut illum expedita. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae dolorem nihil laudantium iure vel inventore earum. Quod, quae natus tenetur voluptatum quis possimus, id nisi error numquam deleniti maxime dignissimos! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam, impedit? Fuga, nostrum. Ipsam quia distinctio repudiandae explicabo, eaque consequatur incidunt placeat neque nam, illo alias cupiditate voluptatem in! Repellat, fugit! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id exercitationem voluptatem distinctio porro, excepturi aperiam quae est vero, quo, dolores numquam atque magni doloremque corrupti beatae. Error corporis eius labore. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque est magnam culpa reiciendis saepe eligendi nihil eum porro fuga cum minima fugiat esse, vitae natus? Maxime iure dicta ex magnam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis obcaecati repudiandae, suscipit ipsam ab ex rem officiis doloribus ratione dolore iure minima neque consectetur, esse vitae! Odit voluptates vel qui. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores omnis, magni rem quidem consectetur aliquid quasi quae officiis ipsa consequuntur numquam culpa alias animi fugit accusantium. Itaque ea culpa laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae sequi architecto porro debitis iusto exercitationem vero totam, rerum quos saepe nobis ipsam maxime aliquam optio. Velit eius deleniti quae temporibus?</p>
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