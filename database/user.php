<!-- User table related functions -->
<?php
  require_once("connection.php"); require_once("../signup/func_display.php");// Might be redudant if this is already in signup file
  $server = "localhost"; // change according to your settings
  $user = "root";
  $password = "";
  $database = "equipo";

  function insert_user_query(&$user_input, $connection){
    foreach ($user_input as $key => $value) {
      $user_input[$key] =  mysqli_real_escape_string($connection, $user_input[$key]);
    }
    $hash_pass = password_hash($user_input["password"], PASSWORD_DEFAULT);
    $pseudo = $user_input["pseudo"];
    $query = "INSERT INTO users VALUES ('$pseudo', '$hash_pass');";
    return $query;

  }


  function save_user($user_input){
    global $server, $user, $password, $database;
    // 1. connection 2.generate insert query 3. insert user and handle return.
    $connection = connect_to_db($server, $user, $password, $database);
    if(isset($connection)){
      $query = insert_user_query($user_input, $connection);
      $res = mysqli_query($connection, $query);
      if(!$res){
        $error = mysqli_error($connection);
        display_error_page($error, "signup.php");
        return false;
      }else {
        return true;
      }
    }else{
      display_error_page("Connection failed", "signup.php");
      return false;
    }
  }

  function verify_user_query(&$user_input, $connection){
    foreach ($user_input as $key => $value) {
      $user_input[$key] =  mysqli_real_escape_string($connection, $user_input[$key]);
    }
    $login = $user_input['pseudo'];
    $query = "SELECT pseudo,password FROM users WHERE pseudo='$login';";
    return $query;
  }

  function login_user(&$user_input){
    global $server, $user, $password, $database;
    $connection = connect_to_db($server, $user, $password, $database);
    if(isset($connection)){
      $query = verify_user_query($user_input, $connection);
      $res = mysqli_query($connection, $query);
      mysqli_close($connection);
      if(!$res){
        $error = mysqli_error($connection);
        display_error_page($error, "login.php");
        return false;
      }
      while($line = mysqli_fetch_assoc($res)){
        if(password_verify($user_input['password'], $line['password'])){
          $_SESSION['pseudo'] = $line['pseudo'];
          return true;
        }
      }
      return false;
    }else{
      display_error_page("Connection failed", "login.php");
      return false;
    }
}
?>
