<?php
  function signup_form(&$errors, $wrong){
    ?>
    <style>
    .form select{
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
        <title></title>
        <link rel="stylesheet" href="../design/styles/signup.css">
      </head>
      <body>
        <div class="login-page">
          <div class="form">
            <form class="login-form" action="signup.php?action=signup" method="post">
              <input type="text" name="pseudo" placeholder="pseudo"/>
              <p class="error"><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></p>
              <input type="email" name="email" placeholder="email adress"/>
              <p class="error"><?php  if (check_error($errors, "email")) echo $errors["email"];?></p>
              <p>Gender</p>
              <select name="gender" size="1">
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
              </select>
              <p>Birthdate</p>
              <input type="date" name="date"/>
              <p class="error"><?php  if (check_error($errors, "date")) echo $errors["date"];?></p>
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

  function check_error($errors, $key){
    return isset($errors[$key]);
  }
?>
