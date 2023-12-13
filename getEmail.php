<?php
function getStudentEmailById($conn, $id_number)
{
    $query = "SELECT email FROM student_table WHERE ID_number = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $id_number);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];

            // Close the result set
            mysqli_free_result($result);

            return $email;
        } else {
            echo 'Error in result: ' . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
