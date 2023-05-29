<?php

// next step of creating the account
// connect to mysql from db_connect.php
include './db_connect.php';

// get username and password from form
$email = $_POST['email'];
$password = $_POST['password'];

// check if username and password are in database
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
$result = $conn->query($sql);

if ($result === TRUE) {
    //set the cookie
    setcookie('user', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
    // if we have a match, redirect to the home page
    header('Location: ./home.php');
} else {
    print "No match found";
    header('Location: ./sign_in.html');
}

$conn->close();

?>