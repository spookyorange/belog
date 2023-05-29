<?php
include 'db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "UPDATE users SET email = '$email'  WHERE email = '$_COOKIE[user] AND password = '$password''";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . " - Name: " . $row["email"] . " " . $row["password"] . "<br>";
  }

  //set the cookie
  setcookie('user', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
  // if we have a match, redirect to the home page
  header('Location: ./home.php');
} else {
  header('Location: ./sign_in.html');
}
