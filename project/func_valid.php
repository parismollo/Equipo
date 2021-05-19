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


  function get_required_errors(&$data, &$errors){
    if (!isset($data["labels"])){
      $errors["labels"] = " This field is required!";
    }
    foreach ($data as $key => $value) {
      if(empty($data[$key])){
        $errors[$key] = " This field is required!";
      }
    }
  }

  function is_required_valid(&$data){
    if (!isset($data["labels"])){return false;}
    foreach ($data as $key => $value) {
      if(empty($data[$key])){
        return false;
      }
    }
    return true;
  }

  function get_errors($data, $errors){
    get_required_errors($data, $errors);
    return $errors;

  }

  function is_valid($data){
    $check_1 = is_required_valid($data);
    return $check_1;

  }

?>
