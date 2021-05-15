<?php
  require_once("../database/tag.php");
  function project_form(&$errors, $wrong){
    ?>
    <style>
      h2 {
        font-weight: bold;
        font-size: 35px;
        margin-top: 0px;
        padding-top: 0px;
        background: linear-gradient(90deg, rgba(134,242,114,1) 11%, rgba(59,240,18,1) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }
      textarea{
        font-family: "Poppins", sans-serif;
        border-radius: 10px;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
      }

      select {
        font-family: "Poppins", sans-serif;
        border-radius: 10px;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
      }
    </style>
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Project Form</title>
        <link rel="stylesheet" href="../design/styles/login.css">
      </head>
      <body>
        <div class="login-page">
          <div class="form">
            <h2>Project Creation</h2>
            <form class="login-form" action="project.php?action=create_project" method="post">
              <input type="text" name="title" placeholder="Project title" required/>
              <!-- <p class="error"><?php  //if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></p> -->
              <textarea rows="8" cols="80" name="description" placeholder="Project description" required></textarea>
              <select class="" name="labels[]" multiple required>
                <?php  generate_tags();?>
              </select>
              <button type="submit">create</button>
            </form>
          </div>
        </div>
      </body>
    </html>

    <?php
  }

  function generate_tags(){
    $labels = list_all_tags();
    foreach ($labels as $key => $value) {
      echo "<option value=\"$value\">$value</option>";
    }
  }

  function display_project($project_info, $errors, $valid){
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Project</title>
        <link rel="stylesheet" href="../design/styles/new_profile.css">
      </head>
      <body>
        <div class="form">
          <h1 style="margin-top:0px;"><?php echo $project_info["title"];?></h1>
            <a class="message" href="">My profile</a>
            <a class="message" href="">Delete Profile</a>
        </div>
        <div class="form">
          <div>
              <?php if(!empty($project_info)) basic_project_profile($project_info);?>
          </div>
        </div>
      </body>
    </html>
    <?php
  }

  function basic_project_profile($project_info){
    ?>
      <h2 style="margin:0px;">Information</h2>
      <p>Project Name</p>
      <h4><?php echo $project_info["title"];?></h4>
      <p>Collaborators</p>
      <?php foreach ($project_info["Collaborators"]; as $key => $value): ?>
        <h4><?php echo $value;?></h4>
      <?php endforeach; ?>
<?php
  }
?>
