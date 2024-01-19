<!-- register.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ua";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password



$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful.";
    header("Location: login.html");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
