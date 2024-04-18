<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "test2";
// Connect to database
$conn = new mysqli($servername, $username, $password, $database);

// Get the data from json
$data = json_decode(file_get_contents('php://input'), true);

$name = $data["name"];
$location = $data["location"];
$teacher_count = (int) $data["teacherCount"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    if (!empty($data)) {
        $sql = "INSERT INTO TEACHER(name, location, teachers) VALUES ('$name', '$location', $teacher_count)";

        $result = $conn->query($sql);

        if ($result) {
            echo json_encode("Data inserted successfully");
        } else {
            echo "Error";
        }
    } else {
        echo "Cannot get values";
    }

} catch (ex) {
    echo "error in sql";
    echo ex;
}

$conn->close();
