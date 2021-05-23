<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('../database/search_bar_query.php'); require_once('func_display.php');
    session_start();
    $errors = array();

    if(isset($_SESSION["user"])){
        if(isset($_GET["action"])){
            switch($_GET["action"]){
                case 'valid':
                    if (empty($_POST)){
                        header('Location: search_bar.php');
                    }else{
                        $project = fusion_tab($_POST['project']);
                        display_home($project, $_GET["action"]);
                    }
                    break;
                default:
                    display_home($errors, "");
                    break;
            }
        } else{
            display_home($errors, "");
        }
    }else{
        header('Location: ../signup/signup.php');
    }
?>
