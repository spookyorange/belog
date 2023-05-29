<?php
include 'db_connect.php';

$user = $_COOKIE['user'];

$sql_for_user_id = "SELECT * FROM users WHERE email = '$user'";
$result_for_user_id = $conn->query($sql_for_user_id);
$user_id_row = $result_for_user_id->fetch_assoc();
$user_id = $user_id_row['id'];

$default_background_color_hex = $_POST['default_background_color_hex'];
$default_foreground_color_hex = $_POST['default_foreground_color_hex'];
$default_font_size_rem = $_POST['default_font_size_rem'];

$default_font_italic = $_POST['default_font_italic'];
if ($default_font_italic) {
  $default_font_italic = 1;
} else {
  $default_font_italic = 0;
}

$default_font_bold = $_POST['default_font_bold'];
if ($default_font_bold) {
  $default_font_bold = 1;
} else {
  $default_font_bold = 0;
}

$sql_for_preferences = "UPDATE user_preferences SET default_background_color_hex = '$default_background_color_hex', default_foreground_color_hex = '$default_foreground_color_hex', default_font_size_rem = '$default_font_size_rem', default_font_italic = '$default_font_italic', default_font_bold = '$default_font_bold' WHERE user_id = $user_id";

$result_for_preferences = $conn->query($sql_for_preferences);

header('Location: ./admin_dashboard.php');
