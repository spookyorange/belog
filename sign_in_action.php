<?php

// connect to mysql from db_connect.php
include './db_connect.php';

// get username and password from form
$email = $_POST['email'];
$password = $_POST['password'];


// check if username and password are in database
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["password"]. "<br>";
    }

    //set the cookie
    setcookie('user', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
    // if we have a match, redirect to the home page
    header('Location: ./home.php');
} else {
    print "No match found";
    header('Location: ./sign_in.php');
}
$conn->close();
