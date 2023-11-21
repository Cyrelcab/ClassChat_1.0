<?php
    //check id
function checkEmailExist($conn, $email) {
    $check_query = "SELECT * FROM student_table WHERE Email = '$email'";
    $result = mysqli_query($conn, $check_query);

    if ($result) {
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            // ID already exists in the database
           $email_exists = true;
        } else {
            // ID does not exist in the database
             $email_exists = false;
        }

        // Free the result set
        mysqli_free_result($result);

        return $email_exists;
    }else{
         // Handle the query error
        die("Error: " . mysqli_error($conn));
    }

}
?>