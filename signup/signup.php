<?php
  require_once("func_display.php"); require_once("func_valid.php"); require_once("../database/user.php");
  session_start();
  $errors = array();
  if(isset($_GET["action"])){
    $param = $_GET["action"];
    switch ($param) {
      case 'signup':
        if(isset($_SESSION['pseudo'])){
          header('Location: signup.php');
        }else{
          $errors = validate_data($_POST, $errors);
          if (empty($errors)){
            form_validation($_POST);
            if(save_user($_POST)){
              header('Location: login.php');
            }  
          }else{
            signup_form($errors);
          }
        }
        break;     
      default:
        signup_form($errors); // display fonctions
        break;
    }
  }else {
    signup_form($errors);
  }


?>
