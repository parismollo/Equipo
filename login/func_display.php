<?php
    require_once("../signup/func_display.php");
    function login_form(&$errors, $wrong){
      ?>
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
    /*
    function login_form(&$errors, $wrong){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Equipo</title>
          <meta charset="utf-8">
          <link rel="stylesheet" href="">
        </head>
        <body>
          <form action="login.php?action=login" method="post">
            <div class="login">
              <div>
                <p>Log in</p>
              </div>
              <div id="field">
                  <label for="pseudo">Pseudo : </label></br>
                  <input type="text" name="pseudo" id="pseudo" value="" placeholder="parismollo"></br>
                  <span><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></span>
              </div>
              <div id="field2">
                  <label for="password">Password : </label></br>
                  <input type="password" name="password" id="password" value=""></br>
                  <span><?php  if (check_error($errors, "password")) echo $errors["password"];?></span>
              </div>
              <div>
                  <span><?php echo $wrong;?></span>
              </div>
              <div id="button">
                <button type="submit">Log in</button>
              </div>
              <div>
                <a href="../signup/signup.php">Aren't registered yet ? Sign up here</a>
              </div>
            </div>
          </form>
        </body>
        </html>
        <?php
      }*/

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
                <a href="login.php?action=reset">Reset session</a>
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
