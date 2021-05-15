<?php
    function display_profile2($user_info, $errors, $valid){
      ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
            <head>
                <meta charset="utf-8">
                <title>Profile</title>
                <link rel="stylesheet" href="../design/styles/profile2.css">
            </head>
            <body>
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-xl-6 col-md-12">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25"></div>
                                                <h6 class="f-w-600"><?php echo $_SESSION["user"];?></h6>
                                            </div>
                                            <div class="card-block text-center text-white">
                                                <a href="profile.php">My profile</a>
                                            </div>
                                            <div class="card-block text-center text-white">
                                                <a href="profile.php?action=update">Update profile</a>
                                            </div>
                                            <div class="card-block text-center text-white">
                                                <a href="../login/login.php?action=reset">Reset session</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <?php if(!empty($user_info)) basic_profile($user_info); else update_profile($errors, $valid);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>
      <?php
    }

    function display_profile($user_info, $errors, $valid){
      ?>
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
                      <p class="error"><?php  if (check_error($errors, "password")) echo $errors["password"];?></p>
                      <input type="password" name="password2" placeholder="confirm password"/>
                      <p class="error"><?php  if (check_error($errors, "password2")) echo $errors["password2"];?></p>
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
<?php
    }

    function check_error($errors, $key){
      return isset($errors[$key]);
    }
?>
