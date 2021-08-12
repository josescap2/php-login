<?php
require 'database.php';

$message = '';

if (!empty($_POST["email"]) && !empty($_POST["password"])) {
  if (!($sentence = $mysqli->prepare("SELECT id, email, password FROM user WHERE email=?"))) {
    die("Sentence wasn't prepared: (" . $mysqli->errno . ") " . $mysqli->error);
  }

  if (!$sentence->bind_param("s", $_POST["email"])) {
    die("Parameter could not bind successfully: (" . $sentence->errno . ") " . $sentence->error);
  }

  if (!$sentence->execute()) {
    die("Falló la ejecución: (" . $sentence->errno . ") " . $sentence->error);
  }

  $id = NULL;
  $email = NULL;
  $password = NULL;

  if (!$sentence->bind_result($id, $email, $password)) {
    die("Falló la vinculación de los parámetros de salida: (" . $sentencia->errno . ") " . $sentencia->error);
  }

  $sentence->fetch();
  
  if (password_verify($_POST["password"], $password) && strcmp($email, $_POST["email"]) === 0) {
    session_start();
    $_SESSION['user_id'] = $id;
    header('Location: /php-login');
  } else {
    $message = "Credenciales incorrectas";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'partials/meta.php' ?>
  <title>PHP page login</title>
</head>

<body>
  <?php require 'partials/header.php' ?>
  <div class="container">
    <h1 class="center-align">Login form</h1>
    <form action="login.php" method="post">
      <div class="row">
        <?php if (!empty($message)) : ?>
          <p class="col s4 offset-s4 center-align">
            <?php echo $message; ?>
          </p>
        <?php endif; ?>
        <div class="input-field col s8 offset-s2">
          <input placeholder="Plese put you email" id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s8 offset-s2">
          <input placeholder="Plese put you password" id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
        <button class="btn waves-effect waves-light col s4 offset-s4 teal" type="submit" name="action">Login
          <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
</body>

</html>