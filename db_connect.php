
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "unsafe_php";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>