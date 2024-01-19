<?php
// Retrieve the raw POST data
$input_data = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($input_data, true);

// Access the values from the decoded data
$status = $data['status'];
$time = $data['time'];
$username = $data['username'];

// Now you can use $status, $time, and $username as needed

// Example: Insert data into the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ua";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO attendance (status, time, username) VALUES ('$status', '$time', '$username')";

if ($conn->query($sql) === TRUE) {
    echo "Attendance saved successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
