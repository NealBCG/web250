<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($bird)) {
  redirect_to(url_for('/birds.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="Bird[common_name]" value="<?php echo h($bird->common_name); ?>"></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="Bird[habitat]" value="<?php echo h($bird->habitat); ?>"></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="Bird[food]" value="<?php echo h($bird->food); ?>"></dd>
</dl>

<dl>
  <dt>Conservation Status</dt>
  <dd>
    <select name="Bird[conservation_id]">
      <option value=""></option>
    <?php foreach($bird->conservation() as $con_id => $con_name) { ?>
      <option value="<?php echo $con_name; ?>" <?php if($bird->conservation() == $con_id) 
      { echo'selected'; } ?>><?php echo $con_name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><textarea name="Bird[backyard_tips]" rows="5" cols="50"><?php echo h($bird->backyard_tips); ?></textarea></dd>
</dl>
