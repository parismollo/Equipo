<?php 
    require_once('user.php');

    function search_project($project){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        $tab_project = array();
        if (isset($connection)){
            $query = "SELECT title, description FROM projects WHERE title='$project';";
            $result = mysqli_query($connection, $query);
            if (!$result){
                $error = mysqli_error($connection);
                display_error_page($error, "");
                exit;
            }else {
                while ($row = mysqli_fetch_assoc($result)){
                    $tab_project[$row['title']] = $row['description'];
                }    
            }
        }else{
            display_error_page("Connection failed", "");
            exit;
        }
        mysqli_close($connection);
        return $tab_project;
    }

    function search_project_in_users($project){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        $tab_project = array();
        if (isset($connection)){
            $query = "SELECT title, description FROM projects JOIN userProject ON projects.title=userProject.project WHERE userProject.user='$project';";
            $result = mysqli_query($connection, $query);
            if (!$result){
                $error = mysqli_error($connection);
                display_error_page($error, "");
                exit;
            }else {
                while ($row = mysqli_fetch_assoc($result)){
                    $tab_project[$row['title']] = $row['description'];
                }
            }
        }else{
            display_error_page("Connection failed", "");
            exit;
        }
        mysqli_close($connection);
        return $tab_project;
    }

    function search_project_in_tags($project){
        global $server, $user, $password, $database;
        $connection = connect_to_db($server, $user, $password, $database);
        $tab_project = array();
        if (isset($connection)){
            $query = "SELECT title, description FROM projects JOIN projectLabels ON projects.title = projectLabels.project WHERE projectLabels.label='$project';";
            $result = mysqli_query($connection, $query);
            if (!$result){
                $error = mysqli_error($connection);
                display_error_page($error, "");
                exit;
            }else {
                while ($row = mysqli_fetch_assoc($result)){
                    $tab_project[$row['title']] = $row['description'];
                }
            }
        }else{
            display_error_page("Connection failed", "");
            exit;
        }
        mysqli_close($connection);
        return $tab_project;
    }

    function fusion_tab($project){
        $res = array();
        $tab = search_project($project);
        $tab1 = search_project_in_users($project);
        $tab2 = search_project_in_tags($project);
        foreach($tab as $key => $value){
            $res[$key] = $value;
        }
        foreach($tab1 as $key => $value){
            $res[$key] = $value;
        }
        foreach($tab2 as $key => $value){
            $res[$key] = $value;
        }
        return $res;
    }
?>