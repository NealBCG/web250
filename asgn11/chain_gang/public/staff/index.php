<?php 
require_once('../../private/initialize.php'); 
require_login();
$page_title = 'Staff Menu'; 
include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">Bicycles</a></li>
      <li><a href="<?php echo url_for('/staff/admins/index.php'); ?>">Administrators</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
