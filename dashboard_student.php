<?php 
    session_start();

    if(!isset($_SESSION['idNumber'])){
        $_SESSION['msg'] = "You must login first";
        header('location: login_student.php');
    }
    if(isset($_GET['logout'])){
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
    <h1>try ra ni</h1>
</body>
</html>