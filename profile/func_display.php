<?php
  require_once("../database/project.php");
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
            <a class="message" href="profile.php">My profile</a>
            <a class="message" href="profile.php?action=update">Update profile</a>
            <a class="message" href="../login/login.php?action=reset">Reset session</a>
        </div>
        <div class="form">
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
                    <input type="password" name="password" placeholder="change password"/>
                    <p class="error"><?php  if (check_error2($errors, "password")) echo $errors["password"];?></p>
                    <input type="password" name="password2" placeholder="confirm password"/>
                    <p class="error"><?php  if (check_error2($errors, "password2")) echo $errors["password2"];?></p>
                    <p class="error"><?php  if (isset($valid)) echo $valid;?></p>
                    <button type="submit">Update password</button>
            </form>
        </div>
    <?php
  }

  function basic_profile($user_info){
    ?>
      <h2 style="margin:0px;">Information</h2>
      <p>Email</p>
      <h4><?php echo $user_info["email"];?></h4>
      <p>Username</p>
      <h4><?php echo $user_info["pseudo"];?></h4>
      <p>Day of Birth</p>
      <h4><?php echo $user_info["date"];?></h4>
      <p>Gender</p>
      <h4><?php echo $user_info["gender"];?></h4>
      <h2>Projects</h2>
      <form style="margin-bottom: 5px;" action="" method="post">
        <select class="" name="projects[]" required>
          <option value="" selected>Please select</option>
          <?php generate_projects($user_info["pseudo"]);?>
        </select>
        <button class="button3" type="submit">view project</button>
      </form>
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
    echo "<option value=\"x\">$size</option>";
    foreach ($titles as $key => $value) {
      echo "<option value=\"$value\">$value</option>";

    }
  }
?>
