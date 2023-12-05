<?php
  require_once('../../../private/initialize.php');
  require_login();

  if(!isset($_GET['id']))
    redirect_to(url_for('/index.php'));
  $id = $_GET['id'];
  $bird = Bird::find_by_id($id);
  if($bird == false)
    redirect_to('index.php');

  if(is_post_request()) {
    $args = $_POST['bird'];
    $bird->merge_attributes($args);
    $result = $bird->save();

    if($result === true) {
      $_SESSION['message'] = 'The bird was updated successfully.';
      redirect_to('show.php?id=' . $id);
    }
  }
?>

<?php $page_title = 'Edit bird'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<div id="content">
  <a class="back-link" href="index.php">&laquo; Back to List</a>
  <div class="bird edit">
    <h1>Edit bird</h1>

    <?php echo display_errors($bird->errors); ?>

    <form action="<?php echo 'edit.php?id=' . h(u($id)); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Edit bird">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
