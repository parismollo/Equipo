<?php
    require_once("../database/search_bar_query.php");

    function display_home($project, $action){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'/>
        <title>Home Page</title>
        <link rel="stylesheet" href="../design/styles/home.css">
    </head>
    <body>
        <!-- <?php // TODO: Nav Bar ?> -->
        <div>
            <a href="search_bar.php">Home page</a>
            <a href="../profile/profile.php">My profile</a>
        </div>
        <form action="search_bar.php?action=valid" method="post">
            <input type="text" name="project" required/>
            <button type="submit">search</button>
        </form>
        <?php
            if(!empty($project)) {
                display_request_project($project);
            }else {
                if(!empty($action)){
                    echo "<h1>No projects found with this name !</h1>";
                } else{
                    $tab1 = search_tag_user($_SESSION['user']);
                    $tab = search_project_homepage($tab1);
                    display_request_project($tab);
                }
            }
        ?>
    </body>
    </html>
    <?php
    }

    function display_request_project($project){
        foreach($project as $key => $value){
            echo "<div>
                    <h3>".$key."<h3>
                    <h4>".$value."</h4>
                </div>";
        }
    }
?>
