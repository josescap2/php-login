<?php
  session_start();

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'partials/meta.php'?>
  <title>My first PHP page</title>
</head>

<body>
  <?php require 'partials/header.php'?>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="card teal">
          <div class="card-content white-text">
            <span class="card-title">Welcome dude to the best PHP page</span>
            <p>This is a very simple page altough we have the best login and signup form for you. Please go to the follow links.</p>
          </div>
          <div class="card-action">
            <a href="login.php">login</a>
            <a href="signup.php">signup</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
</body>

</html>