<?php
?>

<nav class="teal">
  <div class="container">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo right">Logo</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <?php if (isset($_SESSION["user_id"])) : ?>
          <li><a href="index.php">INDEX</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
          <?php else : ?>
            <li><a href="login.php">LOGIN</a></li>
          <li><a href="signup.php">SIGN UP</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>