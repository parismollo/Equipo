<?php
    require_once("../signup/func_display.php");
    function login_form(&$errors, $wrong){
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
      </style>
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login</title>
          <link rel="stylesheet" href="../design/styles/login.css">
        </head>
        <body>
          <div class="login-page">
            <div class="form">
              <h2>Equipo</h2>
              <form class="login-form" action="login.php?action=login" method="post">
                <input type="text" name="pseudo" placeholder="pseudo"/>
                <p class="error"><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></p>
                <input type="password" name="password" placeholder="password"/>
                <p class="error"><?php  if (check_error($errors, "password")) echo $errors["password"];?></p>
                <p class="error"><?php if (isset($wrong)) echo $wrong;?></p>
                <button type="submit">login</button>
                <p class="message">Not registered? <a href="../signup/signup.php">Create an account</a></p>
              </form>
            </div>
          </div>
        </body>
      </html>

      <?php
    }

      function display_success_page(){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Equipo</title>
          <meta charset="utf-8">
          <link rel="stylesheet" href="">
        </head>
        <body>
              <h1><?php echo "Welcome ".$_SESSION['user'];?></h1>
              <div>
              <a href="../profile/profile.php">Profile page</a>
              </div>
            </div>
        </body>
        </html>
        <?php
      }

      function display_bye_page(){
        ?>
        <!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Logout</title>
            <link rel="stylesheet" href="../design/styles/failed_redirection.css">
          </head>
          <body>
            <div class="error-page">
              <div class="error_main">
                <h1>Disconnected successfully</h1>
                <p class="message"><a href="login.php">Return to log in</a></p>
              </div>
              </div>
            </div>
          </body>
        </html>
        <?php
      }
?>
