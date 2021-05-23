<?php
  require_once("../database/project.php");
  require_once("../project/func_display.php");
  require_once("func_query.php");


  function display_other_profile($user_info){
    ?>
    <style media="screen">
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
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" href="../design/styles/new_profile.css">
      </head>
      <body>
        <div class="form">
          <h1 style="margin-top:0px; margin-bottom: 2px;"><?php echo $user_info["pseudo"];?></h1>
          <a class="message" href="../home/search_bar.php">Home page</a>
        </div>
        <div class="form" style="padding:30px;">
          <div>
              <?php if(!empty($user_info)) other_user_basic_profile($user_info);?>
          </div>
        </div>
      </body>
    </html>
    <?php
  }


  function display_profile($user_info, $errors, $valid){
    ?>
    <style media="screen">
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
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" href="../design/styles/new_profile.css">
      </head>
      <body>
        <div class="form">
          <h1 style="margin-top:0px;"><?php echo $_SESSION["user"];?></h1>
            <a class="message" href="../home/search_bar.php">Home page</a>
            <a class="message" href="profile.php">My profile</a>
            <a class="message" href="profile.php?action=update">Update profile</a>
            <a class="message" href="../login/login.php?action=reset">Reset session</a>
        </div>
        <div class="form" style="padding:30px;">
          <div>
              <?php if(!empty($user_info)) basic_profile($user_info); else update_profile($errors, $valid);?>
          </div>
        </div>
      </body>
    </html>
    <?php
  }


  function update_profile($errors, $valid){
    ?>
      <div class="">
            <form class="" action="profile.php?action=valid_update" method="post">
                    <select class="" name="labels[]" multiple>
                              <?php  generate_tags();?>
                    </select>
                    <button type="submit">Add interest</button>
            </form>
            <form class="" action="profile.php?action=valid_update" method="post">
                    <input type="password" name="password" placeholder="change password"/>
                    <p class="error" style="text-align:center"><?php  if (check_error2($errors, "password")) echo $errors["password"];?></p>
                    <input type="password" name="password2" placeholder="confirm password"/>
                    <p class="error"style="text-align:center"><?php  if (check_error2($errors, "password2")) echo $errors["password2"];?></p>
                    <p class="error" style="text-align:center"><?php  if (isset($valid)) echo $valid;?></p>
                    <button type="submit">Update password</button>
            </form>
        </div>
    <?php
  }
  function other_user_basic_profile($user_info){
    ?>
      <h2 style="margin:0px;">Information</h2>
      <p>Email</p>
      <h4><?php echo $user_info["email"];?></h4>
      <p>Interests</p>
      <?php generate_user_tags($user_info["pseudo"])?>
      <p>Username</p>
      <h4><?php echo $user_info["pseudo"];?></h4>
      <p>Day of Birth</p>
      <h4><?php echo $user_info["date"];?></h4>
      <p>Gender</p>
      <h4><?php echo $user_info["gender"];?></h4>
      <?php if (sizeof(list_all_projects($user_info["pseudo"]))!=0){
        ?>
        <h2>Projects</h2>
        <form style="margin-bottom: 5px;" action="../project/project.php?" method="get">
          <select class="" name="project" required>
          <option value="" selected>Please select</option>
          <?php generate_projects($user_info["pseudo"]);?>
          </select>
          <button class="button3" type="submit">view project</button>
        </form>
        <?php
      }else{
        ?>
          <h2>No projects so far...</h2>
        <?php
      } ?>
<?php
  }

  function basic_profile($user_info){
    ?>
      <h2 style="margin:0px;">Information</h2>
      <p>Email</p>
      <h4><?php echo $user_info["email"];?></h4>
      <p>Interests</p>
      <?php generate_user_tags($user_info["pseudo"])?>
      <p>Username</p>
      <h4><?php echo $user_info["pseudo"];?></h4>
      <p>Day of Birth</p>
      <h4><?php echo $user_info["date"];?></h4>
      <p>Gender</p>
      <h4><?php echo $user_info["gender"];?></h4>
      <h2>Projects</h2>
      <?php if (sizeof(list_all_projects($user_info["pseudo"]))!=0){
        ?>
        <form style="margin-bottom: 5px;" action="../project/project.php?action=project_post" method="post">
          <select class="" name="project" required>
          <option value="" selected>Please select</option>
          <?php generate_projects($user_info["pseudo"]);?>
          </select>
          <button class="button3" type="submit">view project</button>
        </form>
        <?php
      } ?>
      <form style="margin-top:0px;" action="../project/project.php">
        <button class="button2" type="submit">new project</button>
      </form>
<?php
  }

  function check_error2($errors, $key){
    return isset($errors[$key]);
  }


  function generate_projects($pseudo){
    $titles = list_all_projects($pseudo);
    foreach ($titles as $key => $value) {
      echo "<option value=\"$value\">$value</option>";
    }
  }

  function generate_user_tags($user_pseudo){
    $tags = get_user_tags($user_pseudo);
    $res = "";
    $c = 0;
    if(empty($tags)){
      echo "<h4>No interests so far...</h4>";
      return;
    }
    foreach ($tags as $key => $value) {
      if ($key == 0){
        $res = $res." ".$value;
      }else{
        $res = $res."/".$value;
      }
      $c++;
    }
    echo "<h4>$res</h4>";
  }
?>
