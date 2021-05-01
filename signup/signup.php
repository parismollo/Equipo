<?php
  require_once("func_display.php"); require_once("func_valid.php"); require_once("../database/user.php");
  session_start();
  $errors = array();
  $wrong = " * Username or password are incorrects ! * ";
  if(isset($_GET["action"])){
    $param = $_GET["action"];
    switch ($param) {
      case 'signup':
        $errors = validate_data($_POST, $errors);
        if (empty($errors)){
          form_validation($_POST);
          if(save_user($_POST)){
            login_form($errors, "");
          }  
        }else{
          signup_form($errors);
        }
        break;
      case 'login':
        $errors = validate_data2($_POST, $errors);
        if (empty($errors)){
          form_validation($_POST);
          if(login_user($_POST)){
            header('Location: signup.php?action=welcome');
          } else{
            login_form($errors, $wrong);
          }
        } else{
          login_form($errors,"");
        }
        break;
      case 'signin':
        login_form($errors,"");
        break;  
      case 'welcome':
        echo "Welcome ".$_SESSION['pseudo'];
        break;    
      default:
        signup_form($errors); // display fonctions
        break;
    }
  }else {
    signup_form($errors);
  }


?>
