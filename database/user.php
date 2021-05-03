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
        // TODO: return false for login
      }else {
        echo "It works!";
        // TODO: return true to start login
      }
    }else{
      display_error_page("Connection failed", "signup.php");
      // TODO: Return false for login
    }
  }

  function login_query(&$user_input, $connection){
    foreach ($user_input as $key => $value) {
      $user_input[$key] = mysqli_real_escape_string($connection, $user_input[$key]);
    }
    $nickname = $user_input["pseudo"];
    $query = "SELECT * FROM users WHERE pseudo = '$pseudo' LIMIT 1;";
    return $query;
  }

  function get_user($connection, $query){
    $res = mysqli_query($connection, $query);
    return $res;
  }


  // function set_user_session(){
  //
  // }

  // function reset_user_session(){
  //
  // }

  function login_user($user_input){
    $connection = connect_to_db();
    if (isset($connection)){
      // TODO: $query = login_query($user_input, $connection);
      // TODO: $result = get_user($connection, $query);
      if (!$result){
        // TODO: display_error_page();
      }else {
        while ($row = mysqli_fetch_assoc($result)){
          if(password_verify($user_input["password"], $row["password"])){
            // TODO: display_success_page();
            // TODO: set_user_session($user_input["pseudo"]);
          }else {
            // TODO: create error array and set manually as wrong password or something
            // TODO: display_login_form($errors)
            break;
          }
        }
      }
    }
  }
?>
