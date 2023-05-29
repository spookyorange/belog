<?php
include 'db_connect.php';

$user = $_COOKIE['user'];

$sql_for_user_id = "SELECT * FROM users WHERE email = '$user'";

$result_for_user_id = $conn->query($sql_for_user_id);

$user_id_row = $result_for_user_id->fetch_assoc();

$title = $_POST['title'];
$body = $_POST['body'];

$sql = "INSERT INTO posts (title, body, user_id) VALUES ('$title', '$body', $user_id_row[id])";

$result = $conn->query($sql);

header('Location: ./admin_dashboard.php');
