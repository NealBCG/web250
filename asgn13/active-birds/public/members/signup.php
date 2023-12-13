<?php require_once('../../private/initialize.php');

$errors = [];

if(is_post_request()) {

  // include('../members/captcha.php');
  
  // Create record using post parameters
  $args = $_POST['member'];
  $member = new Member($args);
  $member->user_level = 'm';
  $result = $member->save();

  if($result === true) {
    $new_id = $member->id;
    $session->login($member);
    $session->message('Your account was created successfully.');
    redirect_to(url_for('/birds/index.php'));
  } elseif(!has_unique_username($member->username, $member->id ?? 0)) {
    $member->errors[] = "Username is already taken. Try another.";
  }

} else {
  // display the form
  $member = new Member;
}

?>

<?php $page_title = 'Create account'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<script src= 
  "https://www.google.com/recaptcha/api.js" async defer> 
</script> 
<div id="content">
  <a class="back-link" href="<?php echo url_for('/members/login.php'); ?>">&laquo; Back to log in</a>
  <div class="member new">
    <h1>Create account</h1>

    <?php echo display_errors($member->errors); ?>

    <form action="<?php echo url_for('/members/signup.php'); ?>" method="post">

      <?php include('../admins/form_fields.php'); ?>

      Captcha:<br>
      <div class="g-recaptcha" data-sitekey=""></div><br> 

      <div id="operations">
        <input type="submit" value="Create account">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
