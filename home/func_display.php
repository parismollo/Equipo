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
        <?php display_nav_bar(); ?>
        <div>
            <a href="search_bar.php">Home page</a>
            <a href="../profile/profile.php">My profile</a>
        </div>
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

    function display_nav_bar(){
      ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
      .topnav {
        list-style-type: none;
        margin: auto;
        width: fit-content;
        padding: 0;
        overflow: hidden;
        background: linear-gradient(90deg, rgb(73 175 54) 11%, rgb(72 176 53) 100%);
        border-radius: 10px;
      }

      .topnav a {
        float: left;
        display: block;
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      .topnav a:hover {
        background:rgba(134,242,114,1);
      }

      .topnav .search-container {
        float: right;
      }

      .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 14px;
        border: none;
        border-radius: 20px;
        font-family: "Poppins", sans-serif;
      }

      .topnav .search-container button {
        float: right;
        margin-left: 10px;
        border-radius: 50%;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
      }

      .topnav .search-container button:hover {
        background: #ccc;
      }
      </style>
      <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <div class="search-container">
          <form style="margin-top: 2px;" action="search_bar.php?action=valid" method="post">
            <input type="text" placeholder="  Search..." name="project" required/>
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
      <?php
    }
?>
