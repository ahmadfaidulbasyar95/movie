<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->func('admin');
$sys->set_icon(admin_img(get_config('logo')));
switch ($sys->mod['task']) {

	case 'admin_login':
		$sys->mod_allowed_user($sys->admin_access_id);
		include 'admin_login.php';
		break;
	case 'admin_user_reset_password':
		$sys->mod_allowed_user($sys->admin_access_id);
		include 'admin_user_reset_password.php';
		break;

	case 'login':
		include 'login.php';
		break;
	case 'register':
		// include 'register.php';
		break;
	case 'not_allowed':
		include 'not_allowed.php';
		break;

	case 'main':
	case 'profill':
		$sys->mod_allowed_user('all');
		include 'profill.php';
		break;
	case 'change_password':
		$sys->mod_allowed_user('all');
		include 'change_password.php';
		break;
	case 'logout':
		$sys->mod_allowed_user('all');
		include 'logout.php';
		break;
	
	default:
		# code...
		break;
}
?>