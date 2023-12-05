<?php header("Cache-Control: no-cache"); 
  require_once('../../../private/initialize.php');
  require_login();

  $page_title = 'Sightings';
  include(SHARED_PATH . '/user_header.php');
?>

<div id="main">
  <div id="page">
    <div class="intro">
      <h2>Bird Inventory</h2>
      <p>This is a short list -- start your birding!</p>
    </div>

    <div class="actions">
      <a class="action" href="new.php">Add Bird</a>
    </div>

    <table id="inventory" border=1>
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation ID</th>
        <th>Backyard Tips</th>
      </tr>
    
      <?php $bird = Bird::find_all();
      foreach($bird as $bird) { 
           ?>
        <tr>
          <td><?php echo h($bird->common_name) ?></td>
          <td><?php echo h($bird->habitat) ?></td>
          <td><?php echo h($bird->food) ?></td>
          <td><?php echo h($bird->conservation()) ?></td>
          <td><?php echo h($bird->backyard_tips) ?></td>
          <td><a href="show.php?id=<?php echo $bird->id ?>">view</a></td>
          <td><a href="edit.php?id=<?php echo $bird->id ?>">edit</a></td>
          <td><a href="delete.php?id=<?php echo $bird->id ?>">delete</a></td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
