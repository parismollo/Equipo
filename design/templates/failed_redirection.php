<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error</title>
    <link rel="stylesheet" href="../styles/failed_redirection.css">
  </head>
  <body>
    <div class="error-page">
      <div class="error_main">
        <h1>Something went wrong...We're sorry.</h1>
        <p class="error"><?php if(isset($message)) echo $message?></p>
        <p class="message"></p> <a href=<?php if (isset($redirection_link)) echo $redirection_link ?>>Let's try again!</a>
      </div>
      </div>
    </div>
  </body>
</html>
