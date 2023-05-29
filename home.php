<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Belog</title>
  <?php include './base.php'; ?>

</head>

<body>
  <?php include './header.php'; ?>
  <div class="main-container home">
    <?php
    // check if the user is logged in
    if (!isset($_COOKIE['user'])) {
      header('Location: ./sign_in.php');
    }
    ?>
    <h1>Anasayfa</h1>

    <?php
    // get the user's name
    $user = $_COOKIE['user'];
    echo "<p>Hoşgeldin, $user <a href='admin_dashboard.php'>yönetici paneline gidebilir</a>, hesap ayarlarını yapabilir ve gönderi paylaşabilirsin</p>";
    ?>
    <p>
      Hoşgeldiniz, toplam
      <?php
      include './db_connect.php';

      $sql = "SELECT * FROM posts LIMIT 20";

      // get the result
      $result = $conn->query($sql);
      echo $result->num_rows;
      ?>
      gönderi var
    </p>
    <h1>Gönderiler</h1>
    <ul>
      <?php
      // loop through the results
      while ($row = $result->fetch_assoc()) {
        echo '<a href="post.php?id=' . $row["id"] . '">' .  "<li>" . $row["title"] . "</li></a>";
      }
      ?>
    </ul>
  </div>
  <?php include './footer.php'; ?>
</body>

</html>