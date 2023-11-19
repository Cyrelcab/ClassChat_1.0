<?php
    //check id
function checkIDExist($conn, $id_number) {
    $check_query = "SELECT * FROM student_table WHERE ID_number = '$id_number'";
    $result = mysqli_query($conn, $check_query);

    if (!$result) {
        // Handle the query error if needed
        die("Error in checkIDExist query: " . mysqli_error($conn));
    }

    $response = array('exists' => mysqli_num_rows($result) > 0);

    // Send the JSON response back to the JavaScript
    header('Content-Type: application/json');
    echo json_encode($response);
    return mysqli_num_rows($result) > 0;
}
?>