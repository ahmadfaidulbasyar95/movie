<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'List '.$sys->meta_title;

$id = @$_GET['id'];

switch (@$_GET['act']) {
	case '1':
		if ($id) 
		{
			if ($sys->db_update(array(),'movie',$id,1)) 
			{
				$msg[] = array('Delete Success','success');
			}else
			{
				$msg[] = array('Delete Failed','danger');
			}
			url_change($sys->mod['url_task']);
		}
		break;
	
	default:
		# code...
		break;
}

$output = $sys->db('SELECT * FROM `movie`','all');
include $sys->tpl('movie_list');
?>