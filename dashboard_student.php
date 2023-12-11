<?php
session_start();

if (!isset($_SESSION['idNumber'])) {
    header('location: login_student.php');
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['idNumber']);
    header('location: index.php');
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
    <?php
    if (isset($_SESSION['success'])) {
        echo "<script>alert('{$_SESSION['success']}');</script>";
        unset($_SESSION['success']); // Optional: Clear the session message after displaying it
    }
    ?>
    <h1>try ra ni</h1>
    <button type="button"><a href="dashboard_student.php?logout='1'">Logout</a></button>
</body>

</html>