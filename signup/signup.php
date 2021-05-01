<?php
  require_once("func_display.php"); require_once("func_valid.php"); require_once("../database/user.php");
  $errors = array();
  if(isset($_GET["action"])){
    $param = $_GET["action"];
    switch ($param) {
      case 'signup':
        $errors = validate_data($_POST, $errors);
        if (empty($errors)){
          form_validation($_POST);
          save_user($_POST);
          // 3.redirect to login
          // echo "Success!";
        }else{
          signup_form($errors);
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
