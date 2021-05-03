<?php
  // FIXME: session_start();
  // FIXME: require_once("display_functions.php"); require_once("handle_input_data.php");
  $errors = array();
  if (isset($_GET["action"])){
    switch ($_GET["action"]) {
      case 'login':
        if (empty($_POST)){
          header('Location: login.php');
        }else {
          $errors = get_errors($_POST, $errors);
          $is_valid = is_valid($_POST);
          if ($is_valid){
            // TODO: login_user($_POST);
          }else {
            // TODO: display_login_form($errors);
          }
        }
        break;
      case 'reset':
      // TODO: Write function reset_user_session();
      // TODO: redirect;
        break;
      default:
        // TODO: display_login_form($errors)
        break;
    }
  }else{
    // TODO: if session  -> redirect to profile + reset button
    }else {
      // TODO display_login_form($errors);
    }
  }
?>
