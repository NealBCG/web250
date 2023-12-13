<?php require_once('../../private/initialize.php');

  if($session->is_logged_in())
    redirect_to('../birds/index.php');

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
  
    // include('captcha.php');

    // if there were no errors, try to login
    if(empty($errors)) {
      $member = Member::find_by_username($username);
      
      if($member != false && $member->verify_password($password)) {
        $session->login($member);
        if($session->user_level == 'm') 
          redirect_to(url_for('/birds/index.php'));
        elseif ($session->user_level == 'a')
          redirect_to(url_for('/admins/index.php'));
        else
          $errors[] = "Log in was unsuccessful.";
      }
    }
  }
?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<script src= 
  "https://www.google.com/recaptcha/api.js" async defer> 
</script> 
<div id="content">
  <h1>Log in</h1>
  <h3><a href="<?php echo url_for('members/signup.php'); ?>">Or create an account</a></h3>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br>
    <input type="text" name="username" value="<?php echo h($username); ?>"><br>
    <br>
    Password:<br>
    <input type="password" name="password" value=""><br>
    <br>
    Captcha:<br>
    <div class="g-recaptcha" data-sitekey=""></div><br> 

    <input type="submit" name="submit" value="Submit">
  </form>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
