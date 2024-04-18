<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "test2";
// Connect to database
$conn = new mysqli($servername, $username, $password, $database);
// Variable name = keyword constructor(localhost, root, , test2);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Connection check
// echo();

$sql = "SELECT * from TEACHER";
$result = $conn->query($sql);

$sql_result = array();
if ($result->num_rows > 0) {
    // Checks whether the result is empty
    while ($row = $result->fetch_array()) {
        // $sql_result[""]
        $sql_result[] = array("id" => $row["id"], "name" => $row["name"], "address" => $row["location"], "teachers" => $row["teachers"]);
    }
}
echo json_encode($sql_result);
$conn->close();