<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Series';

switch (@$sys->mod['sub_task']['0']) 
{
	case 'edit':
		include 'movie_series_edit.php';
		break;
	
	default:
		include 'movie_series_list.php';
		break;
}

?>