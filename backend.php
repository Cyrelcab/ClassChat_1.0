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

//function for adding in database
function addDatabase( $conn, $id_number, $name, $email, $password_encrypted){
    //inserting the data into student_table
    $query = "INSERT INTO student_table (ID_number, Name, Email, Password) 
    VALUES('$id_number', '$name', '$email', '$password_encrypted')";
    mysqli_query($conn, $query);
    header('location: try.php');
}


//check if the signup button for the student has been click
if (isset($_POST['signupStudent_btn'])) {
    $id_number = $_POST['idNumberStudentSignup'];
    $name = $_POST['nameStudentSignup'];
    $email = $_POST['emailStudentSignup'];
    $password = $_POST['passwordStudentSignup'];
    $confirm_password = $_POST['confirmPasswordStudentSignup'];
    $carsu_email = "@carsu.edu.ph";

    //check all the input fields if they are empty
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
        $id_error = "ID Field is empty";
    }else{
        //checking functions for email and the id
        $id_exists = checkIDExist($conn, $id_number);
        $email_exists = checkEmailExist($conn, $email);

        //check if the id number is existing in the database
        if(!$id_exists){

            //check if the inputted email is exist in the database
            if(!$email_exists){
                //check if the password and confirm password match
                if ($password === $confirm_password) {

                    //check if the password contains special characters like !@$%&
                    if (preg_match('/[!@$%&]/', $password)) {

                        //check if the password is 10 characters long
                        if (strlen($password) === 10) {
                            //encrypt the password
                            $password_encrypted = md5($password);

                            //calling the function to add in the database
                            addDatabase($conn, $id_number, $name, $email, $password_encrypted);
                        }else{
                            $password_error = "Password must 10 characters long";
                            $confirm_password_error = "Password must 10 characters long";
                        }
                    }else{
                        $password_error = "Password must contain characters !@$%&";
                        $confirm_password_error = "Password must contain characters !@$%&";
                    }
                }else{
                    $password_error = "Password did not match";
                    $confirm_password_error = "Password did not match";
                }
            }else{
                $email_exist_error = "Email is Already Exists!";
            }
        }else{
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
    $employee_number = $_POST['employeeNumberSignup'];
    $name = $_POST['nameEmployeeSignup'];
    $email = $_POST['emailEmployeeSignup'];
    $password = $_POST['passwordEmployeeSignup'];

    //encrypt the password
    $password_encrypted = md5($password);

    //inserting the data into employee_table
    $query = "INSERT INTO employee_table (Employee_number, Name, Email, Password) 
  			  VALUES('$employee_number', '$name', '$email', '$password_encrypted')";
    mysqli_query($conn, $query);
    header('location: try.php');
}