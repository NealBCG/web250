<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>

<div id="main">
  <div id="page">
    <div class="intro">
      <h2>Bird Inventory</h2>
      <p>This is a short list -- start your birding!</p>
    </div>

    <table id="inventory" border=1>
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation ID</th>
        <th>Backyard Tips</th>
      </tr>
    
      <?php  $bird_array = $parser->parse();

        foreach($bird_array as $args) { 
          $bird = new Bird($args); ?>
        <tr>
          <td><?php echo h($bird->common_name) ?></td>
          <td><?php echo h($bird->habitat) ?></td>
          <td><?php echo h($bird->food) ?></td>
          <td><?php echo h($bird->nest_placement) ?></td>
          <td><?php echo h($bird->behavior) ?></td>
          <td><?php echo h($bird->conservation()) ?></td>
          <td><?php echo h($bird->backyard_tips) ?></td>
          <td><a href="detail.php?id=<?php echo $bird->conservation() ?>">view</a></td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
