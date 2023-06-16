<?php

// we get title and content from the form
// db takes title, body, user_id and post_id
// user_id is the id of the user who is creating the comment
// post_id is the id of the post that the comment is being created for
// we get user_id from the cookie
// we get post_id from post hidden input
// we get title and content from the form
// we insert the comment into the db
// we redirect the user to the post page
// connect to db
include './db_connect.php';

// get user_id from cookie
$user = $_COOKIE['user'];

// get post_id from hidden input
$post_id = $_POST['post_id'];

// get title and content from form
$title = $_POST['title'];
$content = $_POST['content'];

// get user_id from db
$sql_for_user_id = "SELECT * FROM users WHERE email = '$user'";
$result_for_user_id = $conn->query($sql_for_user_id);
$user_id_row = $result_for_user_id->fetch_assoc();
$user_id = $user_id_row['id'];

// insert comment into db
$sql = "INSERT INTO comments (title, body, user_id, post_id) VALUES ('$title', '$content', $user_id, $post_id)";
$result = $conn->query($sql);

// redirect to post page
header('Location: ./post.php?id=' . $post_id);
