<?php
session_start();

// Check if the student is not logged in
if (!isset($_SESSION['idNumberEmployee'])) {
    $_SESSION['msg'] = 'You must log in first!';
    header('location: login_employee.php');
    exit();
} elseif (isset($_SESSION['idNumberEmployee'])) {
    // Check if the session has expired
    $sessionTimeout = 60; // Set the session timeout limit in seconds

    if (time() - $_SESSION['last_activity_timestamp'] > $sessionTimeout) {
        $_SESSION['msg'] = 'Session Expired!';
        header('location: login_employee.php');
        exit();
    } else {
        // Update the last activity timestamp for the active session
        $_SESSION['last_activity_timestamp'] = time();
    }
}

// Logout functionality
if (isset($_GET['logout'])) {
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Employee</title>
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
    <h1>Hello <?php echo $_SESSION['users_name']?></h1>
    <button type="button"><a href="dashboard_employee.php?logout='1'">Logout</a></button>
</body>

</html>