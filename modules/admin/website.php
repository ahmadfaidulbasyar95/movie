<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Website';

switch (@$sys->mod['sub_task']['0']) 
{
	case 'edit':
		include 'website_edit.php';
		break;
	
	default:
		include 'website_list.php';
		break;
}

?>