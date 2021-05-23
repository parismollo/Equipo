<?php
    require_once('user.php');

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
                header('Location: ../signup/signup.php');
                exit;
            }
        }else{
            header('Location: ../signup/signup.php');
            exit;
        }
        mysqli_close($connection);
    }
?>
