<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Belog - Admin Dashboard</title>
  <?php include './base.php'; ?>
  <?php include './db_connect.php'; ?>

  <?php
  $user = $_COOKIE['user'];

  $sql_for_user_id = "SELECT * FROM users WHERE email = '$user'";

  $result_for_user_id = $conn->query($sql_for_user_id);
  $user_id_row = $result_for_user_id->fetch_assoc();
  $user_id = $user_id_row['id'];

  $sql_for_preferences = "SELECT * FROM user_preferences WHERE user_id = $user_id";

  // if user doesnt have preferences, create one

  $result_for_preferences = $conn->query($sql_for_preferences);

  if ($result_for_preferences->num_rows == 0) {
    $sql_for_preferences = "INSERT INTO user_preferences (user_id) VALUES ($user_id)";
    $conn->query($sql_for_preferences);
  }


  $pref_row = $result_for_preferences->fetch_assoc();

  ?>

</head>

<body>
  <?php include('header.php'); ?>
  <div class="main-container dashboard">
    <p><a href="./create_post.php">Yeni bir gönderi oluştur</a></p>
    <h1>Hesap Yönetimi</h1>
    <div class="dashboard-forms">
      <div>
        <h2>Email değiştir</h2>
        <form class='standard-form' action="./update_user.php" method="POST">
          <!-- user email can be modified -->
          <label class='mt-1' for="email">Email
            <input type="email" name="email" id="email" value="<?php echo $_COOKIE['user']; ?>"></label>
          <label for="password">Şifre
            <input type="password" name="password" id="password"></label>
          <label for="password_confirmation">Şifre Tekrarı
            <input type="password" name="password_confirmation" id="password_confirmation"></label>
          <input type="submit" value="Güncelle">
        </form>
      </div>
      <div>
        <h2>Varsayılan Belog Tasarım Ayarlarını değiştir</h2>
        <form class="standard-form pref-update-form" action="update_pref.php" method="POST">
          <label for="default_background_color_hex">Varsayılan Arkaplan Rengi(HEX kodu olarak)
            <input type="text" name="default_background_color_hex" id="default_background_color_hex" value="<?php echo $pref_row['default_background_color_hex']; ?>">
          </label>
          <label for="default_foreground_color_hex">Varsayılan Yazı Rengi(HEX kodu olarak)
            <input type="text" name="default_foreground_color_hex" id="default_foreground_color_hex" value="<?php echo $pref_row['default_foreground_color_hex']; ?>">
          </label>
          <label for="default_font_size_rem"> Varsayılan Yazı Boyutu (rem olarak)
            <input type="text" name="default_font_size_rem" id="default_font_size_rem" value="<?php echo $pref_row['default_font_size_rem']; ?>">
          </label>
          <label class="chbox-in-db" for="default_font_italic">Varsayılan Yazı İtalik mi?
            <input type="checkbox" name="default_font_italic" id="default_font_italic" <?php if ($pref_row['default_font_italic']) {
                                                                                          echo "checked";
                                                                                        } ?>>
          </label>
          <label class="chbox-in-db" for="default_font_bold">Varsayılan Yazı Kalın mı?
            <input type="checkbox" name="default_font_bold" id="default_font_bold" <?php if ($pref_row['default_font_bold']) {
                                                                                      echo "checked";
                                                                                    } ?>>
          </label>
          <input type="submit" value="Güncelle">
        </form>
      </div>
    </div>
  </div>
  <?php include './footer.php'; ?>
</body>

</html>