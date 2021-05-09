<?php
  function signup_form(&$errors, $wrong){
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="../design/styles/signin.css">
      </head>
      <body>
        <div class="login-page">
          <div class="form">
            <form class="login-form" action="signup.php?action=signup" method="post">
              <input type="text" name="pseudo" placeholder="pseudo"/>
              <p class="error"><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></p>
              <input type="password" name="password" placeholder="password"/>
              <p class="error"><?php  if (check_error($errors, "password")) echo $errors["password"];?></p>
              <input type="password" name="password2" placeholder="confirm password"/>
              <p class="error"><?php  if (check_error($errors, "password2")) echo $errors["password2"];?></p>
              <p class="error"><?php if (isset($wrong)) echo $wrong;?></p>
              <button type="submit">create</button>
              <p class="message">Already registered? <a href="../login/login.php">Login</a></p>
            </form>
          </div>
        </div>
      </body>
    </html>
    <?php
  }
/*
  function signup_form(&$errors){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Equipo</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="styles/signup.css">
    </head>
    <body>
      <form action="signup.php?action=signup" method="post">
        <div class="signup">
          <div>
            <p>Inscription</p>
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
          <div id="field3">
              <label for="password">Password Confirmation : </label></br>
              <input type="password" name="password2" id="Password Confirmation" value=""></br>
              <span><?php  if (check_error($errors, "password2")) echo $errors["password2"];?></span>
          </div>
          <div id="button">
            <button type="submit">Create account</button>
          </div>
          <div>
            <a href="../login/login.php">Already registered ? Log in here</a>
          </div>
        </div>
      </form>
    </body>
    </html>
    <?php
  }*/


function display_error_page($message, $redirection_link){
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Error</title>
      <link rel="stylesheet" href="../design/styles/failed_redirection.css">
    </head>
    <body>
      <div class="error-page">
        <div class="error_main">
          <h1>Something went wrong...We're sorry.</h1>
          <p class="error"><?php if(isset($message)) echo $message?></p>
          <p class="message"></p> <a href=<?php if (isset($redirection_link)) echo $redirection_link ?>>Go back!</a>
        </div>
        </div>
      </div>
    </body>
  <?php

}

/*
  function display_error_page($message, $redirection_link){
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Error</title>
      </head>
      <body>
        <h1>Something went wrong...We're sorry.</h1>
        <p><?php echo $message?></p>
        <!-- 'echo' fixes a previous bug below -->
        <a href=<?php echo $redirection_link ?>>Let's try again!</a>
      </body>
    </html>
    <?php
  }*/

  function check_error($errors, $key){
    return isset($errors[$key]);
  }
?>
