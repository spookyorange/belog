<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Belog - Giriş yap</title>
  <?php include './base.php'; ?>
</head>
<body>
  <?php include('header.php'); ?>
  <div class="main-container">
    <div class="login-exclusive">
      <h1>Giriş Yap</h1>
      <form class="standard-form" action="sign_in_action.php" method="post">
        <label for="email">
          E-posta<input type="text" name="email" id="email" required>
        </label>        
        <label for="password">
          Şifre<input type="password" name="password" id="password" required>
        </label>
        <input type="submit" value="Giriş yap">
      </form>
      <a href="sign_up.php" class="secondary-button">Kayıt Ol</a>
    </div>
  </div>
  <?php include './footer.php'; ?>
</body>
</html>
