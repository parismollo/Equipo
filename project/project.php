<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once("../database/project.php");
  require_once("func_display.php");
  require_once("../database/delete_project.php");
  require_once("func_valid.php");
  session_start();
  $errors = array();

  if (isset($_SESSION["user"])){
    if (isset($_GET["project"])){
      // TODO: redirect to profile if pseudo = user session
      $colabs = get_project_collaborators($_GET["project"]);
      if (in_array($_SESSION["user"], $colabs)){ header("Location: ../profile/profile.php");}
      $project_title = $_GET["project"];
      $project_info = get_other_project_post($project_title);
      if (!empty($project_info)){
        display_other_project($project_info);
      }
      // TODO: error here
      echo "error";
      exit;
    }
    if(isset($_GET["action"])){
      switch ($_GET["action"]) {
        case 'create_project':
        if (empty($_POST)){
          header('Location: profile.php');
        }else{
          $errors = get_errors($_POST, $errors);
          $is_valid = is_valid($_POST);
          if ($is_valid){
            save_project($_POST);
          }else{
            project_form($errors, "");
          }
        }
        break;
        case "project_post":
        if (empty($_POST)){
          header("Location: profile.php");
        }else{
          $project_info = project_info($_POST["project"]);
          display_project($project_info);
        }
        break;
        case "delete":
        delete_userproject($_POST["project"]);
        delete_projectLabels($_POST["project"]);
        delete_project($_POST["project"]);
        display_delete_success();
        break;

        default:
        project_form($errors, "");
        break;
      }
    }else{
      project_form($errors, "");
    }
  }else{
    header('Location: ../login/login.php');
  }


?>
