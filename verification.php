<?php
session_start();
include('backend.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account</title>
    <link rel="stylesheet" href="style.css" />


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
                <button type="submit" class="btn-verify btn-primary-verify" name="btn-verify">Verify</button>
            </div>
        </form>
        <small> If you didn't recieve a code!! <a href="resend_code.php" style="color: white; font-weight: bold;">Resend</a></small>

        <script src="verification.js"></script>
</body>

</html>