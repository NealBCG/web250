<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn03 Static</title>
  </head>
  <body>
    <h1>Inheritance Examples</h1>
    <?php 
      include 'Bird.php';
      $bird = new Bird;
      echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';

      $fly_catcher = new YellowBelliedFlyCatcher;
      echo '<p>The song of the ' . $fly_catcher->name . ' on breeding grounds is "' . $fly_catcher->song . '".</p>';

      $kiwi = new Kiwi;
      $kiwi->flying = "no";
      echo "<p>The " . $fly_catcher->name . " " . $fly_catcher->can_fly() . ".</p>";
      echo "<p>The " . $kiwi->name . " " . $kiwi->can_fly() . ".</p>";    
    ?>
    <hr>
    <h1>Static Examples</h1>
    <h2>Before using the create method</h2>
    <?php
      echo "<p>Bird count: " . Bird::$instance_count . "</p>";
      echo "<p>YellowBelliedFlyCatcher count: " . Bird::$instance_count . "</p>";
      echo "<p>Kiwi count: " . Bird::$instance_count . "</p>";
    ?>
    <h2>After using the create method</h2>
    <?php
      Bird::create();
      YellowBelliedFlyCatcher::create();
      Kiwi::create();

      echo "<p>Bird count: " . Bird::$instance_count . "</p>";
      echo "<p>YellowBelliedFlyCatcher count: " . Bird::$instance_count . "</p>";
      echo "<p>Kiwi count: " . Bird::$instance_count . "</p>";
    ?>
  </body>
</html>
