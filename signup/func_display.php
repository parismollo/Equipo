<?php
  function signup_form(&$errors){
    ?>
    <form class="" action="signup.php?action=signup" method="post">
      <label for="pseudo">Pseudo</label>
      <input type="text" name="pseudo" id="pseudo" value="" placeholder="parismollo">
      <span><?php  if (check_error($errors, "pseudo")) echo $errors["pseudo"];?></span>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="">
      <span><?php  if (check_error($errors, "password")) echo $errors["password"];?></span>
      <label for="password">Password Confirmation</label>
      <input type="password" name="password2" id="Password Confirmation" value="">
      <span><?php  if (check_error($errors, "password2")) echo $errors["password2"];?></span>

      <button type="submit">Submit</button>
    </form>
    <?php
  }

  function check_error($errors, $key){
    return isset($errors[$key]);
  }
?>
