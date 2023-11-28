<?php
  if(!isset($page_title)) { $page_title = 'members Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
  </head>

  <body>
    <header>
      <h1>Southern Appalachian Birds Member Area</h1>
    </header>

    <navigation>
      <ul>
        <?php if($session->is_logged_in()) { ?>
        <li>User: <?php echo $session->username ?></li>
        <li><a href="<?php echo url_for('/members/logout.php'); ?>">Log out</a></li>
        <?php } ?>
      </ul>
    </navigation>

    <?php echo display_session_message(); ?>
