<?php include('backend.php'); ?>
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
        
        <!-- Check if $verification_msg is not empty -->
        <?php if (!empty($verification_msg)) : ?>
            <p>
                <?php echo $verification_msg; ?>
            </p>
        <?php endif; ?>

        <div class="code-container">
            <input type="number" class="code" min="0" max="9" required />
            <input type="number" class="code" min="0" max="9" required />
            <input type="number" class="code" min="0" max="9" required />
            <input type="number" class="code" min="0" max="9" required />
            <input type="number" class="code" min="0" max="9" required />
            <input type="number" class="code" min="0" max="9" required />
        </div>

        <div>
            <button type="button" class="btn-verify btn-primary-verify">Verify</button>
        </div>
        <small> If you didn't recieve a code!! <strong>RESEND</strong> </small>

        <script src="verification.js"></script>
</body>

</html>