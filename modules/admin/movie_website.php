<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Movie Website';

switch (@$sys->mod['sub_task']['0']) 
{
	case 'edit':
		include 'movie_website_edit.php';
		break;

	case 'url':
		include 'movie_website_url.php';
		break;
	
	default:
		include 'movie_website_list.php';
		break;
}

?>