<?php require_once('../private/initialize.php'); ?>

<?php

  $id =$_GET['id'] ?? false;

  if(!$id)
    redirect_to('birds.php');

    $bird = Bird::find_by_id($id);

?>

<?php $page_title = 'Detail: ' . $bird->name(); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <a href="birds.php">Back to Birds</a>

  <div id="page">

    <div class="detail">
      <dl>
        <dt>Brand</dt>
        <dd><?php echo h($bird->brand); ?></dd>
      </dl>
      <dl>
        <dt>Model</dt>
        <dd><?php echo h($bird->model); ?></dd>
      </dl>
      <dl>
        <dt>Year</dt>
        <dd><?php echo h($bird->year); ?></dd>
      </dl>
      <dl>
        <dt>Category</dt>
        <dd><?php echo h($bird->category); ?></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><?php echo h($bird->gender); ?></dd>
      </dl>
      <dl>
        <dt>Color</dt>
        <dd><?php echo h($bird->color); ?></dd>
      </dl>
      <dl>
        <dt>Condition</dt>
        <dd><?php echo h($bird->condition()); ?></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><?php echo '$' . h($bird->price); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($bird->description); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
