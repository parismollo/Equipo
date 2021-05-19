<?php
  require_once('user.php');

  function delete_userproject($project){
    global $server, $user, $password, $database;
    $connection = connect_to_db($server, $user, $password, $database);
    if (!$connection){
      display_error_page("Connection failed", "profile.php");
      exit;
    }else{
      $query = "DELETE FROM userProject WHERE project='$project';";
      $result = mysqli_query($connection, $query);
      if(!$result){
        display_error_page(mysqli_error($connection), "profile.php");
        exit;
      }
    }
  }

  function delete_projectLabels($project){
    global $server, $user, $password, $database;
    $connection = connect_to_db($server, $user, $password, $database);
    if (!$connection){
      display_error_page("Connection failed", "profile.php");
      exit;
    }else{
      $query = "DELETE FROM projectLabels WHERE project='$project';";
      $result = mysqli_query($connection, $query);
      if(!$result){
        display_error_page(mysqli_error($connection), "profile.php");
        exit;
      }
    }
  }

  function delete_project($project){
    global $server, $user, $password, $database;
    $connection = connect_to_db($server, $user, $password, $database);
    if (!$connection){
      display_error_page("Connection failed", "profile.php");
      exit;
    }else{
      $query = "DELETE FROM projects WHERE title='$project';";
      $result = mysqli_query($connection, $query);
      if(!$result){
        display_error_page(mysqli_error($connection), "profile.php");
        exit;
      }
    }
  }

?>