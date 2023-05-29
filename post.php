<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A Post</title>
  <?php include './base.php'; ?>

  <?php
  include './db_connect.php';
  $id = $_GET['id'];

  $sql = "SELECT * FROM posts WHERE id = $id";

  $result = $conn->query($sql);

  $row = $result->fetch_assoc();

  $user_id = $row['user_id'];
  $sql_for_preferences = "SELECT * FROM user_preferences WHERE user_id = $user_id";

  $result_for_preferences = $conn->query($sql_for_preferences);

  $pref_row = $result_for_preferences->fetch_assoc();
  ?>
  <style>
    body {
      background: #<?php echo $pref_row['default_background_color_hex']; ?>;
    }

    .main-container {
      color: #<?php echo $pref_row['default_foreground_color_hex']; ?>;
      font-size: <?php echo $pref_row['default_font_size_rem']; ?>rem;
      font-weight: <?php if ($pref_row['default_font_bold'] == 1) {
                      echo 'bold';
                    } else {
                      echo 'normal';
                    };
                    ?>;
      font-style: <?php if ($pref_row['default_font_italic'] == 1) {
                    echo 'italic';
                  } else {
                    echo 'normal';
                  };
                  ?>;
      margin-bottom: 2rem;
      margin-right: 2rem;
    }
    .post-container p {
      width: 100%;
      font-size: <?php echo $pref_row['default_font_size_rem']; ?>rem;
      font-weight: <?php if ($pref_row['default_font_bold'] == 1) {
                      echo 'bold';
                    } else {
                      echo 'normal';
                    };
                    ?>;
      font-style: <?php if ($pref_row['default_font_italic'] == 1) {
                    echo 'italic';
                  } else {
                    echo 'normal';
                  };
                  ?>;
    }
    </style>
</head>

<body>
  <?php include './header.php'; ?>
  <div class="main-container ">
    <div class='post-container'>
    <?php


    echo "<h1>" . $row['title'] . "</h1>";

    echo "<p>" . $row['body'] . "</p>";


    ?>
    </div>
  </div>
  <?php include './footer.php'; ?>
</body>

</html>