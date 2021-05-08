<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <form class="login-form" action="login.php?action=login" method="post">
          <input type="text" name="pseudo" placeholder="pseudo"/>
          <p class="message"><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></p>
          <input type="password" name="password" placeholder="password"/>
          <p class="message"><?php  if (check_error($errors, "password")) echo $errors["password"];?></p>
          <p class="message"><?php echo $wrong;?></p>
          <button type="submit">login</button>
          <p class="message">Not registered? <a href="../signup/signup.php">Create an account</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
