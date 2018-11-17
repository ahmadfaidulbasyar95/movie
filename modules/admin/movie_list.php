<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'List '.$sys->meta_title;

$id        = @$_GET['id'];
$movie_url = @$_POST['movie_url'];

if ($movie_url) 
{
	$movie_url = str_replace($sys->path['url'].'movie/', '', $movie_url);
	$movie_id = $sys->db("SELECT `id` FROM `movie` WHERE `id_url`='{$movie_url}' OR `id_url_alt`='{$movie_url}' ",'one');
	if ($movie_id) 
	{
		$sys->redirect($sys->mod['url_task'].'edit?id='.urlencode($movie_id).'&return='.urlencode($sys->mod['url_current']));
	}
}

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

$output = $sys->db('SELECT * FROM `movie` ORDER BY `created` DESC','all',@$_GET['page'],10);

foreach ($output['list'] as $key => $value) 
{
	$output['list'][$key]['id_url']     = ($value['active']) ? $sys->path['url'].'movie/'.$value['id_url'] : '#';
	$output['list'][$key]['id_url_alt'] = ($value['active']) ? $sys->path['url'].'movie/'.$value['id_url_alt'] : '#' ;
	$output['list'][$key]['image']      = admin_img($value['image'],'movie');
}

include $sys->tpl('movie_list');
?>