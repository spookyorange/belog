<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  $user_themselves = "SELECT * FROM users WHERE id = $user_id";
  $result_for_user = $conn->query($user_themselves);

  $user_email = $result_for_user->fetch_assoc()['email'];

  $comments = "SELECT * FROM comments INNER JOIN users ON users.id = comments.user_id INNER JOIN user_preferences ON users.id = user_preferences.user_id WHERE comments.post_id = $id";
  $result_for_comments = $conn->query($comments);
  // comments has all the things we need to display comments

  ?>
  <title>
    <?php echo $row['title']; ?> - Belog
  </title>
  <?php include './base.php'; ?>


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

    .add-comment {
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
      text-decoration: none;
      color: white;
      background: black;
      padding: 0.5rem;
      border-radius: 0.5rem;
      margin-left: 1rem;
    }
  </style>
</head>

<body>
  <?php include './header.php'; ?>
  <div class="main-container ">
    <div class='post-container'>
      <?php
      echo "<h1>" . $row['title'] . "</h1>";
      echo "<br/>";
      echo "<p>" . $row['body'] . "</p>";
      echo "<br/>";
      echo "<p class='underline'>" . $user_email . " tarafından paylaşıldı</p>";
      ?>
    </div>
    <br />
    <div>
      <h3>Yorumlar
        <?php
        echo $result_for_comments->num_rows;
        ?>
        <a class="add-comment" href="./create_comment.php?id=<?php echo $id; ?>">Yorum ekle</a>
      </h3>
      <div>
        <?php
        echo "<br/>";
        while ($comment_row = $result_for_comments->fetch_assoc()) {
          echo "<div class='comment-container' style='background: #" . $comment_row['default_comment_bg_c_hex'] . "; color: #" . $comment_row['default_comment_fg_c_hex'] . ";
          font-size: " . $comment_row['default_comment_font_size_rem'] . "rem; font-weight: " . $comment_row['default_comment_font_bold'] . "; font-style: " . $comment_row['default_comment_font_italic'] . ";
          border-radius: 2rem; padding: 1rem; margin-bottom: 1rem;
          '>";
          echo "<h4>" . $comment_row['title'] . "</h4>";
          echo "<br/>";
          echo "<p>" . $comment_row['body'] . "</p>";
          echo "<p class='underline'>" . $comment_row['email'] . " tarafından paylaşıldı</p>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>

  <?php include './footer.php'; ?>
</body>

</html>