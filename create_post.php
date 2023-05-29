<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belog - Gönderi oluştur</title>
  <?php include './base.php'; ?>
</head>

<body>
  <?php include('header.php'); ?>
  <div class="main-container">
    <?php
    // check if the user is logged in
    if (!isset($_COOKIE['user'])) {
      header('Location: ./sign_in.html');
    }
    ?>
    <h1>Gönderi Oluştur</h1>
    <form class="post-creation-form" action="create_the_post.php" method="POST">
      <label for="title">Başlık</label>
      <input type="text" name="title" id="title">
      <label for="body">Gönderi</label>
      <textarea name="body" id="body" cols="30" rows="10"></textarea>
      <input type="submit" value="Gönderi Oluştur">
    </form>
  </div>
  <?php include './footer.php'; ?>
</body>

</html>