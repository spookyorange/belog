<div>
  <ul class="header-menu" style="">
    <li><a href="/home.php">Anasayfa</a></li>
    <li><a href="/about.php">Hakkımızda</a></li>
    <li><a href="/contact.php">İletişim</a></li>
    <?php
    if (isset($_COOKIE['user'])) {
      echo '<li><a href="/admin_dashboard.php">Hesap Yönetim Paneli</a></li>';
      echo '<li><a href="/sign_out.php">Çıkış Yap</a></li>';
    } else {
      echo '<li><a href="/sign_in.html">Giriş Yap</a></li>';
    }
    ?>
  </ul>
</div>