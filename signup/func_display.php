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
      <form action="signup.php" method="post">
        <div class="signup">
          <div>
            <p>Sign up</p>
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
            <a href="signup.php?action=signin">Already registered ? Log in here</a>
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
        <h3><?php echo $message;?></h3>
        <a href=<?php echo $redirection_link;?>>Let's try again!</a>
      </body>
    </html>
    <?php
  }

  function check_error($errors, $key){
    return isset($errors[$key]);
  }

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
      <form action="signup.php?action=login" method="post">
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
            <a href="signup.php">Aren't registered yet ? Sign up here</a>
          </div>
        </div>
      </form>
    </body>
    </html>  
    <?php
  }
?>