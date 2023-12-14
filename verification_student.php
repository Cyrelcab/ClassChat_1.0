<?php
session_start();
include('backend.php');

if (!isset($_SESSION['verification_code'])) {
    $_SESSION['msg'] = 'You must signup first!';
    header('location: signup_student.php');
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
    <title>Verify Account</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="image/logo.png">
    <style>
        body {
            background: linear-gradient(to left, rgb(5, 98, 155), rgb(99, 27, 163));
        }
    </style>


    <!--font-family "Poppins"-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>

<body class="verification-body">
    <div class="container-verify">
        <img src="image/email_verify.png" alt="" width="15%">
        <h2>Verify Your Account</h2>

        <!-- Check if the session variable is set and not empty -->
        <?php if (isset($_SESSION['verification_msg']) && !empty($_SESSION['verification_msg'])) : ?>
            <p>
                <?php echo $_SESSION['verification_msg']; ?>
            </p>
        <?php
        endif;
        ?>

        <div id="countdown">1:00</div>

        <form method="POST">
            <div class="code-container">
                <?php
                // Add the following loop to generate input fields with the correct name attributes
                for ($i = 1; $i <= 6; $i++) {
                    echo '<input type="number" name="code' . $i . '" class="code" min="0" max="9" required />';
                }
                ?>
            </div>

            <div>
                <button type="submit" class="btn-verify btn-primary-verify" id="submitBtn" name="btn-verify">Verify</button>
            </div>
        </form>
        <small> If you didn't recieve a code!! <a href="resend_code.php" style="color: white; font-weight: bold;">Resend</a></small>

        <script src="verification.js"></script>
        <script src="countdown.js"></script>

</body>

</html>