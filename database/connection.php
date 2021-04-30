<?php
function connect_to_db($server, $user, $password, $database){
  $connection = mysqli_connect($server, $user, $password, $database);
  if (!$connection) {
    echo "No connection with the server"; exit;
  }
  mysqli_set_charset($connection, "utf-8");
  return $connection;
}
?>
