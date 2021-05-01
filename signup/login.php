<?php
  session_start();
  require_once("func_display.php"); require_once("func_valid.php"); require_once("../database/user.php");
  $wrong = " * Username or password are incorrects ! * ";
  $errors = array();
  if (isset($_GET["action"])){
    $param = $_GET["action"];
    switch ($param) {
      case 'login':
        if(isset($_SESSION['pseudo'])){
            header('Location: login.php');
          } else{
                if(isset($_POST['pseudo']) && isset($_POST['password'])){
                    $errors = validate_data2($_POST, $errors);
                    if (empty($errors)){
                    form_validation($_POST);
                    if(login_user($_POST)){
                        header('Location: login.php');
                    } else{
                        login_form($errors, $wrong);
                    }
                    } else{
                    login_form($errors,"");
                    }
                } else{
                    header('Location: login.php');
                }
        }  
        break;
      case 'reset':
        $_SESSION = array();
        session_destroy();
        header("Location: login.php");
        break;
      default:
        login_form($errors,"");
        break;
    }
  }else{
    if (isset($_SESSION["pseudo"])){
      echo "Yeah what's up ", $_SESSION["pseudo"], "?";
      echo "<br><a href=\"login.php?action=reset\">Reset Session</a>";
    }else {
      login_form($errors,"");
    }
  }
?>