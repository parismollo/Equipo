<?php
    require_once("../signup/func_display.php");

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
          <title>Equipo</title>
          <meta charset="utf-8">
          <link rel="stylesheet" href="">
        </head>
        <body>
              <h1><?php echo "Disconnected successfully !";?></h1>
              <div>
                <a href="login.php">Return to log in</a>
              </div>
            </div>
        </body>
        </html>  
        <?php
      }
?>