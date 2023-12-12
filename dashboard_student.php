<?php
session_start();

// Check if the student is not logged in
if (!isset($_SESSION['idNumberStudent'])) {
    $_SESSION['msg'] = 'You must log in first!';
    header('location: login_student.php');
    exit();
} elseif (isset($_SESSION['idNumberStudent'])) {
    // Check if the session has expired
    $sessionTimeout = 60; // Set the session timeout limit in seconds

    if (time() - $_SESSION['last_activity_timestamp'] > $sessionTimeout) {
        unset($_SESSION['idNumberStudent']);
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
    <!--style for background so that it will render fast-->
    <style>
        body {
            background-image: url('image/background-color.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['success'])) {
        echo "<script>alert('{$_SESSION['success']}');</script>";
        unset($_SESSION['success']); // Optional: Clear the session message after displaying it
    }
    ?>
    <h1>try ra ni</h1>
    <button type="button"><a href="try.php">Click me</a></button>
    <button type="button"><a href="dashboard_student.php?logout='1'">Logout</a></button>
</body>

</html>