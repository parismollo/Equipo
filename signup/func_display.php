<?php
  function signup_form(&$errors){
    ?>
    <form class="" action="signup.php?action=signup" method="post">
      <table>
        <thead>
          <th>Sign Up</th>
        </thead>
        <tbody>
          <tr>
            <td><label for="pseudo">Pseudo</label></td>
            <td><input type="text" name="pseudo" id="pseudo" value="" placeholder="parismollo"></td>
            <td><span><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></span></td>
          </tr>
          </br>
          <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password" value=""></td>
            <td><span><?php  if (check_error($errors, "password")) echo $errors["password"];?></span></td>
          </tr>
          </br>
          <tr>
            <td><label for="password">Password Confirmation</label></td>
            <td><input type="password" name="password2" id="Password Confirmation" value=""></td>
            <td><span><?php  if (check_error($errors, "password2")) echo $errors["password2"];?></span></td>
          </tr>
          </br>
        </tbody>
      </table>
      <button type="submit">Submit</button>
    </form>
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
        <h3><?php echo $message?></h3>
        <a href=<?php $redirection_link ?>>Let's try again!</a>
      </body>
    </html>
    <?php
  }

  function check_error($errors, $key){
    return isset($errors[$key]);
  }
?>
