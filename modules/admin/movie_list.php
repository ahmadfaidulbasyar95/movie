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

foreach ($output as $key => $value) 
{
	$output[$key]['id_url']     = $sys->path['url'].'movie/'.$value['id_url'];
	$output[$key]['id_url_alt'] = $sys->path['url'].'movie/'.$value['id_url_alt'];
	$output[$key]['image']      = admin_img($value['image'],'movie');
}

include $sys->tpl('movie_list');
?>