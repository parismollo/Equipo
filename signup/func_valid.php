<?php
  function process_field($input){
    if (!empty($input)){
      $input = htmlspecialchars(trim($input));
    }
    return $input;
  }

  function form_validation(&$data){
    foreach ($data as $key => $value) {
      $data[$key] = process_field($value);
    }
  }

  function get_password_error(&$data, &$errors){
    if($data["password"] != $data["password2"]){
      $errors["password2"] = " * Passwords doesn't matches ! * ";
    }
  }

  function is_password_valid(&$data){
    if($data["password"] != $data["password2"]){
      return false;
    }
    return true;
  }

  function get_required_errors(&$data, &$errors){
    foreach ($data as $key => $value) {
      if(empty($data[$key])){
        $errors[$key] = " * This field is required! * ";
      }
    }
  }

  function is_required_valid(&$data){
    foreach ($data as $key => $value) {
      if(empty($data[$key])){
        return false;
      }
    }
    return true;
  }

  function get_errors($data, $errors){
    get_password_error($data, $errors);
    get_required_errors($data, $errors);
    return $errors;

  }

  function is_valid($data){
    $check_1 = is_required_valid($data);
    $check_2 = is_password_valid($data);
    return ($check_1 && $check_2);

  }

?>
