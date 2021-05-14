<?php
  function project_form(&$errors, $wrong){
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Project Creation</title>
      </head>
      <body>
        <form class="" action="project.php?action=create_project" method="post">
          <input type="text" name="title" placeholder="Project title">
          <input type="text" name="description" placeholder="Project description">
          <button type="submit">create</button>
        </form>
      </body>
    </html>
    <?php
  }
?>
