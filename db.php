<?php

$localhost = "localhost";
$username = "root";
$password = "";
$db_name = "student_grading";

$conn = new mysqli($localhost, $username, $password, $db_name);

if ($conn->connect_error)
    die("Connect failed: " . $conn->connect_error);

?>