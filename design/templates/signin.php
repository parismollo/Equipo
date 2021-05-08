<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../styles/signin.css">
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <form class="register-form" action="signup.php?action=signup" method="post">
          <input type="text" name="pseudo" placeholder="pseudo"/>
          <p class="message"><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></p>
          <input type="password" name="password" placeholder="password"/>
          <input type="password" name="password2" placeholder="confirm password"/>
          <p class="message"><?php  if (check_error($errors, "password2")) echo $errors["password2"];?></p>
          <button type="submit">create</button>
          <p class="message">Already registered? <a href="../login/login.php">Login</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
