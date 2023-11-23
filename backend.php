<?php

use PHPMailer\PHPMailer\PHPMailer;

include('checkIDbackend.php');
include('checkEmailbackend.php');
include('vendor/autoload.php');

//variables for the database connection
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "classchat_database";

//declaring all the variables 
$id_number = null;
$name = null;
$email = null;
$password = null;
$confirm_password = null;
$id_error = null;
$id_exist_error = null;
$name_error = null;
$email_error = null;
$email_exist_error = null;
$password_error = null;
$confirm_password_error = null;
$carsu_email = "@carsu.edu.ph";
$verification_msg = null;

/*connect to mysql*/
$conn = mysqli_connect($server_name, $username, $password, $db_name);

/*check if the database is successfully connected*/
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//check if the signup button for the student has been click
if (isset($_POST['signupStudent_btn'])) {
    $id_number = $_POST['idNumberStudentSignup'];
    $name = $_POST['nameStudentSignup'];
    $email = $_POST['emailStudentSignup'];
    $password = $_POST['passwordStudentSignup'];
    $confirm_password = $_POST['confirmPasswordStudentSignup'];

    //check all the input fields if they are empty
    if (empty(trim($name))) {
        $name_error = "Name Field is empty";
    }

    if (empty(trim($email))) {
        $email_error = "Email Field is empty";
    }

    if (empty(trim($password))) {
        $password_error = "Password Field is empty";
    }

    if (empty(trim($confirm_password))) {
        $confirm_password_error = "Confirm Password Field is empty";
    }

    if (empty(trim($id_number))) {
        $id_error = "ID Field is empty";
    } else {
        //checking functions for email and the id
        $id_exists = checkIDExist($conn, $id_number);
        $email_exists = checkEmailExist($conn, $email);

        //check if the id number is existing in the database
        if (!$id_exists) {

            if(strpos($email, $carsu_email) !== false){

                //check if the inputted email is exist in the database
                if (!$email_exists) {

                    //check if the password and confirm password match
                    if ($password === $confirm_password) {

                        //check if the password contains special characters like !@$%&
                        if (preg_match('/[!@$%&]/', $password)) {

                            //check if the password is 10 characters long
                            if (strlen($password) === 10) {
                                //encrypt the password
                                // $password_encrypted = md5($password);

                                // $query = "INSERT INTO student_table (ID_number, Name, Email, Password) 
                                // VALUES('$id_number', '$name', '$email', '$password_encrypted')";
                                // mysqli_query($conn, $query);
                                // header('location: try.php');

                                //generate code to send in email
                                $otp_code = rand(100000, 999999);

                                //send otp code to email
                                $mail = new PHPMailer();
                                $mail -> IsSMTP();
                                $mail -> SMTPAuth = true;
                                $mail -> SMTPSecure = 'tls';
                                $mail -> Host = "smtp.gmail.com";
                                $mail -> Port = 587;
                                $mail -> IsHTML(true);
                                $mail -> CharSet = "UTF-8";
                                $mail -> SMTPDebug = 3;
                                $mail -> Username = "cabodbodcyrel2003@gmail.com";
                                $mail -> Password = "myph tgdu vtgp btiq";
                                $mail -> SetFrom("ClassChat@gmail.com");
                                $mail -> Subject = "Email Verification";
                                $mail -> Body = "Your 6 Digit OTP Code: " . $otp_code;
                                $mail -> AddAddress($email);
                                $mail -> SMTPOptions = array('ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => false
                                ));

                                //check if it is successfully send
                                if(!$mail->Send()){
                                    echo $mail -> ErrorInfo;
                                }else{
                                    $verification_msg = "We emailed you the six digit code to " . $email . "<br/> Enter the code below to confirm your email address";
                                    header('location: verification.php');
                                }


                            } else {
                                $password_error = "Password must 10 characters long";
                                $confirm_password_error = "Password must 10 characters long";
                            }
                        } else {
                            $password_error = "Password must contain characters !@$%&";
                            $confirm_password_error = "Password must contain characters !@$%&";
                        }
                    } else {
                        $password_error = "Password did not match";
                        $confirm_password_error = "Password did not match";
                    }
                } else {
                    $email_exist_error = "Email is Already Exists!";
                }
            }else{
                $email_error = "Invalid email! Use @carsu.edu.ph";
            }
                } else {
                    $id_exist_error = "ID Number is Already Exists!";
                    $name_error = null;
                    $email_error = null;
                    $password_error = null;
                    $confirm_password_error = null;
                }
        }
    }

//check if the signup button for the employee has been click
if (isset($_POST['signupEmployee_btn'])) {
    $id_number = $_POST['employeeNumberSignup'];
    $name = $_POST['nameEmployeeSignup'];
    $email = $_POST['emailEmployeeSignup'];
    $password = $_POST['passwordEmployeeSignup'];
    $confirm_password = $_POST['confirmPasswordEmployeeSignup'];

    if(empty(trim($name))){
        $name_error = "Name Field is empty";
    }

    if(empty(trim($email))){
        $email_error = "Email Field is empty";
    }

    if(empty(trim($password))){
        $password_error = "Password Field is empty";
    }

    if(empty(trim($confirm_password))){
        $confirm_password_error = "Confirm Password Field is empty";
    }

    if(empty(trim($id_number))){
        $id_error = "Employee Number Field is empty";
    }
    //encrypt the password
    $password_encrypted = md5($password);

    //inserting the data into employee_table
    // $query = "INSERT INTO employee_table (Employee_number, Name, Email, Password) 
  	// 		  VALUES('$employee_number', '$name', '$email', '$password_encrypted')";
    // mysqli_query($conn, $query);
    // header('location: try.php');
}
?>