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
    if($data["password"] != $data["password2"]){
      $errors["password2"] = " * Passwords doesn't matches ! * ";
    }
  }

  function verify_required(&$data, &$errors){
    foreach ($data as $key => $value) {
      if(empty($data[$key])){
        $errors[$key] = " * This field is required! * ";
      }
    }
  }

  function validate_data($data, $errors){
    verify_required($data, $errors);
    verify_format($data, $errors);
    return $errors;

  }

?>
