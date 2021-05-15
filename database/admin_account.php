<?php
    require_once('user.php');

    /*function table_query(){
        $query = ";";
        return $query;
    }

    function create_tables(){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        if(isset($connection)){
            $query = table_query();
            $res = mysqli_query($connection, $query);
            if(!$res){
                $error = mysqli_error($connection);
                display_error_page($error, "run_page.php");
                exit;
            }
        }else{
            display_error_page("Connection failed", "run_page.php");
            exit;
        }
        mysqli_close($connection);    
    }*/

    function create_admin_query($pseudo, $email, $hash_pass){
        $hash_pass = password_hash($hash_pass, PASSWORD_DEFAULT);
        $date = date("Y-m-d");
        $query = "INSERT INTO users VALUES ('$pseudo', '$email', ' ', '$date', '$hash_pass');";
        return $query;
    }

    function create_admin($pseudo, $email, $hash_pass){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        if(isset($connection)){
            $query = create_admin_query($pseudo, $email, $hash_pass);
            $res = mysqli_query($connection, $query);
            if(!$res){
                $error = mysqli_error($connection);
                display_error_page($error, "run_page.php");
                exit;
            }
        }else{
            display_error_page("Connection failed", "run_page.php");
            exit;
        }
        mysqli_close($connection);    
    }
?>