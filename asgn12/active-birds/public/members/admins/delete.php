<?php
  require_once('../../../private/initialize.php');
  require_login();
  // access_denied();

  if(!isset($_GET['id'])) {
    redirect_to(url_for('/members/admins/index.php'));
  }
  $id = $_GET['id'];
  $member = member::find_by_id($id);
  if($member == false) {
    redirect_to(url_for('/members/admins/index.php'));
  }

  if(is_post_request()) {

    // Delete member
    $result = $member->delete();
    $session->message('The member was deleted successfully.');
    redirect_to(url_for('/members/admins/index.php'));

  } else {
    // Display form
  }
?>

<?php $page_title = 'Delete member'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="member delete">
    <h1>Delete member</h1>
    <p>Are you sure you want to delete this member?</p>
    <p class="item"><?php echo h($member->full_name()); ?></p>

    <form action="<?php echo url_for('/members/admins/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete member" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
