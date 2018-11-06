<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->mod_allowed_user($sys->admin_access_id);
$sys->set_icon(admin_img(get_config('logo')));

switch ($sys->mod['task']) {

	case 'main':
	case 'ukm':
		include 'ukm.php';
		break;
	case 'bau':
		include 'bau.php';
		break;
	case 'baak':
		include 'baak.php';
		break;
	case 'wr3':
		include 'wr3.php';
		break;
	case 'pembina':
		include 'pembina.php';
		break;
	case 'setting':
		include 'setting_app.php';
		break;
	
	default:
		# code...
		break;
}
?>