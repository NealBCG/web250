<?php
require_once('../../private/initialize.php');
require_login();

$session->logout();

redirect_to(url_for('/staff/login.php'));

?>
