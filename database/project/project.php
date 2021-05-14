<?php
  require_once('C:\Users\paris\XAMPP\htdocs\Projet_universite\equipo\database\connection.php');
  $server = "localhost"; // change according to your settings
  $user = "root";
  $password = "";
  $database = "equipo";

  function create_project_query(&$user_input, $connection){
    foreach ($user_input as $key => $value) {
      $user_input[$key] =  mysqli_real_escape_string($connection, $user_input[$key]);
    } // get data form
    $title = $user_input["title"];
    $description = $user_input["description"];
    // TODO: add tags
    // TODO: add user relationship
    $query = "INSERT INTO projects VALUES ('$title', '$description');";
    return $query;
  }

  function save_project($user_input){
    global $server, $user, $password, $database;
    $connection = connect_to_db($server, $user, $password, $database);
    if (isset($connection)){
      $query = create_project_query($user_input, $connection);
      $res = mysqli_query($connection, $query);
      if (!$res){
        $error = mysqli_error($connection);
        // TODO: add title verification like in signup (pseudo)
        display_error_page($error, "profile.php");
        exit;
      }else{
        header('Location: ../profile/profile.php');
      }
    }else{
      display_error_page("Connection failed", "profile.php");
      exit;
    }
    mysqli_close($connection);
  }
?>
