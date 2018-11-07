<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Movie';

switch (@$sys->mod['sub_task']['0']) 
{
	case 'edit':
		include 'movie_edit.php';
		break;
	
	default:
		include 'movie_list.php';
		break;
}

?>