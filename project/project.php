<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once("../database/project.php");
  require_once("func_display.php");
  session_start();
  $errors = array();


  if(isset($_GET["action"])){
    switch ($_GET["action"]) {
      case 'create_project':
        if (empty($_POST)){
          header('Location: profile.php');
        }else{
          // TODO: check if user is logged
          // TODO: get form errors;
          // TODO: validate form data;
          save_project($_POST);
        }
        break;

      default:
        project_form($errors, "");
        break;
    }
  }else{
    project_form($errors, "");
  }


?>
