<?php
    require_once("../database/search_bar_query.php"); 

    function display_search_bar($project, $action){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>Welcome</title>
</head>
<body>
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