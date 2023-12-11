<?php
session_start();
include('backend.php');

use PHPMailer\PHPMailer\PHPMailer;

// Generate a new verification code
$new_otp_code = rand(100000, 999999);

// Assume $email is the user's email stored in your session or database
$email = $_SESSION['users_email']; // Adjust this based on how you store the user's email

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->CharSet = "UTF-8";
$mail->SMTPDebug = 3;
$mail->Username = "classchat10@gmail.com";
$mail->Password = "ppsx ozyl tbrp qlse";
$mail->SetFrom("classchat10@gmail.com", "ClassChat");
$mail->Subject = "Resend Email Verification Code";
$mail->Body = "Your new 6 Digit Verification Code: " . $new_otp_code;
$mail->AddAddress($email);
$mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
));

//check if it is successfully send
if (!$mail->Send()) {
    echo $mail->ErrorInfo;
} else {
    // Update the session variable with the new verification code
    $_SESSION['verification_code'] = $new_otp_code;
    $_SESSION['verification_code_timestamp'] = time();

    // Provide a message to the user
    $_SESSION['verification_msg'] = "We resent the six-digit code to " . $email . ". Please check your email.";

    // Redirect back to the verification page
    header('location: verification_student.php');
}
