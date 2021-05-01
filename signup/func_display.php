<?php
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
        </div>
      </form>
    </body>
    </html>
    <?php
  }

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
  }

  function check_error($errors, $key){
    return isset($errors[$key]);
  }
?>
