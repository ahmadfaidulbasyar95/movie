<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
session_destroy();
$sys->redirect('user.login');
?>