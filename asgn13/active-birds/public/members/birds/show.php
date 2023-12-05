<?php require_once('../../../private/initialize.php');
  require_login();

  $id =$_GET['id'] ?? false;
  if(!$id)
    redirect_to('index.php');
  $bird = Bird::find_by_id($id);
?>

<?php $page_title = 'Detail: ' . $bird->common_name; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>


<div id="main">
  <a href="index.php">Back to Birds</a>
  <div id="page">
    <div class="detail">
      <dl>
        <dt>Common Name</dt>
        <dd><?php echo h($bird->common_name); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($bird->habitat); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?php echo h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>Conservation ID</dt>
        <dd><?php echo h($bird->conservation()); ?></dd>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
