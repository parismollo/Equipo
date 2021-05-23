<?php
  require_once('connection.php');
  require_once('user.php');

  function list_all_tags(){
    global $server, $user, $password, $database;
    $labels = array();
    // 1. connection 2.generate insert query 3. insert user and handle return.
    $connection = connect_to_db($server, $user, $password, $database);
    if (!$connection){
      // TODO: Display error page
      echo "bug1";
      exit;
    }else{
      $query = "SELECT label FROM tags;";
      $result = mysqli_query($connection, $query);
      if(!$result){
        // TODO: display error page
        echo "bug2";
        exit;
      }else{
        $row = mysqli_fetch_assoc($result);
        while ($row){
          $labels[] = $row["label"];
          $row = mysqli_fetch_assoc($result);
        }
      }
    }
    return $labels;
  }


?>
