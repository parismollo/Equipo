<?php
  require_once('connection.php');
  require_once('../signup/func_display.php');
  $server = "localhost"; // change according to your settings
  $user = "root";
  $password = "";
  $database = "equipo";

  function create_project_query(&$user_input, $connection){
    foreach ($user_input as $key => $value) {
      if ($key != "labels"){
        $user_input[$key] =  mysqli_real_escape_string($connection, $user_input[$key]);
      }
    }
    $title = $user_input["title"];
    $description = $user_input["description"];
    $query = "INSERT INTO projects VALUES ('$title', '$description');";
    return $query;
  }


  function create_user_to_project_query($user_pseudo, $project_name){
    $query = "INSERT INTO userProject VALUES ('$user_pseudo', '$project_name');";
    return $query;
  }

  function create_project_to_tag_query($user_input, $label_value){
    $project = $user_input["title"];
    $query = "INSERT INTO projectLabels VALUES ('$project', '$label_value');";
    return $query;
  }


  function save_project_to_tag($user_input, $tag_label){
    global $server, $user, $password, $database;
    $connection = connect_to_db($server, $user, $password, $database);
    if (isset($connection)){
      $query = create_project_to_tag_query($user_input, $tag_label);
      $res = mysqli_query($connection, $query);
      if(!$res){
        $error = mysqli_error($connection);
        // TODO: DELETE PROJECT
        echo "debug tag 1";
      }else {
        header('Location: ../profile/profile.php');
      }
    }else{
      // TODO: DELETE PROJECT
      echo "debug tag 2";
    }
    mysqli_close($connection);
  }

  function save_user_to_project($user_pseudo, $project_name){
    global $server, $user, $password, $database;
    $connection = connect_to_db($server, $user, $password, $database);
    if (isset($connection)){
      $query = create_user_to_project_query($user_pseudo, $project_name);
      $res = mysqli_query($connection, $query);
      if (!$res){
        $error = mysqli_error($connection);
        // TODO: DELETE PROJECT
        echo "debug1";
      }else{
        header('Location: ../profile/profile.php');
      }
    }else{
      // TODO: DELETE PROJECT
      echo "debug2";
    }
    mysqli_close($connection);
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
        display_error_page($error, "../profile/profile.php");
        exit;
      }else{
        save_user_to_project($_SESSION["user"], $user_input["title"]);
        foreach ($user_input["labels"] as $key => $value) {
          save_project_to_tag($user_input, $value);
        }
        header('Location: ../profile/profile.php');
      }
    }else{
      display_error_page("Connection failed", "../profile/profile.php");
      exit;
    }
    mysqli_close($connection);
  }
?>
