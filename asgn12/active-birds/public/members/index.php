<?php 
require_once('../../private/initialize.php'); 
require_login();
// access_denied();
$page_title = 'members Menu'; 
include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/members/birds/index.php'); ?>">Birds</a></li>
      <li><a href="<?php echo url_for('/members/admins/index.php'); ?>">Members</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
