<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belog - Hesap oluştur</title>
  <?php include './base.php'; ?>
</head>

<body>
  <?php include('header.php'); ?>
  <div class="main-container">
  <div class="login-exclusive">
    <h1>Hesap Oluştur</h1>
    <form class="sign-up-form standard-form" action="create_the_account.php" method="POST">
      <label for="email">E-posta
      <input type="text" name="email" id="email"></label>
      <label for="password">Şifre
      <input type="password" name="password" id="password"></label>
      <input type="submit" value="Kayıt Ol">
    </form>
  <a class="secondary-button" href="sign_in.php">Giriş Yap</a>

  </div>
  </div>
  <?php include './footer.php'; ?>
</body>

</html>
