<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('../database/admin_account.php');
    session_start();

    create_admin("admin_yacine", "admin1", "admin01");
    create_admin("admin_paris", "admin2", "admin02");
    header('Location: ../signup/signup.php');
?>