<?php header("Cache-Control: no-cache"); 
require_once('../../../private/initialize.php'); 
require_login();
// access_denied();


$members = Member::find_all();

$page_title = 'members'; 
include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">
  <div class="members listing">
    <h1>members</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/members/admins/new.php'); ?>">Add member</a>
    </div>

  	<table class="list" border=1>
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>User Level</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
      
      <?php foreach($members as $member) { ?>
        <tr>
          <td><?php echo h($member->id); ?></td>
          <td><?php echo h($member->first_name); ?></td>
          <td><?php echo h($member->last_name); ?></td>
          <td><?php echo h($member->email); ?></td>
          <td><?php echo h($member->username); ?></td>
          <td><?php if(h($member->user_level) == 'm')
                      echo 'Member';
                    else
                      echo 'Administrator';
           ?></td>
          <td><a class="action" href="<?php echo url_for('/members/admins/show.php?id=' . h(u($member->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/members/admins/edit.php?id=' . h(u($member->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/members/admins/delete.php?id=' . h(u($member->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
