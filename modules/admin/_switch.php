<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->mod_allowed_user($sys->admin_access_id);
$sys->set_icon(admin_img(get_config('logo')));

$output = array();
$msg    = array();
$ok     = 0;

switch ($sys->mod['task']) {

	case 'main':
	case 'movie':
		include 'movie.php';
		break;

	case 'movie_tag':
		include 'movie_tag.php';
		break;

	case 'movie_tags':
		include 'movie_tags.php';
		break;

	case 'movie_website':
		include 'movie_website.php';
		break;

	case 'website':
		include 'website.php';
		break;

	case 'setting':
		include 'setting_app.php';
		break;
	
	default:
		# code...
		break;
}
?>