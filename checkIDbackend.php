<?php
    //check id
function checkIDExist($conn, $id_number) {
    $check_query = "SELECT * FROM student_table WHERE ID_number = '$id_number'";
    $result = mysqli_query($conn, $check_query);

    if ($result) {
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            // ID already exists in the database
           $id_exists = true;
        } else {
            // ID does not exist in the database
             $id_exists = false;
        }

        // Free the result set
        mysqli_free_result($result);

        return $id_exists;
    }else{
         // Handle the query error
        die("Error: " . mysqli_error($conn));
    }

}
?>