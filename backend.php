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
$user_error = null;
$user_password = null;
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

            if (strpos($email, $carsu_email) !== false) {

                //check if the inputted email is exist in the database
                if (!$email_exists) {

                    //check if the password and confirm password match
                    if ($password === $confirm_password) {

                        //check if the password contains special characters like !@$%&
                        if (preg_match('/[!@$%&]/', $password)) {

                            //check if the password is 12 characters long
                            if (strlen($password) >= 12) {

                                //generate code to send in email
                                $otp_code = rand(100000, 999999);

                                //send otp code to email
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
                                $mail->Subject = "Email Verification";
                                $mail->Body = "Your 6 Digit Verification Code: " . $otp_code;
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
                                    session_start();

                                    $_SESSION['users_id'] = $id_number;
                                    $_SESSION['users_name'] = $name;
                                    $_SESSION['users_password'] = $password;
                                    $_SESSION['users_email'] = $email;
                                    $_SESSION['verification_code'] = $otp_code;
                                    $_SESSION['verification_code_timestamp'] = time();
                                    $_SESSION['verification_msg'] = "We emailed you the six digit code to " . $email . "<br/> Enter the code below to confirm your email address";
                                    header('location: verification_student.php');
                                }
                            } else {
                                $password_error = "Password must atleast 12 characters long";
                                $confirm_password_error = "Password must atleast 12 characters long";
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
            } else {
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
        $id_error = "Employee Number Field is empty";
    } else {
        //check email and id if exist
        $id_exists = checkEmployeeId($conn, $id_number);
        $email_exists = checkEmployeeEmail($conn, $email);

        //check if the employee id number is existing in the database
        if (!$id_exists) {
            //check if the email is carsu email
            if (strpos($email, $carsu_email) !== false) {
                //check if the email is already exist in the database
                if (!$email_exists) {
                    //check if the password and confirm password match
                    if ($password === $confirm_password) {
                        //check if the password contains special characters like !@$%&
                        if (preg_match('/[!@$%&]/', $password)) {
                            //check if the password is 12 characters long
                            if (strlen($password) >= 12) {
                                //generate code to send in email
                                $otp_code = rand(100000, 999999);

                                //send otp code to email
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
                                $mail->Subject = "Email Verification";
                                $mail->Body = "Your 6 Digit Verification Code: " . $otp_code;
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
                                    session_start();

                                    $_SESSION['users_id'] = $id_number;
                                    $_SESSION['users_name'] = $name;
                                    $_SESSION['users_password'] = $password;
                                    $_SESSION['users_email'] = $email;
                                    $_SESSION['verification_code'] = $otp_code;
                                    $_SESSION['verification_code_timestamp'] = time();
                                    $_SESSION['verification_msg'] = "We emailed you the six digit code to " . $email . "<br/> Enter the code below to confirm your email address";
                                    header('location: verification_employee.php');
                                }
                            } else {
                                $password_error = "Password must atleast 12 characters long";
                                $confirm_password_error = "Password must atleast 12 characters long";
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
            } else {
                $email_error = "Invalid email! Use @carsu.edu.ph";
            }
        } else {
            $id_exist_error = "Employee Number is Already Exists!";
            $name_error = null;
            $email_error = null;
            $password_error = null;
            $confirm_password_error = null;
        }
    }
}

if (isset($_POST['btn-verify'])) {
    // Assuming you have already generated and stored the verification code in a session variable
    $generated_code = $_SESSION['verification_code'];
    $timestamp_generated = $_SESSION['verification_code_timestamp'];

    //variables to be input in the database
    $id_number = $_SESSION['users_id'];
    $name = $_SESSION['users_name'];
    $email = $_SESSION['users_email'];
    $password = $_SESSION['users_password'];
    // Collect user input from the form
    $user_input = '';
    for ($i = 1; $i <= 6; $i++) {
        $input_name = 'code' . $i;
        if (isset($_POST[$input_name])) {
            $user_input .= $_POST[$input_name];
        }
    }

    $user_input = trim($user_input);
    $generated_code = trim($generated_code);

    // Compare user input with the generated code
    if ($user_input === $generated_code) {
        $current_timestamp = time();
        $time_difference = $current_timestamp - $timestamp_generated;

        $verification_time_limit = 60;

        if ($time_difference <= $verification_time_limit) {
            //encrypt the password
            $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO student_table (ID_number, Name, Email, Password, verification_code) 
                                VALUES('$id_number', '$name', '$email', '$password_encrypted', '$generated_code')";
            mysqli_query($conn, $query);
            $_SESSION['idNumber'] = $id_number;
            header('location: dashboard_student.php');
        }else{
            // Verification code has expired
            echo "Verification code has expired!";
        }
    } else {
        // Verification failed, display an error message or redirect
        echo "Verification failed!";
    }
}

if (isset($_POST['btn-verify-employee'])) {
    // Assuming you have already generated and stored the verification code in a session variable
    $generated_code = $_SESSION['verification_code'];

    //variables to be input in the database
    $id_number = $_SESSION['users_id'];
    $name = $_SESSION['users_name'];
    $email = $_SESSION['users_email'];
    $password = $_SESSION['users_password'];
    // Collect user input from the form
    $user_input = '';
    for ($i = 1; $i <= 6; $i++) {
        $input_name = 'code' . $i;
        if (isset($_POST[$input_name])) {
            $user_input .= $_POST[$input_name];
        }
    }

    $user_input = trim($user_input);
    $generated_code = trim($generated_code);

    // Compare user input with the generated code
    if ($user_input === $generated_code) {
        //encrypt the password
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO employee_table (Employee_number, Name, Email, Password, verification_code) 
                                VALUES('$id_number', '$name', '$email', '$password_encrypted', '$generated_code')";
        mysqli_query($conn, $query);
        header('location: try.php');
    } else {
        // Verification failed, display an error message or redirect
        echo "Verification failed!";
    }
}

if (isset($_POST['login_student_btn'])) {
    $id_number = trim($_POST['idNumber']);
    $user_password = trim($_POST['passwordStudent']);

    if (empty($id_number)) {
        $id_error = "ID Field is empty!";
    }
    else if (empty($user_password)) {
        $password_error = "Password Field is empty!";
    } else {
        // No need to hash the password here
        $query = "SELECT * FROM student_table WHERE ID_number = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $id_number);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    $hashed_password = $row['Password'];

                    // Check if the password matches
                    if (password_verify($user_password, $hashed_password)) {
                        $_SESSION['idNumber'] = $id_number;
                        $_SESSION['success'] = 'You are successfully logged in!';
                        header('location: dashboard_student.php');
                        exit();
                    } else {
                        $password_error = 'Incorrect Password';
                    }
                } else {
                    $user_error = 'Student Account not found';
                }

                mysqli_stmt_close($stmt);
            } else {
                echo 'Error in result: ' . mysqli_error($conn);
            }
        } else {
            echo "Error in statement: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
