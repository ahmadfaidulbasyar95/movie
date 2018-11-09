<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Website';

switch (@$sys->mod['sub_task']['0']) 
{
	case 'edit':
		include 'website_edit.php';
		break;

	case 'php_movies':
		include 'website_php_movies.php';
		break;
		
	case 'php_episodes':
		include 'website_php_episodes.php';
		break;
	
	default:
		include 'website_list.php';
		break;
}

?>