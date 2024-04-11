<?php

$name = $_POST["name"];
$location = $_POST["location"];
$teacher_count = (int) $_POST["teacherCount"];
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "test2";
// Connect to database
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    // $sql = "SELECT * from TEACHER";
    $sql = "INSERT INTO TEACHER(name, location, teachers) VALUES ('$name', '$location', $teacher_count)";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode("Data inserted successfully");
    } else {
        echo "Error";
    }
} catch (ex) {
    echo "error in sql";
    echo ex;
}

$conn->close();
