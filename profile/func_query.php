<?php 
    require_once("../database/connection.php"); require_once("../database/user.php");

    function query_info(){
        $query = "SELECT * FROM users WHERE pseudo = '$_SESSION[user]';";
        return $query;
    }

    function update_user_query($user_input, $connection){
        foreach ($user_input as $key => $value) {
            $user_input[$key] =  mysqli_real_escape_string($connection, $user_input[$key]);
        }
        $hash_pass = password_hash($user_input["password"], PASSWORD_DEFAULT);
        $query = "UPDATE users SET password='$hash_pass' WHERE pseudo='$_SESSION[user]';";
        return $query;
    }

    function user_info(){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        if(isset($connection)){
            $query = query_info();
            $res = mysqli_query($connection, $query);
            if(!$res){
                display_error_page("Invalid Query !", "");
            }else{
                while ($row = mysqli_fetch_assoc($res)){
                    foreach($row as $key => $value){
                        $user_info[$key] = $value;
                    }
                }
            }
            return $user_info;            
        }
    }

    function update_user($user_input){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        if(isset($connection)){
            $query = update_user_query($user_input, $connection);
            $res = mysqli_query($connection, $query);
            if(!$res){
                display_error_page("Connection failed", "profile.php");
                exit;
            }
            $tab = array();
            display_profile($tab, $tab, "Password has been changed successfully !");
        }else{
            display_error_page("Connection failed", "profile.php");
            exit;
        }
        mysqli_close($connection);    
    }
?>