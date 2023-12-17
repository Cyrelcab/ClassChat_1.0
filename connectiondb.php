<?php
//variables for the database connection
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "classchat_database";

/*connect to mysql*/
$conn = mysqli_connect($server_name, $username, $password, $db_name);

/*check if the database is successfully connected*/
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>