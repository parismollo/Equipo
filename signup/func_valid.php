<?php
/*
1. Traitement formulaire
- espace inutiles
- caracteres speciaux
- valide format mot de passe
- required
*/

  function process_field($input){
    if (!empty($input)){
      $input = htmlspecialchars(trim($input));
    }
    return $input;
  }

  function process_data(&$data){
    foreach ($data as $key => $value) {
      $data[$key] = process_field($value);
    }
  }

  function verify_format(&$data, &$errors){
    $ok = true;
    if($data["password"] != $data["password2"]){
      $errors["password2"] = " * Passwords doesn't matches ! * ";
      $ok = false;
    }
    return $ok;
  }

  function verify_required(&$data, &$errors){
    $ok = true;
    foreach ($data as $key => $value) {
      if(empty($data[$key])){
        $errors[$key] = " * This field is required! * ";
        $ok = false;
      }
    }
    return $ok;
  }

  function validate_data($data, $errors){
    if(verify_required($data, $errors) && verify_format($data, $errors)){
      return true ;
    }else {
      return false;
    }
  }

?>
