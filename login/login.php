<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  require_once("func_display.php"); require_once("func_valid.php"); require_once("../database/user.php");
  $errors = array();
  if (isset($_GET["action"])){
    switch ($_GET["action"]) {
      case 'login':
        if (empty($_POST)){
          header('Location: login.php');
          echo "here";
        }else {
          $errors = get_errors_login($_POST, $errors);
          $is_valid = is_valid_login($_POST);
          if ($is_valid){
            login_user($_POST);
          }else {
            login_form($errors, "");
          }
        }
        break;
      case 'reset':
        reset_user_session();
        break;
      default:
        login_form($errors, "");
        break;
    }
  }else{
    if(isset($_SESSION['user'])){
      header('Location: ../profile/profile.php');
    }else{
      login_form($errors, "");
    }
  }
?>
