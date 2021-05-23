<?php
    require_once("../database/connection.php"); require_once("../database/user.php");

    function query_info(){
        $query = "SELECT * FROM users WHERE pseudo = '$_SESSION[user]';";
        return $query;
    }

    function get_user_tags($user){
      $tags  = array();
      $query = "SELECT label FROM userLabels WHERE user = '$user';";
      global $server, $user, $password, $database;
      $connection = connect_to_db($server, $user, $password, $database);
      if (isset($connection)){
        $res = mysqli_query($connection, $query);
        if(!$res){
          $error = mysqli_error($connection);
          // TODO: DELETE PROJECT
          echo "debug user_tag 1";
        }
        while ($row = mysqli_fetch_assoc($res)){
            foreach($row as $key => $value){
                $tags[] = $value;
            }
        }
      }else{
        echo "debug user tag result";
      }
      mysqli_close($connection);
      return $tags;
    }

    function update_user_query($user_input, $connection){
        foreach ($user_input as $key => $value) {
          if ($key!="labels"){
            $user_input[$key] =  mysqli_real_escape_string($connection, $user_input[$key]);
          }
        }
        $hash_pass = password_hash($user_input["password"], PASSWORD_DEFAULT);
        $query = "UPDATE users SET password='$hash_pass' WHERE pseudo='$_SESSION[user]';";
        return $query;
    }

    function update_user($user_input){
      global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        if(isset($connection)){
            $query = update_user_query($user_input, $connection);
            $res = mysqli_query($connection, $query);
            if(!$res){
                display_error_page("Connection failed", "profile.php");
                exit;
            }
            $tab = array();
            display_profile($tab, $tab, "Password changed successfully");
        }else{
            display_error_page("Connection failed", "profile.php");
            exit;
        }
        mysqli_close($connection);
    }

    function create_user_to_tag_query($user_pseudo, $label_value){
      $query = "INSERT INTO userLabels VALUES ('$user_pseudo', '$label_value');";
      return $query;
    }

    function save_user_to_tag($user_pseudo, $tag_label){
      global $server, $user, $password, $database;
      $connection = connect_to_db($server, $user, $password, $database);
      if (isset($connection)){
        $query = create_user_to_tag_query($user_pseudo, $tag_label);
        $res = mysqli_query($connection, $query);
        if(!$res){
          $error = mysqli_error($connection);
          // TODO: DELETE PROJECT
          echo "debug user_tag 1";
        }
      }else{
        // TODO: DELETE PROJECT
        echo "debug user_tag 2";
      }
      mysqli_close($connection);
    }

    function user_info(){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        if(isset($connection)){
            $query = query_info();
            $res = mysqli_query($connection, $query);
            if(!$res){
                display_error_page("Invalid Query !", "");
            }else{
                while ($row = mysqli_fetch_assoc($res)){
                    foreach($row as $key => $value){
                        $user_info[$key] = $value;
                    }
                }
            }
            return $user_info;
        }
    }


    function update_tags_user($user_input){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        if(isset($connection)){
            foreach ($user_input["labels"] as $key => $value) {
              save_user_to_tag($_SESSION["user"], $value);
            }
            $tab = array();
            display_profile($tab, $tab, "Tags added !");
        }else{
            display_error_page("Connection failed", "profile.php");
            exit;
        }
        mysqli_close($connection);
    }
?>
