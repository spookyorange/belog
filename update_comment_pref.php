<?php
include 'db_connect.php';

$user = $_COOKIE['user'];

$sql_for_user_id = "SELECT * FROM users WHERE email = '$user'";
$result_for_user_id = $conn->query($sql_for_user_id);
$user_id_row = $result_for_user_id->fetch_assoc();
$user_id = $user_id_row['id'];

$default_comment_bg_c_hex = $_POST['default_comment_bg_c_hex'];
$default_comment_fg_c_hex = $_POST['default_comment_fg_c_hex'];
$default_comment_font_size_rem = $_POST['default_comment_font_size_rem'];

$default_comment_font_italic = $_POST['default_comment_font_italic'];
if ($default_comment_font_italic) {
  $default_comment_font_italic = 1;
} else {
  $default_comment_font_italic = 0;
}

$default_comment_font_bold = $_POST['default_comment_font_bold'];
if ($default_comment_font_bold) {
  $default_comment_font_bold = 1;
} else {
  $default_comment_font_bold = 0;
}

$sql_for_preferences = "UPDATE user_preferences SET default_comment_bg_c_hex = '$default_comment_bg_c_hex', default_comment_fg_c_hex = '$default_comment_fg_c_hex', default_comment_font_size_rem = '$default_comment_font_size_rem', default_comment_font_italic = '$default_comment_font_italic', default_comment_font_bold = '$default_comment_font_bold' WHERE user_id = $user_id";

$result_for_preferences = $conn->query($sql_for_preferences);

header('Location: ./admin_dashboard.php');
