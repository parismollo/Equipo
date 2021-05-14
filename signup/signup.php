<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once("func_display.php"); require_once("func_valid.php"); require_once("../database/user.php");
  $errors = array();
  if(isset($_GET["action"])){
    switch ($_GET["action"]) {
      case 'signup':
        if (empty($_POST)){
          header('Location: signup.php');
        }else{
          $errors = get_errors($_POST, $errors);
          $is_valid = is_valid($_POST);
          if ($is_valid){
            form_validation($_POST);
            save_user($_POST);
          }else{
            signup_form($errors, "");
          }
        }
        break;
      default:
        signup_form($errors, "");
        break;
    }
  }else {
    signup_form($errors, "");
  }
?>
