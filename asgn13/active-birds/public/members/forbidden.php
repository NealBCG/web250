<?php require_once('../../private/initialize.php'); 
require_login(); ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Forbidden!</title>
    <meta charset="utf-8">
  </head>

  <body>
    <header>
      <h1>Access denied!</h1>
    </header>

    <p>You do not have permission to access this page.</p>
    
    <p><a href="<?php echo url_for('/members/birds/index.php'); ?>">Return to birds</a></p>
  </body>
</html>