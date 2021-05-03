<?php
 require_once("../signup/func_valid.php");

 function get_errors_login($data, $errors){
   get_required_errors($data, $errors);
   return $errors;

 }
 function is_valid_login($data){
   $check_1 = is_required_valid($data);
   return ($check_1);
 }
?>
