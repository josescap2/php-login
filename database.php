<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'login_php';

$mysqli = @new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);

if ($mysqli->connect_error) {
  die('Error: '.$mysqli->connect_error);
}
