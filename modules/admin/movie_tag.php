<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Movie Tag';

switch (@$sys->mod['sub_task']['0']) 
{
	case 'edit':
		include 'movie_tag_edit.php';
		break;
	
	default:
		include 'movie_tag_list.php';
		break;
}

?>