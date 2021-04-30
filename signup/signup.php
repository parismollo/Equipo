<?php
  require_once("func_display.php"); require_once("func_valid.php");
  $errors = array();
  if(isset($_GET["action"])){
    $param = $_GET["action"];
    switch ($param) {
      case 'signup':
        $errors = validate_data($_POST, $errors);
        if (empty($errors)){
          process_data($_POST);
          echo "Success!";
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
