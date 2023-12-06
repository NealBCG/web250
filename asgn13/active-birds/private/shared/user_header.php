<?php
  if(!isset($page_title)) { $page_title = 'Members Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
  </head>

  <body>
    <?php echo display_session_message(); ?>
    <header>
      <h1>Southern Appalachian Birds User Area</h1>
    </header>

    <navigation>
      <ul>
        <?php if($session->is_logged_in()) { ?>
        <li>User: <?php echo $session->username ?></li>
        <li>User level: <?php echo $session->user_level_name() ?></li>
        <?php if($session->user_level == 'a') {
          echo '<li><a href="' . url_for('/members/birds/index.php') . '">Birds</a></li>';
          echo '<li><a href="' . url_for('/members/admins/index.php') . '">Members</a></li>';
        } ?>
        <li><a href="<?php echo url_for('/members/logout.php'); ?>">Log out</a></li>
        <?php } ?>
      </ul>
    </navigation>
