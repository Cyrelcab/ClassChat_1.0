<?php
include('checkIDbackend.php');
include('checkEmailbackend.php');

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

/*connect to mysql*/
$conn = mysqli_connect($server_name, $username, $password, $db_name);

/*check if the database is successfully connected*/
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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