<?php
    require_once("../database/connection.php"); require_once("../database/user.php");

    function query_info(){
        $query = "SELECT * FROM users WHERE pseudo = '$_SESSION[user]';";
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
?>
