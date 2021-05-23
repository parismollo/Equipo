<?php
    require_once("../database/search_bar_query.php");
    require_once("../database/project.php");

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
        <?php
            if(!empty($project)) {
                display_request_project($project);
            }else {
                if(!empty($action)){
                    display_no_results();
                } else{
                    $tab1 = search_tag_user($_SESSION['user']);
                    if(empty($tab1)){
                      display_no_results();
                    }
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
            $users = get_project_collaborators($key); // array
            $tags = get_project_tags($key); // array
            display_project_post($key, $value, $tags, $users);
        }
    }

    function display_no_results(){
      ?>
      <style media="screen">
      .empty_result{
        font-family: "Poppins", sans-serif;
        border-radius: 5px;
        background: #4CAF50;
        width: 100%;
        padding: 15px;
        color: #FFFFFF;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        text-align: center;
        background: linear-gradient(90deg, rgba(77,7,157,1) 11%, rgba(255,123,214,1) 100%);
      }
      </style>
        <div style="text-align:center;"class="">
          <h2 style="text-align:center;">No projects so far!</h2>
          <br>
          <br>
          <a class="empty_result" href="#">Create a project now!</a>
          <h2>Or</h2>
          <a class="empty_result" style="background: linear-gradient(90deg, rgba(134,242,114,1) 11%, rgba(59,240,18,1) 100%);" href="#">Add your interests</a>
        </div>
      <?php
    }

    function display_project_post($title, $description, $tags, $users){
      ?>
      <style media="screen">
      .card {
          display: flex;
          flex-direction: column;
          width: 50%;
          background: white;
          border-radius: 30px;
          padding-left: 18px;
          margin:auto;
          margin-top: 20px;
          border-style: solid;
          border-color: rgba(77,7,157,1);
      }

      .card__cover {
          height: 100px;
          /* border-style: solid; */
      }

      .card__content {
          /* Take available height */
          flex: 1;
          margin-top:5px;
          /* border-style: solid; */
      }
      .title{
        font-weight: bolder;
        text-align: center;
        width: fit-content;
        margin:auto;
        margin-top:10px;
        border-radius: 20px;
        padding: 15px;
        font-size: 30px;
      }
      a{
        text-decoration: none;
        color:#ff4c6b;
      }
      </style>
      <div class="card">
          <!-- Cover -->
          <div class="card__cover">
            <h2 class="title"> <a style="color:black; text-decoration:none" href="../project/project.php?project=<?php echo $title ?>"><?php echo $title ?></a> </h2>
            <h3 style="margin:auto; font-size:25px; color: #ff4c6b">#<?php echo tag_string($tags) ?></h3>
          </div>
          <div class="card__content">
            <p style="font-weight:bold;"><?php echo $description ?></p>
            <p style="font-size: 20px; float:right; margin:20px; color: black; font-weight:bold;">by <?php echo colabs_string($users); ?></p>
          </div>
      </div>
      <?php
    }

    function tag_string($tags){
      $res = "";
      foreach ($tags as $key => $value) {
        if ($key == 0){
          $res = $res." ".$value;
        }else{
          $res = $res."/".$value;
        }
      }
      return $res;
    }

    function colabs_string($users){
      $res ="";
      $size = sizeof($users);
      foreach ($users as $key => $value) {
        if ($key == $size-1){
          $res = $res." "."<a href='../profile/profile.php?pseudo=$value'>$value</a>";
        }else{
          $res = $res." "."<a href='../profile/profile.php?pseudo=$value'>$value,</a>";
        }
      }
      return $res;
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
        background: linear-gradient(90deg, rgba(134,242,114,1) 11%, rgba(59,240,18,1) 100%);
        border-radius: 10px;
      }

      .logo{
        background: linear-gradient(90deg, rgba(77,7,157,1) 11%, rgba(255,123,214,1) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: left;
        margin-bottom:1px;
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
      <h2 class="logo">Equipo</h2>
      <div class="topnav">
        <a href="search_bar.php">Home</a>
        <a href="../profile/profile.php">Profile</a>
        <a href="#">Logout</a>
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
