<?php
  require_once('../../private/initialize.php');

  if($session->is_logged_in())
    redirect_to('index.php');

  $errors = [];
  $username = '';
  $password = '';

  if(is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if(is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }
    if($_POST['captcha'] != $_SESSION['digit']) {
      die("Sorry, the CAPTCHA code entered was incorrect!");
      session_destroy();
    }

    // if there were no errors, try to login
    if(empty($errors)) {
      $member = member::find_by_username($username);
      
      if($member != false && $member->verify_password($password)) {
        $session->login($member);
        if($member->user_level == 'm') 
          redirect_to(url_for('/members/birds/index.php'));
        else
          redirect_to(url_for('/members/index.php'));
      } else {
        // username not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }
    }
  }
?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br>
    <input type="text" name="username" value="<?php echo h($username); ?>"><br>
    <br>
    Password:<br>
    <input type="password" name="password" value=""><br>
    <br>
    Captcha:<br>
    <img src="captcha.php" width="240" height="60" border=1 alt="CAPTCHA">
    <p><input type="text" size="6" maxlength="5" name="captcha" value=""><br>
    <small>copy the digits from the image into this box</small></p>

    <input type="submit" name="submit" value="Submit">
  </form>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
