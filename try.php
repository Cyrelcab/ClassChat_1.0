<?php 
session_start();
if (!isset($_SESSION['idNumberStudent'])) {
    $_SESSION['msg'] = 'You must log in first!';
    header('location: login_student.php');
    exit();
}elseif (isset($_SESSION['idNumberStudent'])) {
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>try</p>
</body>
</html>