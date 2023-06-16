<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Yorum Ekle - Belog</title>
  <?php include './base.php'; ?>
  <?php
  include './db_connect.php';
  $post_id = $_GET['id'];
  $post_itself = "SELECT * FROM posts WHERE id = $post_id";
  $result_for_post = $conn->query($post_itself);
  $user_id = $result_for_post->fetch_assoc()['user_id'];

  $pref_row_query = "SELECT * FROM user_preferences WHERE user_id = $user_id";
  $pref_row_result = $conn->query($pref_row_query);
  $pref_row = $pref_row_result->fetch_assoc();
  ?>
  <style>
    body {
      background: #<?php echo $pref_row['default_background_color_hex']; ?>
    }

    .main-container {
      margin-right: 2rem;
      margin-bottom: 2rem;
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
                  ?>
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

  <?php include('header.php'); ?>
  <!-- creating a comment -->
  <div class="main-container">
    <div class="post-creation-form">
      <h1>Yorum Ekle</h1>
      <form class="standard-form" action="create_comment_action.php" method="post">
        <label for="title">
          Başlık<input type="text" name="title" id="title" required>
        </label>
        <label for="content">
          İçerik<textarea name="content" id="content" cols="30" rows="10" required></textarea>
        </label>
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <input type="submit" value="Yorum Ekle">
      </form>
    </div>
  </div>

  <?php include './footer.php'; ?>
</body>

</html>