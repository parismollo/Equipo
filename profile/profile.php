<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once("func_display.php"); require_once("func_query.php");
    session_start();

    if(isset($_SESSION["user"])){
        display_profile(user_info());
    }else{
        header('Location: /Projects/Equipo/login/login.php');
    }
?>