<?php
require 'database.php';

if (!empty($_POST["email"]) && !empty($_POST["password"])) {
  if (!($sentence = $mysqli->prepare("INSERT INTO user(email, password) VALUES (?, ?)"))) {
    die("Sentence wasn't prepared: (" . $mysqli->errno . ") " . $mysqli->error);
  }

  $password_hashed = password_hash($_POST["password"], PASSWORD_BCRYPT);
  
  if (!$sentence->bind_param("ss", $_POST["email"], $password_hashed)) {
    die("Parameter could not bind successfully: (" . $sentence->errno . ") " . $sentence->error);
  }

  if (!$sentence->execute()) {
    die("Falló la ejecución: (" . $sentence->errno . ") " . $sentence->error);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'partials/meta.php' ?>
  <title>PHP page sign up</title>
</head>

<body>
  <?php require 'partials/header.php' ?>
  <div class="container">
    <h1 class="center-align">Sign up form</h1>
    <form action="signup.php" method="POST">
      <div class="row">
        <div class="input-field col s8 offset-s2">
          <input placeholder="Plese put you email" id="email" type="email" class="validate" name="email" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s8 offset-s2">
          <input placeholder="Plese put you password" id="password" type="password" class="validate" name="password" required>
          <label for="password">Password</label>
        </div>
        <div class="input-field col s8 offset-s2">
          <input placeholder="Put your password again" id="repeat" type="password" class="validate" name="repeat" required>
          <label for="repeat">Repeat password</label>
        </div>
        <button class="btn waves-effect waves-light col s4 offset-s4 teal" type="submit" name="action">Sign up
          <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
</body>

</html>