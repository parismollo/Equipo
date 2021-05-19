<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once("func_display.php"); require_once("func_query.php"); require_once("../signup/func_valid.php");
    session_start();
    $errors = array();

    if(isset($_SESSION["user"])){
      if (isset($_GET["pseudo"])){
        // TODO: redirect to profile if pseudo = user session
        $user_pseudo = $_GET["pseudo"];
        $user_info = get_other_user_profile($user_pseudo);
        if (!empty($user_info)){
          display_other_profile($user_info);
        }
        // TODO: error here
        echo "error";
        exit;
      }
      if(isset($_GET["action"])){
          switch($_GET["action"]){
              case 'update':
                  $tab = array();
                  display_profile($tab, "", "");
                  break;
              case 'valid_update':
                  if (empty($_POST)){
                      header('Location: profile.php');
                  }else{
                      $tab = array();
                      $errors = get_errors($_POST, $errors);
                      $is_valid = is_valid($_POST);
                      if ($is_valid){
                          update_user($_POST);
                      }else {
                          display_profile($tab, $errors, "");
                      }
                  }
                  break;
              default:
                  display_profile(user_info(), "", "");
                  break;
          }
      }else{
          display_profile(user_info(), "", "");
      }
    }else{
        header('Location: ../login/login.php');
    }
?>
